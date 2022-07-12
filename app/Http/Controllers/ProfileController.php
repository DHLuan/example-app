<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $profile =  DB::table('profiles')->where('user_id',$id)->first();
        return View('pages.profiles.show',['profile'=>$profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile =  DB::table('profiles')->find($id);
        $users =  DB::table('users')->find($id);
        return View('pages.profiles.edit',['profile'=>$profile, 'user'=>$users]);
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
            'avatar' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
			'birthday'=>'nullable|date',
            'full_name' =>'required',
            'address' =>'required'
        ]);
        if($validate){
            $profile = Profile::find($id);
//            $user = new User();
            $profile->full_name = $request->input('full_name');
//        $profile->email = $request->input('email');
            $profile->address = $request->input('address');
            $profile->birthday = $request->input('birthday');
        $affected = DB::table('profiles')
            ->where('id', $id)
            ->update(['full_name' =>  $profile->full_name,
//                'email' =>  $profile->email,
                'address' =>  $profile->address,
                'birthday' =>  $profile->birthday
            ]);
            $fileName="";
            if ($request->file()) {
                $fileName = $request->file('avatar')->getClientOriginalName();
                $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
                //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
                $profile->avatar = '/storage/' . $filePath;
                // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
                $profile ->save();
                return back()//trả về trang trước đó
                ->with('success', 'Profile has updated.')//lưu thông báo kèm theo để hiển thị trên view
                ->with('file', $fileName);
            }else{
                return back()//trả về trang trước đó
                ->with('fail', 'Profile updated fail.')//lưu thông báo kèm theo để hiển thị trên view
                ->with('file', $fileName);
            }
        }



        return back()->with($validate);
//        $affected = DB::table('users')
//            ->where('id', $id)
//            ->update(['email' =>  $profile->email]);
//        return redirect()->route('profiles.show', [$id]);
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
