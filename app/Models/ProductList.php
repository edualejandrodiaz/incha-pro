<?php

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;

class ProductList extends Model
{

    public static function getAllProducts($strCategories = '', $paginate = true, $perPage = 12)
    {
        try {
            $client = new Client();
            $url = config('app.rest_api.url') . "products/all";

            $params = array(
                'group_id' => Config::get('app.rest_api.group_id')
            );

            if ($strCategories != '') {
                $params['category_id'] = $strCategories;
            }

            $request = $client->post(
                $url,
                array(
                    'form_params' => $params
                )
            );

            $prodCat = json_decode($request->getBody()->getContents());

            if ($paginate) {
                $xPage = $perPage;
                // Parpage Count 
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $itemCollection = collect($prodCat);
                // Data Array 
                $currentPageItems = $itemCollection->slice(($currentPage * $xPage) - $xPage, $xPage)->all();
                $items = new LengthAwarePaginator($currentPageItems, count($itemCollection), $xPage, null, ['path' => url('catalogo/')]);
            } else {
                $items = $prodCat;
            }

            return $items;
        } catch (GuzzleException $e) {
            //Catch the guzzle connection errors over here.These errors are something 
            // like the connection failed or some other network error

            return array();
        }
    }

    public static function getBestsellets($paginate)
    {
        try {
            $client = new Client();
            $url = config('app.rest_api.url') . "products/bestsellets";
            
            $request = $client->post(
                $url,
                array(
                    'form_params' => array(
                        'group_id' => Config::get('app.rest_api.group_id')
                        )
                        )
                    );
                    dd($request);
            $prodCat = json_decode($request->getBody()->getContents());
            return $prodCat;

        } catch (GuzzleException $e) {
            //Catch the guzzle connection errors over here.These errors are something 
            // like the connection failed or some other network error

            return ProductList::getAllProducts('', $paginate);
        }
    }

    public static function getAllCategories()
    {
        try {
            $client = new Client();
            $url = config('app.rest_api.url') . "categories/get";

            $request = $client->post(
                $url,
                array(
                    'form_params' => array(
                        'group_id' => Config::get('app.rest_api.group_id')
                    )
                )
            );

            $categories = json_decode($request->getBody()->getContents());

            return ($categories);
        } catch (GuzzleException $e) {
            //Catch the guzzle connection errors over here.These errors are something 
            // like the connection failed or some other network error

            return array();
        }
    }

    public static function getProduct($produtId)
    {
        try {
            $client = new Client();
            $url = config('app.rest_api.url') . "products/get";

            $request = $client->post(
                $url,
                array(
                    'form_params' => array(
                        'group_id' => Config::get('app.rest_api.group_id'),
                        'product_id' => $produtId
                    )
                )
            );

            $product = json_decode($request->getBody()->getContents());

            return ($product);
        } catch (GuzzleException $e) {
            //Catch the guzzle connection errors over here.These errors are something 
            // like the connection failed or some other network error

            return array();
        }
    }

    public static function createOrder($data) {
        try {
            $client = new Client();
            $url = config('app.rest_api.url')."order/add";
            $request = $client->post($url,
                array(
                    'form_params' => array(
                        // 'customer_rut' => '177824577',
                        'customer_rut' => $data->customer_rut,
                        'data_coment' => $data->data_coment,
                        'dataV' => $data->dataV,
                        'group_id' => Config::get('app.rest_api.group_id')
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
}
