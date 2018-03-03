<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Notifications\NewUser;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/cabinet/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $countries = Country::all();
        return view('auth.register', compact('countries'));
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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country_id' => 'required|numeric|exists:countries,id',
            'phone' => 'required|numeric|unique:users'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $parentId = null;

        if ($data['ref_key']) {
            $parentUser = User::where('referer_key', $data['ref_key'])->first();
            if ($parentUser) {
                $parentId = $parentUser->id;
            }
        }

        do {
            $refererKey = str_random(10);
        } while (User::where('referer_key', $refererKey)->first() instanceof User);

        $phoneCode = Country::findOrfail($data['country_id'])->phone;

        $user = new User();
        $user->fill([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'parent_id' => $parentId,
            'referer_key' => $refererKey,
            'country_id' => $data['country_id'],
            'phone' => $phoneCode . $data['phone'],
        ]);
        $user->save();

        $userRole = Role::where('name', 'user')->first();

        $user->attachRole($userRole);

        return $user;
    }
}
