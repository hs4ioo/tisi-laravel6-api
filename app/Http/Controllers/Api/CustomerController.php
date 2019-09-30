<?php

namespace App\Http\Controllers\api;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $customer = new Customer;
        $inputs = request()->all();
        $customer->first_name = isset($inputs['fistname']) ? $inputs['fistname']:$customer->fistname;
        $customer->last_name = isset($inputs['last_name']) ? $inputs['last_name']:$customer->last_name;
        $customer->email = isset($inputs['email']) ? $inputs["email"]:$customer->email;

        $customer->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       try{
           $customer = Customer::findorfail($id);
           return response()->json($customer);

       } catch (Expcepion $e){
           return response(null,404);
       }

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
        $customer = Customer::findorFail($id);
        $inputs = request()->all();
        $customer->first_name = $inputs['firestname'];
        $customer->last_name = $inputs['last_name'];
        $customer->email = isset($inputs['email'])?$inputs["email"]:$customer->email;

        $customer->save();
    }

    /** $customer -> save();
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $customer = Customer::findorfail($id);
            $customer->delete();
            return response()->json($customer);

        } catch (Expcepion $e){

        }
    }
}
