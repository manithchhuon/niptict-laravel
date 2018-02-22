<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'url_image'=>'required',

        ]);
    }

    public function showRegistrationForm()
    {
        // $role = Role::create(['guard_name' => 'admin', 'name' => 'superadmin']);
        $roles=Role::all()->pluck('name','name')->toArray();
        return view('auth.register_role',compact('roles'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        // $fileName = 'null';
        // if (Input::file('url_image')->isValid()) {
        //     // $destinationPath = public_path('images/profile');
        //     // $extension = Input::file('url_image')->getClientOriginalExtension();
        //     // $fileName = uniqid().'_'.time().'.'.$extension;
        //     // Input::file('url_image')->move($destinationPath, $fileName);

        //     $fileName=Storage::disk('public')->put('/profile',Input::file('url_image'));
        // }
        
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'url_image'=>$data['url_image']
        ]);
        // $user->assignRole('admin');
        $roles=Input::get('role');
        // dd($roles);
        if(isset($roles))
            $user->assignRole($roles);
        return $user;
        
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $roles=Input::get('roles');
        // if(isset($roles))
        //     $user->assignRole($roles);
        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
        return redirect(route('register'));
    }
}
