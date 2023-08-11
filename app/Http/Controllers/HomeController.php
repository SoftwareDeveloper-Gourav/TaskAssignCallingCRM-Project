<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;

class HomeController extends Controller
{

        //   THIS IS A  SWAL FUNCTION 
   public function swal($status , $title ,$icon){
        return response()->json([
             'status'=>$status,
             'title'=>$title,
             'icon'=>$icon 
        ]);
    }
//   THIS IS A  SWAL FUNCTION 
//   THIS IS A formSubmit FUNCTION 
public function formSubmit(Request $request){
     $name = $request->name;
      $phone = $request->phone;
      $country_code = $request->country_code;
     $a = $country_code.$phone;
     $email = $request->email;
     $msg = $request->msg;
     $details = new CustomerModel;
     $details->customer_name = $name;
     $details->customer_number = $a;
     $details->customer_email = $email;
     $details->msg = $msg;
     $save = $details->save();
     if($save){
        return self::swal(true,"Submited",'success');
     }else{
        return self::swal(false,"Try Again Later",'error');
     }
     
     
}
//   THIS IS A formSubmit FUNCTION 


}