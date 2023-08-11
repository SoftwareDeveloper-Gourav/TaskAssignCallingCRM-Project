<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\UserModel; 
use App\Models\CustomerModel;
use App\Models\EmailModel;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;
use DB;
use Crypt;

class ContactController extends Controller
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

//   THIS IS A  SWAL FUNCTION 
   public function toastr($status , $title ,$icon,$msg){
        return response()->json([
             'status'=>$status,
             'title'=>$title,
             'icon'=>$icon, 
             'msg'=>$msg
        ]);
    }
//   THIS IS A  SWAL FUNCTION 
   
    // THIS IS contactAdd FUNCTION 
    public function contactAdd(Request $request){
     $phone= $request->phone;
      $country_code = $request->country_code;
      $name = $request->name;
      $email = $request->email;
      // $dob = $request->dob;
      $password = $request->password;
     if(UserModel::where('phone_number',$phone)->first()){
         return self::toastr(false,"Number Already Registered","error","Error");
     }
     if(UserModel::where('email',$email)->first()){
         return self::toastr(false,"Email Already Registered","error","Error");
     }

      $contact_details = new UserModel;
      $contact_details->name = $name;
      $contact_details->country_code = $country_code;
      $contact_details->phone_number = $phone;
      $contact_details->email = $email ;
      // $contact_details->dob = $dob ;
      $contact_details->password = $password ;
      $save = $contact_details->save();
      if($save){
         return self::toastr(true,"Team Member Add Successfull","success","Success");
      }else{
         return self::toastr(false,"Sorry , Technical Issue..","error","Error");
      }
      
    }
    // THIS IS contactAdd FUNCTION 

    
    // THIS IS contactPage FUNCTION 
    public function contactPage(){
  $id = session('admin');
   $admin_data = AdminModel::find($id);
   $contact_data = UserModel::orderBy('user_id','DESC')->get();
  return view('admin.dashboard.contacts',['admin_data'=>$admin_data,'data'=>$contact_data]);
    }
    // THIS IS contactPage FUNCTION 

// THIS IS editUserPage FUNCTION   
  public function editUserPage($contact_id){
    $id = session('admin');
   $admin_data = AdminModel::find($id);
   
 $user_id =   Crypt::decrypt($contact_id);
 $data = UserModel::find($user_id);
 return view('admin.dashboard.edit_contact',['admin_data'=>$admin_data,'data'=>$data]);
   
  }
 
// THIS IS editUserPage FUNCTION   

// THIS IS updateContact FUNCTION 
public function updateContact(Request $request){
  
     $phone= $request->phone;
     $country_code=$request->country_code;

      $name = $request->name;
      $email = $request->email;
      // $dob = $request->dob;
      $password = $request->password;
      
        $user_id = $request->user_id;
     $contact_details = UserModel::find($user_id);
      $contact_details->name = $name;
      $contact_details->phone_number = $phone ;
      $contact_details->email = $email ;
      $contact_details->country_code = $country_code ;
      $contact_details->password = $password ;
      $save = $contact_details->save();
      if($save){
         return self::toastr(true,"Team Member Details Updated Successfull","success","Success");
      }else{
         return self::toastr(false,"Sorry , Technical Issue..","error","Error");
      }
}


// THIS IS updateContact FUNCTION 

// THIS IS A deleteTeam FUNCTION 
public function deleteTeam(Request $request){
    $id = $request->id;
    $delete = UserModel::find($id)->delete();
    if($delete){
  return self::swal(true,'Deleted','success');
    }else{
  return self::swal(false,'Technical Issue','error');
        
    }
}

// THIS IS A deleteTeam FUNCTION 

//  THIS IS Clientspage FUNCTION 
public function Clientspage(){
  $id = session('admin');
   $admin_data = AdminModel::find($id);
   $customers = CustomerModel::orderBy('customer_id','DESC')->get();
  return view('admin.dashboard.customers',['admin_data'=>$admin_data,'data'=>$customers]);
}
//  THIS IS Clientspage FUNCTION 


//  THIS IS assginClientspage FUNCTION 
public function assginClientspage(){
  $id = session('admin');
   $admin_data = AdminModel::find($id);
  $team = UserModel::all();

   $customers = DB::table('user')
   ->join('customer','customer.team_member','=','user.user_id')
   ->where('customer.team_member','!=',null)
   ->orderBy('customer.customer_id','DESC')
   ->get();
  return view('admin.dashboard.assign_client',['admin_data'=>$admin_data,'data'=>$customers,'team'=>$team]);
}
//  THIS IS assginClientspage FUNCTION 


