<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.view_category',compact('data'));
    }
    public function add_category(Request $request){
        $validated =$request->validate([
            'categoryname' => 'required',

        ]);
        
            $catmodel =new Category();
            $catname=$request->categoryname;
            $catmodel->category_name = $catname;
            $image =$request->catimg;
           $imagename=$catname.'.'.$image->getClientOriginalExtension();
           $request->catimg->move('category',$imagename);
           $catmodel->category_image = $imagename;
             $res= $catmodel->save();

    return redirect()->back()->with('success','Category Added Successfully');
 
 
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }

    public function view_product_category() {
        $data['category'] = Category::all();
        $data['pcategory'] = ProductCategory::all();
        return view('admin.view_product_category',compact('data'));
    }
    public function add_product_category(Request $request){
        $validated =$request->validate([
            'product_categoryname' => 'required',
            'categoryid' =>'required'

        ]);
        
            $pcatmodel =new ProductCategory();
            $pcatname=$request->product_categoryname;
            $pcatmodel->Product_category_name = $pcatname ;
             $pcatmodel->cid =$request->categoryid;
             $image =$request->pcatimg;
             $imagename=time().'.'.$image->getClientOriginalExtension();
             $request->pcatimg->move('productcategory',$imagename);
             $pcatmodel->product_category_image = $imagename;
             $res= $pcatmodel->save();

    return redirect()->back()->with('success','Product Category Added Successfully');
 
 
    }
    public function delete_prodcut_category($id){
        $data = ProductCategory::find($id);
        $data->delete();
        return redirect()->back()->with('success','Product Category Deleted Successfully');
    }

    public function view_add_product(){
        $data = ProductCategory::all();
        return view('admin.view_add_product',compact('data'));
    }

    public function add_product(Request $request){
        $validated =$request->validate([
            'productname' => 'required',
            'prodcut_category' =>'required',
            'actual_prize' => 'required',
            'seller_prize' => 'required',
            'discount' =>'required',
            'stock' =>'required',
            'productimg' => 'required'

        ]);
        
            $pmodel =new Product();
           $pmodel->title=$request->productname;
           $pmodel->description=$request->description;
            $pmodel->product_category=$request->prodcut_category;
           $pmodel->quantity=$request->stock;
           $pmodel->actual_prize=$request->actual_prize;
           $pmodel->seller_prize=$request->seller_prize;
           $pmodel->discount=$request->discount;

           $image =$request->productimg;
           $imagename=time().'.'.$image->getClientOriginalExtension();
           $request->productimg->move('product',$imagename);
           $pmodel->product_image=$imagename;
             $res= $pmodel->save();

    return redirect()->back()->with('success','Product  Added Successfully');
 
 
    }
    public function show_product(){
        $data = Product::all();
        return view('admin.show_product',compact('data'));
    }
    public function delete_prodcut($id){
        $data = ProductCategory::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
