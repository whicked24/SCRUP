<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class enviarModel extends Model
{
    public static function guardar(Request $request)
	{
		DB::select("");
	}
}
