<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('categories')->get();
        return View('pages.category.index',['category'=>$category]);
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
        $category =  DB::table('categories')->where('id',$id)->first();
        return View('pages.category.show',['category'=> $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  DB::table('categories')->where('id',$id)->first();
        return View('pages.category.edit',['category'=> $category]);
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
            'description' =>'required'
        ]);
        if ($validate) {
            $category = new Category();
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $affected = DB::table('categories')
                ->where('id', $id)
                ->update(['name' =>  $category->name,
                    'description' =>  $category->description
                ]);
            return back()//trả về trang trước đó
            ->with('success', 'Updated success.')//lưu thông báo kèm theo để hiển thị trên view
            ->with('update', $category);
        }else {
            $category = '';
            return back()//trả về trang trước đó
            ->with('fail', 'Updated fail.')//lưu thông báo kèm theo để hiển thị trên view
            ->with('update', $category);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =  DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('category.index');
    }
}
