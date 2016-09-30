<?php

namespace App\Http\Controllers;

use App\Book;
use App\Country;
use App\Details;
use App\Order;
use App\State;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * CartController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cart');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Details::where('user_id', auth()->user()->id)->where('order_id', 0)->where('wish', 0)->get();
        return view('cart.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'id' => 'required|exists:books',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->get('wishlist')) {
            $book = Book::find($request->get('id'));
            $order_details = new Details();
            $order_details->order_id = 0;
            $order_details->book_id = $book->id;
            $order_details->user_id = auth()->user()->id;
            $order_details->isbn = $book->isbn;
            $order_details->price = $book->price;
            $order_details->quantity = $request->get('quantity');
            $order_details->total = $request->get('quantity') * $book->price;
            $order_details->wish = 1;
            $order_details->save();
            return redirect('account/wishlist')->with('status', 'Book successfully added to wishlist');

        } else {
            $book = Book::find($request->get('id'));
            $order_details = new Details();
            $order_details->order_id = 0;
            $order_details->book_id = $book->id;
            $order_details->user_id = auth()->user()->id;
            $order_details->isbn = $book->isbn;
            $order_details->price = $book->price;
            $order_details->quantity = $request->get('quantity');
            $order_details->total = $request->get('quantity') * $book->price;
            $order_details->save();
            return redirect('cart')->with('status', 'Book successfully added to cart');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $validator = validator(['id' => $id], [
            'id' => 'exists:order_details,id,user_id,' . auth()->user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order = Details::find($id);
        $related_books = Book::where('category', $order->book->category)->where('id', '!=', $order->book->id)->inRandomOrder()->take(5)->get();
        return view('cart.edit', compact('order', 'related_books'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator(['id' => $id], [
            'id' => 'exists:order_details,id,user_id,' . auth()->user()->id,
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order_details = Details::find($id);
        $order_details->quantity = $request->get('quantity');
        $order_details->total = $request->get('quantity') * $order_details->price;
        $order_details->update();
        return redirect(url('cart'))->with('status', $order_details->book->name . " updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator = validator(['id' => $id], [
            'id' => 'exists:order_details,id,user_id,' . auth()->user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Details::where('id', $id)->where('wish', 0)->where('user_id', auth()->user()->id)->delete();
        return back()->with('status', "Book successfully removed from your cart.");
    }

    public function checkout()
    {
        $countries = Country::orderBy('name')->get();

        $states = State::where('country_id', auth()->user()->country)->orderBy('name')->get();
        return view('cart.checkout', compact('countries', 'states'));

    }

    public function completeCheckout(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|max:255|min:6',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'postcode' => 'required|integer',
        ]);
        $total_price = Details::where('user_id', auth()->id())->where('order_id', 0)->where('wish', 0)->sum('price');
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_amount = $total_price;

        if (auth()->user()->approved_university == 1 &&auth()->user()->discount >0 ) {
            $order->discount = auth()->user()->discount;
            $order->net_amount= $total_price -($total_price*auth()->user()->discount/100);
        } else {
            $order->discount = 0;
            $order->net_amount = $total_price;
        }
        $order->name=$request->get('name');
        $order->country=$request->get('country');
        $order->city=$request->get('city');
        $order->address=$request->get('address');
        $order->phone=$request->get('phone');
        $order->postcode=$request->get('postcode');
        $order->save();

        $details = Details::where('user_id', auth()->id())->where('order_id', 0)->where('wish', 0)->get();
        foreach ($details as $detail) {
            $detail->order_id = $order->id;
            $detail->update();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return back()->with('status','Order successfully registered');
    }
}
