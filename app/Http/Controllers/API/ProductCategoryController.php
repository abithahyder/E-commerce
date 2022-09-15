<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcat = ProductCategory::all();
        return response()->json($pcat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'product_categoryname'=>'required',
            'pcatimg'=>'required',
            'cid' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'error']);
        }

        $pcatmodel =new ProductCategory();
            $pcatname=$request->product_categoryname;
            $pcatmodel->Product_category_name = $pcatname ;
             $pcatmodel->cid =$request->categoryid;
             $image =$request->pcatimg;
             $imagename=time().'.'.$image->getClientOriginalExtension();
             $request->pcatimg->move('productcategory',$imagename);
             $pcatmodel->product_category_image = $imagename;
             $res= $pcatmodel->save();

       return response()->json([
        "success" => true,
        "message" => " Product Category Inserted Successfully",
        "data" => $pcatname
        ]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pcat = ProductCategory::find($id);
        return response()->json($pcat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
