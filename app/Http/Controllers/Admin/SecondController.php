<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller\Admin;
use Illuminate\Http\Request;

class SecondController extends Controller
{
	public function __construct(){
		$this->middleware(middleware:'auth');
	}
    public function showString(){
    	return 'static string';
    }
    public function showString1(){
    	return 'static string';
    }
    public function showString2(){
    	return 'static string';
    }
    public function showString3(){
    	return 'static string';
    }
}
