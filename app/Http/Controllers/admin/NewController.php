<?php

namespace App\Http\Controllers\admin;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewController extends Controller
{

    /**
     * NewController constructor.
     *
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
        $news = News::all();

        return view('admin.new.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new News();
        $new->title = $request->get('title');
        $new->details = $request->get('details');

        $extention = $request->file('image')->getClientOriginalExtension();
        $filename = str_random(13) . '.' . $extention;
        $file = file_get_contents($request->file('image'));
        $save = file_put_contents("images/" . $filename, $file);

        if ($save) {
            $new->image = $filename;
        }

        $new->save();
        return redirect()->back()->with('status', 'New Successfully Created !');

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
        $new = News::find($id);

        return view('admin.new.edit', compact('new'));
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
        $new = News::find($id);
        $new->title = $request->get('title');
        $new->details = $request->get('details');

        $extention = $request->file('image')->getClientOriginalExtension();
        $filename = str_random(13) . '.' . $extention;
        $file = file_get_contents($request->file('image'));
        $save = file_put_contents("images/" . $filename, $file);

        if ($save) {
            \File::delete(public_path() . '/images/' . $new->image);
            $new->image = $filename;
        }

        $new->update();
        return redirect()->back()->with('status', 'New Successfully Updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect()->back()->with('status', 'New deleted Successfully !');

    }
}
