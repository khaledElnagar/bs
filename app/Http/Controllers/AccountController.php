<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AccountController extends Controller
{
    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('cart');

    }


    public function showDashboard()
    {

        return view('account.dashboard');
    }

    public function showInformation()
    {

        $countries = Country::orderBy('name')->get();

        $states = State::where('country_id', auth()->user()->country)->orderBy('name')->get();
        return view('account.information', compact('countries', 'states'));
    }

    public function update(Request $request, $id)
    {

        if ($request->get('current_password') != '') {
            $validator = validator($request->all(), [
                'name' => 'required|max:255|min:6',
                'email' => 'required|email|max:255|unique:users,email,'.auth()->user()->id,
                'password' => 'required|min:6|confirmed',
                'country' => 'required|max:255',
                'city' => 'required|max:255',
                'address' => 'required|max:255',
                'phone' => 'required|max:255',
                'age' => 'required|max:255',
            ]);
            $credentials = $request->only(
                'email', 'password', 'password_confirmation'
            );

            $old_password = $request->get('current_password');


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::find($id);

            if (\Hash::check($old_password, $user->password)) {

                $user->password = bcrypt($credentials['password']);
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->country = $request->get('country');
                $user->city = $request->get('city');
                $user->address = $request->get('address');
                $user->phone = $request->get('phone');
                $user->age = $request->get('age');
                $user->save();
                return redirect()->back()->with('status', 'Profile updated!');
            } else {
                return redirect()->back()->with('warning', 'Wrong Old Password !')->withInput();
            }

        } else {
            $validator = validator($request->all(), [
                'name' => 'required|max:255|min:6',
                'email' => 'required|email|max:255|unique:users,email,'.auth()->user()->id,
                'country' => 'required|max:255',
                'city' => 'required|max:255',
                'address' => 'required|max:255',
                'phone' => 'required|max:255',
                'age' => 'required|max:255',
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            } else {

                $user = User::find($id);
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->country = $request->get('country');
                $user->city = $request->get('city');
                $user->address = $request->get('address');
                $user->phone = $request->get('phone');
                $user->age = $request->get('age');
                $user->save();
                return redirect()->back()->with('status', 'Profile updated!');
            }


        }


    }

    public function showWishList(){

        return view('account.wishlist');
    }


}
