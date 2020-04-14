<?php

namespace App\Http\Controllers\Front;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public  function showUserName()
    {
    	return 'Othmane Kuzan';
    }

    public function getIndex()
    {
    	/*$objet = new \stdClass();

    	$objet -> name = 'othman';
    	$objet -> id = 5;
    	$objet -> gender = 'male';
        */
    	return view('welcome')->with('name', 'Othmane');
    }
}
