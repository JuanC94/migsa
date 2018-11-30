<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Pais;
use App\Sector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';
    protected $pais;
    protected $sector;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Pais $pais, Sector $sector)
    {
        $this->middleware('guest');
        $this->pais = $pais;
        $this->sector = $sector;
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
            'city' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'identification' => 'required|integer',
            'rol' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'city' => $data['city'],
            'sector' => $data['sector'],
            'address' => $data['address'],
            'identification' => $data['identification'],
            'rol' => $data['rol'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
{
    $pais = $this->pais;
    $pais = $pais::all();
    $sector = $this->sector;
    $sector = $sector::all();
    $data = ['paises' => $pais, 'sectores' => $sector ];
    return view('auth.register', $data);
}
}
