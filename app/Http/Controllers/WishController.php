<?php

namespace App\Http\Controllers;

use App\Details;
use Illuminate\Http\Request;

use App\Http\Requests;

class WishController extends Controller
{


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
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

        Details::where('id', $id)->where('wish', 1)->where('user_id', auth()->user()->id)->delete();
        return back()->with('status', "Book successfully removed form your wishlist .");
    }

    public function clearList()
    {
        Details::where('wish', 1)->where('user_id', auth()->user()->id)->where('order_id', 0)->delete();
        return back()->with('status', "Wishlist successfully cleared.");
    }

    public function convertToOrder()
    {

        Details::where('wish', 1)->where('user_id', auth()->user()->id)->where('order_id', 0)->update(['wish' => '0']);
        return redirect('/cart')->with('status', "Wishlist successfully converted to order and cleared.");
    }

    public function updateAll(Request $request)
    {
        $token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
        if ($request->session()->token() == $token) {


            $details = Details::where('user_id', auth()->id())->where('order_id', 0)->where('wish', 1)->get();

            foreach ($details as $detail) {

                $validator = validator(['quantity' => $request->get("id" . $detail->id)], [
                    'quantity' => 'required|integer|min:1',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }

            foreach ($details as $detail) {
                $detail->quantity = $request->get("id" . $detail->id);
                $detail->total = $request->get("id" . $detail->id) * $detail->price;
                $detail->update();
            }

            return response()->json(['responseText' => 'Success!'], 200);

        }
    }
}
