<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tamnx\Demo;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    //
    public function add($a, $b){
    	echo $a + $b;
    }

    public function subtract($a, $b){
    	echo $a - $b;
    }
}