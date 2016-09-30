<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
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
        $contact = Contact::all()->first();
        return view('admin.contact.edit',compact('contact'));
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
        return "here";

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
        $contact = Contact::find($id);
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->mobile = $request->get('mobile');
        $contact->fax = $request->get('fax');
        $contact->address = $request->get('address');
        $contact->longitude = $request->get('longitude');
        $contact->latitude = $request->get('latitude');
        $contact->facebook = $request->get('facebook');
        $contact->twitter = $request->get('twitter');
        $contact->youtube = $request->get('youtube');
        $contact->linked_in = $request->get('linked_in');
        $contact->google_plus = $request->get('google_plus');
        $contact->wslny = $request->get('wslny');

        $contact->save();

        return redirect()->back()->with('status','Contact Info Successfully Updated !!');

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
