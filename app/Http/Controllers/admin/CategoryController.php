<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

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
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->update();
        return redirect()->back()->with('status','Category Successfully Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->back()->with('status','Category deleted Successfully !');
    }

    /**
     * select data from local store (sqlsrv) and insert it in site server (mysql)
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateFromSqlSrv(){

        Category::truncate();
        $items = \DB::connection('sqlsrv')->select("select ITEM_GROUP_CODE,ITEM_GROUP_NAME,MAIN_GROUP_CODE from item_group ");

        foreach($items as $item)
        {
            $category = new Category();
            $category->code = $item->ITEM_GROUP_CODE;
            $category->parent_code= $item->MAIN_GROUP_CODE;
            $category->name = $item->ITEM_GROUP_NAME;
            $category->save();
        }
       return redirect()->back()->with('status' , 'Category Updated');
    }
}
