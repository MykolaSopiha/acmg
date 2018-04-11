<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Notifications\NewUser;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;
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
    protected $redirectTo = 'cabinet/docs/start';

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
        static $regions = array(
//            DateTimeZone::AFRICA,
//            DateTimeZone::AMERICA,
//            DateTimeZone::ANTARCTICA,
            DateTimeZone::ASIA,
//            DateTimeZone::ATLANTIC,
//            DateTimeZone::AUSTRALIA,
            DateTimeZone::EUROPE,
//            DateTimeZone::INDIAN,
//            DateTimeZone::PACIFIC,
        );

        $timezones = array();
        foreach( $regions as $region )
        {
            $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
        }

        $timezone_offsets = array();
        foreach( $timezones as $timezone )
        {
            $tz = new DateTimeZone($timezone);
            $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
        }

        // sort timezone by offset
        asort($timezone_offsets);

        $timezone_list = array();
        foreach( $timezone_offsets as $timezone => $offset )
        {
            $offset_prefix = $offset < 0 ? '-' : '+';
            $offset_formatted = gmdate( 'H:i', abs($offset) );

            $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

            $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
        }

        $countries = Country::all();

        return view('auth.register', compact('countries', 'timezone_list'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $phoneCode = Country::findOrfail($data['country_id'])->phone;
        $data['phone'] = $phoneCode . $data['phone'];

        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country_id' => 'required|numeric|exists:countries,id',
            'phone' => 'required|numeric|unique:users',
            'timezone' => 'required|timezone'
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
            'phone' => $data['phone'],
            'timezone' => $data['timezone'],
        ]);
        $user->save();

        $userRole = Role::where('name', 'user')->first();

        $user->attachRole($userRole);

        return $user;
    }
}
