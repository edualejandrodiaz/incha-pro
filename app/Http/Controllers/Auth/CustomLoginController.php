<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomLoginController extends Controller
{
    public function loginUser(Request $request)
    {
        
        $rut = preg_replace('/[^0-9]/', '', $request->rut);
        
        $exist = Auth::attempt(['rut' => $rut, 'password' => $request->password]);
        $session = new Session;

        $datos = new Collection();
        $datos->group_id = Config::get('app.rest_api.group_id');
        $datos->data_user = json_encode(array(
            'name' => 'Usuario',
            'last_name' => 'Lealtad',
            'rut' => '269123664',
            'phone' => '',
            'email' => $request->email
        ));

        

        if ($exist) {

            $user = Auth::user();
            
            $client = $this->getClient($datos);
            
            //¿Datos del servicio o del cliente en la base de datos local?
            //$session::put('inchalam.user', $client->row->firstname);
            
            $session::put('inchalam.rut', $client->row->rut);
            
            $session::put('inchalam.id', $user->id);
            $session::put('inchalam.user', $user->firstname);
            $session::put('inchalam.lastname', $user->lastname);
            //$session::put('inchalam.rut', $user->rut);
 
            $session::put('inchalam.customer_group_id', $user->customer_group_id);

            $msg = array(
                'result' => 'success',
                'data' => $client
            );

            $response =  response()->json($msg, 200);
        } else {
            // POR AHORA

            $code = 200;
            $response = response()->json(['result' => 'Datos invalidos', 'code' => $code], $code);
        }

        return $response;
    }

    public function loginUserCat(Request $request)
    {
        $msg = array(
            'result' => 'success'
        );

        $response = response()->json($msg, 200);
        //$code = 200;
        //$response = response()->json(['result' => 'Datos invalidos', 'code' => $code], $code);

        return $response;

    }

    public function registerUser(Request $request)
    {
        $user = new User();
        $passw = bcrypt($request->password);
        $exist = Auth::attempt(['email' => $request->email]);

        if (!$exist) {
            $existeUser = $user::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passw,
                'rut' => $request->rut,
            ]);
        } else {
            $existeUser = $exist;
        }

        return $existeUser;
    }
}
