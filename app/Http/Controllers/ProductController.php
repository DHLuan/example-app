<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return View('pages.products.index',['products'=>$products]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  DB::table('products')->where('id',$id)->first();
        return View('pages.products.show',['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =  DB::table('products')->where('id',$id)->first();
        return View('pages.products.edit',['product'=> $product]);
//        $product = DB::table('products')->find($id);
//        return View('pages.products.edit',['products'=>$product]);
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
        $validate = $request->validate([
            'name' => 'required',
            'quantity'=>'required',
            'price' =>'required',
            'describe' =>'required'
        ]);
        if($validate){
        $product = new Product();
        $product->name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->describe = $request->input('describe');
        $affected = DB::table('products')
            ->where('id', $id)
            ->update(['name' =>  $product->name,
                'quantity' =>  $product->quantity,
                'price' =>  $product->price,
                'describe' =>  $product->describe
            ]);
            return back()//trả về trang trước đó
            ->with('success', 'Updated success.')//lưu thông báo kèm theo để hiển thị trên view
            ->with('update', $product);
        }else{
            $product ='';
            return back()//trả về trang trước đó
            ->with('fail', 'Updated fail.')//lưu thông báo kèm theo để hiển thị trên view
            ->with('update', $product);
        }
//        return redirect()->route('products.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  DB::table('products')->where('id',$id)->delete();
        return redirect()->route('products.index');
    }
}
