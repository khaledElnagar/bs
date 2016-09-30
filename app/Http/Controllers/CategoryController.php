<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('cart');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('categories.id','categories.code','categories.name')
            ->join('books','books.category','=','categories.code')
            ->where('categories.code','!=','categories.parent_code')->distinct()->paginate(20);

        $special_books = Book::where('featured_book',1)->get();

        return view('category.index',compact('categories','special_books'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $books = Book::where('category',$category->code)->get();
        $special_books = Book::where('featured_book',1)->get();

        return view('category.details',compact('books','category','special_books'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
