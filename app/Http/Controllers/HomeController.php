<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    
    public function index(){
        $product =Product::paginate(10);
        return view('home.userpage',compact('product'));
    }
    
    public function redirect(){
        $usertype = Auth::user()->usertype;
          if($usertype == '1'){
               return view('admin.index');
           }
        else{
            $product =Product::paginate(10);
            return view('home.userpage',compact('product'));
          }
    }
    public function product_details($id){
        $product = Product::find($id);
        return view('home.product_details',compact('product'));
 
    }

    public function add_to_cart($id){
        if(Auth::id()){
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
}
