<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Resources\Product as ProductResource;

class UserController extends Controller
{
	//Allows authenticated users to access contacts
    public function __construct(){
        $this->middleware('auth:web');
    }

    public function showCont(){
    	//Fetch contacts from database
    	$cont = Product::paginate(5);

    	//Pass the data through our resource that controls API
    	$all = ProductResource::collection($cont);

    	return view('front.product.index')->withCon($all);
    }
}
