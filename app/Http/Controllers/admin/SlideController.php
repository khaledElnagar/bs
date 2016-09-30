<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slide;
class SlideController extends Controller
{
    /**
     * SlideController constructor.
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
        $slides = Slide::all();

        return view('admin.slide.index', compact('slides'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide();
        $slide->title = $request->get('title');
        $slide->description = $request->get('description');

        $extention = $request->file('image')->getClientOriginalExtension();
        $filename = str_random(13) . '.' . $extention;
        $file = file_get_contents($request->file('image'));
        $save = file_put_contents("images/slides/" . $filename, $file);

        if ($save) {
            $slide->image = $filename;
        }
        $slide->link = $request->get('link');
        $slide->save();
        return redirect()->back()->with('status', 'Slide Successfully Created !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);

        return view('admin.slide.edit', compact('slide'));

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
        $slide = Slide::find($id);
        $slide->title = $request->get('title');
        $slide->description = $request->get('description');

        $extention = $request->file('image')->getClientOriginalExtension();
        $filename = str_random(13) . '.' . $extention;
        $file = file_get_contents($request->file('image'));
        $save = file_put_contents("images/slides/" . $filename, $file);

        if ($save) {
            \File::delete(public_path() . '/images/slides/' . $slide->image);
            $slide->image = $filename;
        }
        $slide->link = $request->get('link');
        $slide->update();
        return redirect()->back()->with('status', 'Slide Successfully Updated !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slide::destroy($id);
        return redirect()->back()->with('status', 'Slide deleted Successfully !');

    }
}
