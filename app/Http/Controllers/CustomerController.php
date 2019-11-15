<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index(){
      $all_customers = Customer::paginate(2);
      return view('home',compact('all_customers'));
    }
    public function addcustomer(Request $request){
      $insert = Customer::insert([
        'name'=>$request->fname,
        'pn_number'=>$request->pn_number,
        'email'=>$request->email,
        'district'=>$request->district,
      ]);
      if ($insert){
        return response()->json("success");
      }else {
          return response()->json("error");
      }
    }
    public function getcustomer(){
      $all_customers = Customer::paginate(2);
      $sl = 0;
       return view('response',compact('all_customers','sl'));
    }
    public function getcustomerdata(Request $request){
      $singlecustomer = Customer::find($request->id);
      return $singlecustomer;
    }
    public function deletecustomerdata(Request $request){
      $delete = Customer::where('id',$request->id)->delete();
      if ($delete) {
        return response()->json("success");
      }else {
        return response()->json("error");
      }
    }
    public function editcustomerdata(Request $request){
      $singlecustomers = Customer::find($request->id);
      return $singlecustomers;
    }
    // public function updatecustomerdata(Request $request){
    //
    // }
    public function getcustomerpagination(){
      $all_customers = Customer::paginate(2);
      $sl = 1;
      return view("paginate",compact("all_customers","sl"));
    }
}
