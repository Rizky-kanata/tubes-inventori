<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        return view ('pages.products.index' , [
            "products" => $products,
        ]);
    }
}
