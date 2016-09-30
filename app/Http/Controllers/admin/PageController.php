<?php

namespace App\Http\Controllers\admin;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.page.index', compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.page.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->menu_flag = $request->get('menu_flag');
        $page->title = $request->get('title');
        $page->details = $request->get('details');
        $page->save();
        return redirect()->back()->with('status', 'Page Successfully Created !');

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
        $page = Page::find($id);

        return view('admin.page.edit', compact('page'));

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
        $page = Page::find($id);
        $page->title = $request->get('title');
        $page->details = $request->get('details');
        $page->menu_flag = $request->get('menu_flag');
        $page->update();

        return redirect()->back()->with('status', 'Page Successfully Updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::destroy($id);
        return redirect()->back()->with('status', 'Page deleted Successfully !');

    }
}
