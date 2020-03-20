<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
   public function index(){
       $pizzas = [
        ['type' => 'hawaiian', 'base' => 'cheesy'],
        ['type' => 'volcano', 'base' => 'garlic'],
        ['type' => 'veg-lohs', 'base' => 'crispy']
       ];
       return view('pizzas', [
           'pizzas' => $pizzas,
       ]);
   }

   public function show($id){
    return view('deteils', ['id'=>$id]);
   }
}
