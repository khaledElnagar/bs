<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Message;
use App\Page;
use App\Slide;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Book;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     *
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('cart');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slide::all();
        $categories = DB::select('select * from categories where parent_code = code ORDER by name limit 28');
        $highlighted_book = Book::where('highlight', 1)->inRandomOrder()->first();
        $most_view_books = Book::orderBy('views', 'DESC')->take(10)->get();
        $new_books = Book::orderBy('created_at', 'DESC')->take(20)->get();
        $special_books = Book::where('featured_book', 1)->get();
        return view('index', compact('slider', 'highlighted_book', 'most_view_books', 'new_books', 'categories', 'special_books'));
    }

    public function getState($country_id)
    {
        $state = State::where('country_id', $country_id)->orderBy('name')->get();

        $feed = '
        <select class="form-control m-bot15" name="city"  id = "city" >
         <option value="">Select City </option>';

        foreach ($state as $m_c) {

            $feed .= '<option value=' . $m_c->id . '>' . $m_c->name . '</option>';

        }

        $feed .= '</select>';

        echo $feed;
    }

    public function contactUs()
    {
        return view('pages.contactus');
    }

    public function storeMessage(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $message = new Message();
        $message->name = $request->get('name');
        $message->email = $request->get('email');
        $message->phone = $request->get('phone');
        $message->message = $request->get('message');
        $message->save();

        return redirect()->back()->with('status', 'Message successfully sent .');
    }


    public function aboutUs()
    {
        $about = Page::where('menu_flag', 1)->orderBy('id', 'desc')->first();
        return view('pages.aboutus', compact('about'));
    }

    public function privacy()
    {
        $privacy = Page::where('menu_flag', 3)->orderBy('id', 'desc')->first();
        return view('pages.privacy', compact('privacy'));
    }

    public function terms()
    {
        $term = Page::where('menu_flag', 2)->orderBy('id', 'desc')->first();
        return view('pages.terms', compact('term'));
    }

    public function search(Request $request)
    {
        $books = Book::where('name', 'LIKE', '%' . $request->get('q') . '%')->get();
        $search_categories = DB::select( DB::raw("SELECT * FROM categories WHERE name LIKE :name ORDER BY trim(name) asc"), ['name' =>'%'.$request->get('q').'%']);
        $special_books = Book::where('featured_book',1)->get();
        return view('pages.search', compact('books','special_books','search_categories'));

    }


    public function autocomplete(Request $request , $token)
    {
        if ($request->session()->token() == $token) {

            $books = Book::where('name', 'LIKE', '%' . $request->get('term') . '%')->take(10)->get();
            foreach ($books as $book) {
                $data[] = $book->name;
            }
            echo json_encode($data);

        }
    }
}