//  THIS IS noneAssginClientspage FUNCTION 
public function noneAssginClientspage(){
  $id = session('admin');
  $team = UserModel::all();
   $admin_data = AdminModel::find($id);
   $customers = CustomerModel::where('team_member',null)->orderBy('customer_id','DESC')->get();
  return view('admin.dashboard.none_assign_client',['admin_data'=>$admin_data,'data'=>$customers,'team'=>$team]);
}
//  THIS IS noneAssginClientspage FUNCTION 

// THIS IS  assign FUNCTION 
public function assign(Request $request){
  $customers[] = $request->customer;
  $team_member = $request->team_member;

// echo "<pre>";
// print_r($customers);

foreach ($customers[0] as $key => $value) {
$update = CustomerModel::find($value);
$update->team_member=$team_member;
$update->save();
}
return self::swal(true,'Assign Successfull','success');
  

}
// THIS IS  assign FUNCTION 
// THIS IS emailPage FUNCTION 
public function emailPage(){
   $id = session('admin');
   $admin_data = AdminModel::find($id);

   $emails = DB::table('user')
   ->join('email_send','email_send.email_admin','=','user.user_id')
   ->join('customer','customer.customer_id','=','email_send.email_customer')
   ->orderBy('email_send.email_id','DESC')
   ->paginate(10);
  return view('admin.dashboard.all_email',['admin_data'=>$admin_data,'data'=>$emails]);
}
// THIS IS emailPage FUNCTION 

// THIS IS emailShow FUNCTION 

public function emailShow($email_id){
  $email_id = decrypt($email_id);
   $email_details = DB::table('user')
   ->join('email_send','email_send.email_admin','=','user.user_id')
   ->join('customer','customer.customer_id','=','email_send.email_customer')
   ->where('email_send.email_id',$email_id)
   ->get();

  //  echo "<pre>";
  //  print_r($email_details);
  //  die();


   $id = session('admin');
   $admin_data = AdminModel::find($id);
  return view('admin.dashboard.email_show',['admin_data'=>$admin_data,'data'=>$email_details[0]]);
  
}
// THIS IS emailShow FUNCTION 


// THIS IS EXPORT FUNCTION 

public function export()
    {
        return Excel::download(new CustomerExport(), 'clients.xlsx');
    }

// THIS IS EXPORT FUNCTION 

// THIS IS IMPORT FUNCTION 
  public function import(Request $request) 
    {
         $file_ex = $request->csv->getClientOriginalExtension();
    if($file_ex=="csv"|| $file_ex=="xls"|| $file_ex=="xlsx"){
        Excel::import(new CustomerImport,
        request()->file('csv'));
        // if($file==true){
         return self::toastr('success','All Clients Upload Successfull','success','Success');    
        // }else{
      // return self::toastr('error','Sorry Not Upload Clients','error','Error');    
        // }

    }else{
          return self::toastr('error','Please Upload csv , xls or xlsx Files','error','Error');    
    } 
    
    }
// THIS IS IMPORT FUNCTION 

// THIS IS importPage FUNCTION  
public function importPage(){
   $id = session('admin');
   $admin_data = AdminModel::find($id);
     return view('admin.dashboard.import_customer',['admin_data'=>$admin_data]);
}
// THIS IS importPage FUNCTION  


// THIS IS smsPage FUNCTION 
public function smsPage(){
   $id = session('admin');
   $admin_data = AdminModel::find($id);

   $sms = DB::table('user')
   ->join('messages','messages.team_member_id','=','user.user_id')
   ->join('customer','customer.customer_id','=','messages.customer_msg_id')
   ->orderBy('messages.messages_id','DESC')
   ->paginate(10);
  return view('admin.dashboard.all_sms',['admin_data'=>$admin_data,'data'=>$sms]);
}


// THIS IS smsShow FUNCTION 

public function smsShow($id){
     $team_id = session('admin');
   $admin_data = AdminModel::find($team_id);

   
  $sms_id = decrypt($id);
   $sms_details = DB::table('user')
   ->join('messages','messages.team_member_id','=','user.user_id')
   ->join('customer','customer.customer_id','=','messages.customer_msg_id')
   ->where('messages.messages_id',$sms_id)
   ->get();
  //  echo "<pre>";
  // print_r($sms_details);
  // die();

  return view('admin.dashboard.sms_show',['admin_data'=>$admin_data,'data'=>$sms_details[0]]);
  
}
// THIS IS smsShow FUNCTION 

// THIS IS deleteClient FUNCTION 
  public function deleteClient(Request $request){
    $id = $request->id;
    $delete = CustomerModel::find($id)->delete();
    if($delete){
  return self::toastr(true,'Deleted Successfull','success','Success');
    }else{
  return self::toastr(false,'Technical Issue','error','Error');
        
    }
}
// THIS IS deleteClient FUNCTION 

    // THIS IS END OF THE CLASS 
}