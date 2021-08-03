<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt as FacadesCrypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class SettingController extends Controller
{
    protected function edit($id,Request $request){
       $user = User::find($id);
    //    $user->password = FacadesCrypt::decrypt( $user->password);
         return view('setting',['user'=>$user]);
     }
     protected function updateSetting($id,Request $request){
          $user=User::find($id);
          $user->name=$request->name;
          $user->email=$request->email;
          $user->password=Hash::make($request->password);
          if($request->photo==null){
              $user->photo=$user->photo;
          }else{
             $name_photo = $request->photo->getClientOriginalName();
             $request->photo->move(public_path() . '/files/', $name_photo);
             $data[] = $name_photo;
            $user->photo=$name_photo;
          }

          $user->save();
          return redirect('home');
     }
}