<?php

namespace App\Helpers;



class Herramientas
{
   
    

    public static function formatoRut($rut) {

        return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );

    }

}