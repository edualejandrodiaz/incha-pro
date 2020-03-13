<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ProductListController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $categories = ProductList::getAllCategories();
        $data['category'] = array();
        $strCat = '';

        if (!$request->cat) {
            if ($data['category']) {
                $strCat = implode(',', $data['category']);
            }
        } else {
            $strCat = $request->cat;
            $data['category'] = explode(",", $strCat);
        }


        $products = ProductList::getAllProducts($strCat);
        $cantPag = 4;
        $diff = $products->lastPage() - $products->currentPage();
        $startLoop = 1;
        $endLoop = $products->lastPage();
        $data['show'] = false;
        if ($products->lastPage() > $cantPag) {
            $startLoop = ($diff < 4) ? ($products->lastPage() - 4) : $products->currentPage();
            $endLoop = $startLoop + 4;
            $data['show'] = true;
        }
        $data['startLoop'] = $startLoop;
        $data['endLoop'] = $endLoop;

        return view('front.pages.product-list', compact('data', 'products', 'categories', 'strCat'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductList  $productList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = ProductList::getProduct($request->id);
        return view('front.pages.product-detail', compact('product'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productCategories(Request $request)
    {

        $data = array();
        $categories = ProductList::getAllCategories();
        $data['category'] = array();
        if ($request->categories) {
            $data['category'] = $request->categories;
        }
        $strCat = implode(',', $data['category']);
        $cantPag = 4;
        $products = ProductList::getAllProducts($strCat);
        $diff = $products->lastPage() - $products->currentPage();
        $startLoop = 1;
        $endLoop = $products->lastPage();
        $data['show'] = false;
        if ($products->lastPage() > $cantPag) {
            $startLoop = ($diff < 4) ? ($products->lastPage() - 4) : $products->currentPage();
            $endLoop = $startLoop + 4;
            $data['show'] = true;
        }
        $data['startLoop'] = $startLoop;
        $data['endLoop'] = $endLoop;

        return view('front.pages.product-list', compact('data', 'products', 'categories', 'strCat'));
    }

    /**
     * Store a newly created order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderAdd(Request $request)
    {
        $datos = new Collection();
        // $datos->customer_rut = '268726101';
        $datos->customer_rut = $request->session()->get('inchalam.rut');
        $datos->data_coment = 'Canje';
        $datos->group_id = Config::get('app.rest_api.group_id');
        $datos->dataV = json_encode(array(array('id' => $request->id, 'cantidad' => 1)));

        $product = ProductList::getProduct($request->id);
        $puntos = $this->getPuntos($request->session()->get('inchalam.id'));
        $cargo = ($product->special <> null) ? $product->special : $product->price;

        if($puntos>=$cargo){

            $numOrder = ProductList::createOrder($datos);
        
            $message = (is_numeric($numOrder)) ? 'Ok' : 'NOk';

            
            if( $message == 'Ok' ){


                $insert = DB::table('oc_customer_reward')->insert([
                    [
                        'customer_id' => $request->session()->get('inchalam.id'),
                        'description' => 'Se hizo un canje',
                        'points'=>-$cargo,
                        'date_added'=>date('Y-m-d H:i:s'),
                        'date_vencimiento'=>date('Y-m-d H:i:s'),
                        'id_campana'=>10,
                        'id_trx'=>10,
                        'tipo_reward'=>8,
                        'pendiente_cashback'=>1
                    ]
                ]);
    

                //if( !is_numeric($insert) ){
                    //acá hacer algo para devolver los puntos
                    //DB::table('oc_customer_reward')->where('id', '=', $insert)->delete();
                //}
                    
                

            }

        } else {

            $message = 'NOPuntos';


        }
       
       


        


        return view('front.pages.product-change-result', compact('message', 'product'));
    }

}
