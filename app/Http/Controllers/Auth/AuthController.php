<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Intervention\Image\Image as Img;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Library\ActivationService;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $guard = 'user';
    protected $username = 'email';
    protected $activationService;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->middleware('cart');
        $this->activationService = $activationService;

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|min:6',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'age' => 'required|max:255',
            'captcha' => 'required|captcha',
        ],[
            'captcha.captcha'=>'Captcha doesn\'t match',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Foundation\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            //$this->throwValidationException(
          //      $request, $validator
         //   );
            return back()->withErrors($validator)->withInput();
        }

        $user = $this->create($request->all());

        $this->activationService->sendActivationMail($user);

        return redirect('/login')->with('status', 'We sent you an activation code. Check your email.');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->country = $data['country'];
        $user->city = $data['city'];
        $user->address = $data['address'];
        $user->phone = $data['phone'];
        $user->age = $data['age'];
        if (isset($data['image'])) {
            $extention = $data['image']->getClientOriginalExtension();
            $filename = str_random(13) . '.' . $extention;
            $file = file_get_contents($data['image']);
            Image::make($file)->save(storage_path('app/public/images/university') . '/' . $filename);
            $user->image = $filename;

        }
        if(isset($data['university_flag'])){
            $user->university_flag = $data['university_flag'];
        }

        $user->save();
        return $user;
    }

    /**
     * @param Request $request
     * @param $user
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }

    public function showRegistrationForm()
    {

        $countries = Country::all();
        return view('auth.register',compact('countries'));
    }

    /**
     *
     * protected function sendMail($id){
     * $user = User::find($id);
     * $subject = 'Welcome!';
     * $info['username']= $user->name;
     * $info['id']= $user->id;
     * $info['code']= $user->verification_code;
     * $info['email']= $user->email;
     *
     *
     * Mail::send('email', $info, function($message) use ($subject,$info) {
     * $message->from('imecgroup4@gmail.com', 'Importing & Marketing Egyptian Company (IMEC)');
     * $message->to($info['email'], $info['username']);
     * $message->replyTo('imecgroup4@gmail.com', 'IMEC');
     * $message ->subject($subject);
     * });
     *
     *
     *
     * }
     **/
}
