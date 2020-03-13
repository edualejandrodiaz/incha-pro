<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftcardController extends Controller
{
    public function show(Request $request)
    {
        $giftcard['img'] = $request->slug.".png";
        $giftcard['name'] ="Giftcard Netflix";
        $giftcard['user'] ="Usuario Lealtad";
        $giftcard['rut'] =$request->session()->get('inchalam.rut');

        return view('front.pages.giftcard-detail', compact('giftcard'));

    }
}
