<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EstatusSeeder extends Seeder
{

	static $estatus=[
		'Activo',
		'Inactivo',
		'Por Hacer',
		'En Proceso',
		'Completado',
		'Postergado'
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach (self::$estatus as $estatu) {
            DB::table('estatus')->insert([
                'name' => $estatu                
            ]);
        }
    }
}
