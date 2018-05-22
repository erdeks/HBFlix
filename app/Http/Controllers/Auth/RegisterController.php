<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Genero;
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
    protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
        $admin = $data['code'];
        if($admin == '12345678'){
            $uno = "1";
            $path = '/images/perfil.jpg';
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'apellido' => $data['apellido'],
                'telefono'=>$data['telefono'],
                'date' => $data['date'],
                'fav1' => $data['check'][0],
                'fav2' => $data['check'][1],
                'fav3' => $data['check'][2],
                'fav4' => $data['check'][3],
                'admin' => $uno,
                'subs'  => $uno,//activa la subscripción
                'imgPerfil' => $path,
                'password' => bcrypt($data['password']),

            ]);
        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'apellido' => $data['apellido'],
                'telefono'=> $data['telefono'],
                'date' => $data['date'],
                'fav1' => $data['check'][0],
                'fav2' => $data['check'][1],
                'fav3' => $data['check'][2],
                'fav4' => $data['check'][3],
                'admin' => $data['code'],
                'imgPerfil' => $path,
                'password' => bcrypt($data['password']),
            ]);
        }
    }
    public function showRegistrationForm()
    {
        $genero = Genero::all();
        return view('auth.register', compact('genero'));
    }
}
