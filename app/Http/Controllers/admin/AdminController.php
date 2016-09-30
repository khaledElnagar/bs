<?php

namespace App\Http\Controllers\admin;

use App\Book;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Order;
use App\Message;
use App\User;

class AdminController extends Controller
{

    /**
     * AdminController constructor.
     * assign middleware for admin
     */

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

        /*
        $items = \DB::connection('sqlsrv')->select("select item_code,item_name,isbn_code,author from main_item ");

        foreach($items as $item)
        {
            $book = new Book();
            $book->isbn = $item->isbn_code;
            $book->code= $item->item_code;
            $book->author = $item->author;
            $book->name = $item->item_name;
            $book->save();
        }
        */


        $admin =Admin::find(1) ;
        $messages_number = Message::all()->count();
        $orders_number = Order::all()->count();
        $users_number = User::all()->count();
        return view('admin.dashboard',compact('admin','messages_number','users_number' ,'orders_number'));

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
        $admin = admin::find($id);
        return view('admin.administrator.edit',compact('admin'));
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
        $validator = $this->validate($request, [
            'password' => 'required|confirmed',
        ]);
        $credentials = $request->only(
            'user_name', 'password', 'password_confirmation'
        );

        $old_password = $request->get('old_password');

        $admin = admin::find($id);
        if(\Hash::check($old_password, $admin->password)) {

            $admin->password = bcrypt($credentials['password']);
            $admin->save();
            return redirect()->back()->with('status', 'Profile updated!');
        }else{
            return redirect()->back()->with('error', 'Wrong Old Password !');
        }

        return redirect()->back()->withErrors($validator);

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
