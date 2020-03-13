<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $bestsellets = ProductList::getBestsellets(false);

        return view('front.home', compact('bestsellets'));

    }
}
