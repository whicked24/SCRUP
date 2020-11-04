<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminat\Support\Facades\Log;

class DatosPersonales extends Model
{
    public static function getDatosPersonales(Request $request)
    {   Log::info("hola");
        return DB::table('dat_personales')->get();
    }
}
