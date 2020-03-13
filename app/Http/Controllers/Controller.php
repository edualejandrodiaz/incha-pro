<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    

    public static function getClient($data) {
        try {
            $client = new \GuzzleHttp\Client();
            $url = config('app.rest_api.url')."order/getClient";
        
            $request = $client->post($url,
                array(
                    'form_params' => array(
                        'group_id' => $data->group_id,
                        'data_user' => $data->data_user
                    )
                )
            );
            return json_decode($request->getBody()->getContents());
            
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            //Catch the guzzle connection errors over here.These errors are something 
            // like the connection failed or some other network error
        
            return array();
        }
    }

    public static function getPuntos($id){

        
        return  DB::table('oc_customer_reward')
        ->where('customer_id', '=', $id)
        ->sum('points');


    }

    public static function getRut($id){

        $usuario = DB::table('oc_customer')
        ->where('id', '=', $id)
        ->first();
        
        return  $usuario->rut;

    }

    public static function getEmail($id){

        $usuario = DB::table('oc_customer')
        ->where('id', '=', $id)
        ->first();

        return  $usuario->email;

    }

    public static function getFono($id){

        $usuario = DB::table('oc_customer')
        ->where('id', '=', $id)
        ->first();

        return  $usuario->telephone;

    }

    public static function getFirstname($id){

        $usuario = DB::table('oc_customer')
        ->where('id', '=', $id)
        ->first();

        return  $usuario->firstname;

    }
    /**
     * Obtiene los movimientos de abonos y canjes desde la base de datos local
     * 
     * @param int $id identificador del usuario
     * @return array
     */

    public static function getMovimientosLocal(int $id){

        $rewards = DB::table('oc_customer_reward')
        ->where('customer_id', '=', $id)->get();

        return  $rewards->toArray();

    }

    public static function getOrderByUser($rut) {
        try {
            $client = new \GuzzleHttp\Client();
            $url = config('app.rest_api.url')."order/all";
        
            $request = $client->post($url,
                array(
                    'form_params' => array(
                        'customer_rut' => $rut
                    )
                )
            );

            return json_decode($request->getBody()->getContents(), true);

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            //Catch the guzzle connection errors over here.These errors are something 
            // like the connection failed or some other network error
        
            return array();
        }
    }

    /**
     * Muestra una order/canje específico
     * 
     * @param array $data rut|order_id
     * @return array
     */
    public static function getSpecificOrder(array $data ) {
        try {
            $client = new \GuzzleHttp\Client();
            $url = config('app.rest_api.url')."order/get";
        
            $request = $client->post($url,
                array(
                    'form_params' => array(
                        'customer_rut' => $data['rut'],
                        'order_id' => $data['order_id']
                    )
                )
            );

            return json_decode($request->getBody()->getContents(), true);

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            //Catch the guzzle connection errors over here.These errors are something 
            // like the connection failed or some other network error
        
            return array();
        }
    }

}
