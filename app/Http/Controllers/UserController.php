<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   function addUser(Request $req){

        $usr = new User;
        $usr->first_name = $req->first_name;
        $usr->last_name = $req->last_name;
        $usr->email = $req->email;
        $usr->password = Hash::make($req->input('password')) ;
        $result = $usr->save();
        if($result){
            return ["Result"=> "Data has been saved"];
        }else{
            return["Result" => "Operation Failed"];
        }
      
   }
   function resetPassword(Request $request){
        $usr = User::Where('email',$request->email)->first();
        
        if($usr){
            $usr->password = Hash::make($request->input('password')) ;
            $result = $usr->save();
            if($result){
                return ["Result"=> "Password Reset"];
            }else{
                return["Result" => "Password Reset Failed"];
            }
        }
        else{
            return["Result" => "User not found"];
        }
        
    }
   function login(Request $req){
      $usr = User::Where('email',$req->email)->first();
      if(!$usr || !Hash::check($req->password, $usr->password)){
          return ["error"=>"Email or Password not matching"];
      }
      else{
          return["Success"=>"User is Authenticated"];
      }
      return $usr;
   }
   function validateUser(Request $req){
    $usr = User::Where('email',$req->email)->first();
    if(!$usr){
        return ["error"=>"Email not valid"];
    }
    else{
        return["Success"=>"User is existed"];
    }
    return $usr;
 }
}
