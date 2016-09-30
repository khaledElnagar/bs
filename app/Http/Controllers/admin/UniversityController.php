<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    /**
     * UniversityController constructor.
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
        $universities = User::where('university_flag', 1)->get();
        return view('admin.university.index', compact('universities'));
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
        //
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
        $university = User::find($id);
        return view('admin.university.edit', compact('university'));
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
        $university = User::find($id);

        $university->name = $request->get('name');
        $university->discount = $request->get('discount');
        $university->approved_university = $request->get('approved_university');
        if($request->file('image')) {
            $extention = $request->file('image')->getClientOriginalExtension();
            $filename = str_random(13) . '.' . $extention;
            $file = file_get_contents($request->file('image'));
            $save = file_put_contents(storage_path('app/public/images/university'). '/' . $filename, $file);

            if ($save) {
                \File::delete(storage_path('app/public/images/university'). '/'. $university->image);
                $university->image = $filename;
            }
        }

        $university->update();
        return redirect()->back()->with('status', 'University Successfully Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
