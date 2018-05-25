<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Genero;
use App\Codigo;
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
        $code = $data['code'];

        if (empty( $data['check'][0])) { //$data['check'][0]
            $check1 = "vacio";
        }else{
            $check1 = $data['check'][0];
        }
        if (empty( $data['check'][1])) { //$data['check'][0]
            $check2 = "vacio";
        }else{
            $check2 = $data['check'][1];
        }
        if (empty( $data['check'][2])) { //$data['check'][0]
            $check3 = "vacio";
        }else{
            $check3 = $data['check'][2];
        }
        if (empty( $data['check'][3])) { //$data['check'][0]
            $check4 = "vacio";
        }else{
            $check4 = $data['check'][3];
        }

        if($code == 'RealG4LifeBaby'){
            $uno = "1";
            $path = '/images/perfil.jpg';
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'apellido' => $data['apellido'],
                'telefono'=>$data['telefono'],
                'date' => $data['date'],
                'fav1' => $check1,
                'fav2' => $check2,
                'fav3' => $check3,
                'fav4' => $check4,
                'admin' => $uno,
                'subs'  => $uno,//activa la subscripción
                'subFinal' => "3000-12-30"
                'imgPerfil' => $path,
                'password' => bcrypt($data['password']),

            ]);
        }else{
            $codigoValido = Codigo::where('codigo', $code)->first();
            if($codigoValido){
                if($codigoValido->usado == "0"){  
                    $uno = "1";
                    $path = '/images/perfil.jpg';


                    $codigo = Codigo::where('codigo', $code)->first();
                    $codigo->usado = "1";
                    $codigo->user = $data['email'];
                    $codigo->save();
                    $dateIni = date("Y-m-d");
                    $date = strtotime("+30 day", strtotime(date("Y-m-d")));
                    $dataMas = date("Y-m-d", $date);
                    return User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'apellido' => $data['apellido'],
                        'telefono'=> $data['telefono'],
                        'date' => $data['date'],
                        'fav1' => $check1,
                        'fav2' => $check2,
                        'fav3' => $check3,
                        'fav4' => $check4,
                        'subs'  => $uno,
                        'admin' => '0',
                        'subInicio' => $dateIni,
                        'subFinal' => $dataMas,
                        'imgPerfil' => $path,
                        'password' => bcrypt($data['password']),
                    ]);
                }else{
                    $path = '/images/perfil.jpg';
                    return User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'apellido' => $data['apellido'],
                        'telefono'=> $data['telefono'],
                        'date' => $data['date'],
                        'fav1' => $check1,
                        'fav2' => $check2,
                        'fav3' => $check3,
                        'fav4' => $check4,
                        'admin' => '0',
                        'imgPerfil' => $path,
                        'password' => bcrypt($data['password']),
                    ]);
                }
            }else{
                $path = '/images/perfil.jpg';
                return User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'apellido' => $data['apellido'],
                        'telefono'=> $data['telefono'],
                        'date' => $data['date'],
                        'fav1' => $check1,
                        'fav2' => $check2,
                        'fav3' => $check3,
                        'fav4' => $check4,
                        'admin' => '0',
                        'imgPerfil' => $path,
                        'password' => bcrypt($data['password']),
                    ]);
            }
        }
    }
    public function showRegistrationForm()
    {
        $genero = Genero::all();
        return view('auth.register', compact('genero'));
    }
}
