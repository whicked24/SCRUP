<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RegisterUser;
use Illuminate\support\Facades\Mail;
use App;

class BeneficiosController extends Controller
{
   public function beneficios(){

   	$datos=[
   		'Nombre'=>'jonan',
   		'Edad'=>'32',
   		'Sexo'=>'Masculino'
   		];

   	Mail::to('whicked24@gmail.com')->queue(new RegisterUser($datos));
   	return view('beneficios');

   }




   public function list_beneficios(){

   
   return view('beneficios.listBeneficios');

   }


   public function add_beneficios(){

   

   }



   public function update_beneficios(){


   }



}
