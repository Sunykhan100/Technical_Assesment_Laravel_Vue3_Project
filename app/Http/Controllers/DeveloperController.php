<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    function getAllDevelopers(){
        return Developer::all();
    }
    function developerById($id){
        return Developer::find($id);
    }
    function addDeveloper(Request $request){
        
        $developer = new Developer;
        $developer->first_name = $request->first_name;
        $developer->last_name = $request->last_name;
        $developer->email = $request->email;
        $developer->phone_number = $request->phone_number;
        $developer->address = $request->address;
        $developer->image = $request->image;
       
        $result = $developer->save();
        if($result){
            return ["Result"=> "Record Added"];
        }else{
            return["Result" => "Something went wrong with saving records."];
        }
    }
    function updateDeveloper(Request $request){
        $developer = new Developer;
        $developer = Developer::find($request->id);
        $developer->first_name = $request->first_name;
        $developer->last_name = $request->last_name;
        $developer->email = $request->email;
        $developer->phone_number = $request->phone_number;
        $developer->address = $request->address;
        $developer->image = $request->image;
        $result = $developer->save();
         if($result){
            return ["Result"=> "Record Updated"];
        }else{
             return["Result" => "Operation Failed"];
         }
    }

    function delete(Request $req){
        $developer = Developer::find($req->id);

        if($developer->delete()) {
            return ["Result" => "Developer Deleted"];
        }
        else{
            return ["Result" => "Error while delete record"];
        }
    }
    public function deleteAll($id){
        $single_user_id = explode(',' , $id);

       foreach($single_user_id as $id) {
           Developer::findOrFail($id)->delete();
       }
    }
}
