<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Helpers\Herramientas;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rutSession = $request->session()->get('inchalam.rut');
        $orders = collect($this->getOrderByUser($rutSession))['orders'];
        
        $puntos = $this->getPuntos(Session::get('inchalam.id'));
        $rut = $this->getRut( Session::get('inchalam.id') );
        $email = $this->getEmail( Session::get('inchalam.id') );
        $phono = $this->getFono( Session::get('inchalam.id') );

        $rut = Herramientas::formatoRut($rut);

        $rewards = $this -> getMovimientosLocal(Session::get('inchalam.id'));

        $datosPerfil = [
            'orders'=>$orders,
            'rewards'=>$rewards,
            'rut'=>$rut,
            'email'=>$email,
            'fono'=>$phono,
            'puntos'=> number_format ( $puntos , 0, "," , "." )
        ];

        return view('front.pages.profile', compact('datosPerfil'));
    }

    /**
     * Muestra el detalle de la order/canje.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function showOrder(Request $request){

        $rutSession = $request->session()->get('inchalam.rut');
        $order_id = $request->order_id;

        $datos = ['rut'=>$rutSession, 'order_id'=>$order_id];

        $order = $this->getSpecificOrder( $datos );

        return view('front.pages.order-detail', compact('order'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user = User::find(Session::get('inchalam.id'));

        if($user){
            
            $user->rut = preg_replace('/[^0-9]/', '', $request->rut);
            $user->email = $request->email;
            $user->telephone = $request->fono;

            $user->save();

            $msg = array(
                'result' => 'success',
                'data' => $user
            );

            $response =  response()->json($msg, 200);

        } else {
            $code = 200;
            $response = response()->json(['result' => 'Datos invalidos', 'code' => $code], $code);

        }

        return $response;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
