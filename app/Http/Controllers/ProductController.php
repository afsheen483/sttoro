<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select("SELECT
                p.*,
                b.name AS brand_name,
                u.name AS username,
                s.name AS sub_name
            FROM
                products p
            JOIN users u ON
                u.id = p.user_id
            JOIN brands b ON
                b.id = p.brand_id
            JOIN sub_categories s ON 
                s.id = p.sub_category_id
            WHERE
                p.is_deleted = 0
            ORDER BY
                p.id
            DESC
             ");
             return view('product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new ProductModel();
        if($id > 0)
        {
            $data = ProductModel::find($id);
        }
        return view('product.forms',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $web_image = $request->file('web_image');
        $base_path = 'upload/';
        $web_name = $web_image->getClientOriginalName();
        $web_image->move('upload',$web_name);


        $mobile_image = $request->file('mobile_image');
        $mobile_name = $mobile_image->getClientOriginalName();
        $mobile_image->move('upload',$mobile_name);
        ProductModel::create([
            'name' => $request->product_name,
            'hashtags' => $request->hashtags,
            'web_image' => $base_path.$web_name,
            'mobile_image' => $base_path.$mobile_name,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'discount_price' => $request->discount_price,
            'shipping_cost' => $request->shipping_cost,
            'brand_id' => $request->brand_id,
            'sub_category_id' => $request->sub_category_id,
            'user_id' => $request->user_id,
            'created_by' => Auth::user()->id,
        ]);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $web_image = $request->file('web_image');
        $base_path = 'upload/';
        $web_name = $web_image->getClientOriginalName();
        $web_image->move('upload',$web_name);


        $mobile_image = $request->file('mobile_image');
        $mobile_name = $mobile_image->getClientOriginalName();
        $mobile_image->move('upload',$mobile_name);
        ProductModel::where('id','=',$id)->update([
            'name' => $request->product_name,
            'hashtags' => $request->hashtags,
            'web_image' => $base_path.$web_name,
            'mobile_image' => $base_path.$mobile_name,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'discount_price' => $request->discount_price,
            'shipping_cost' => $request->shipping_cost,
            'brand_id' => $request->brand_id,
            'sub_category_id' => $request->sub_category_id,
            'user_id' => $request->user_id,
            'updated_by' => Auth::user()->id,
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fire = ProductModel::where('id','=',$id)->update([
            'is_deleted'=> 1
        ]);
        if ($fire) {
            return 1;
        }
    }
}
