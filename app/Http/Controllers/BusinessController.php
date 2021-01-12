<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use DB;

class BusinessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function index()
    {
        $business = Business::all();
        return response()->json($business);
    }

    public function show($number_identifer)
    {
        $business = Business::where("number_identifer", $number_identifer)->first();
        return response()->json($business);
    }

    public function store(Request $request)
    {

        $BusinessId = $request->has("masterId")? $request->masterId : null;
        
        DB::beginTransaction();
        try {
            $obj = new Business;
            
            $obj->name = $request->name;
            $obj->address = $request->address;
            $obj->ubigeo = $request->ubigeo;
            $obj->number_identifer = $request->number_identifer;
            $obj->status = $request->status;

            $obj->save();
            DB::commit();
            return response(["rst" => 1, "obj" => $obj, "msj" => "Empresa Creada"]);
        } catch (Exception $e) {
            DB::rollback();
            return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
        }

    } 

    public function update($number_identifer = "", Request $business)
    {
        $objBusiness = Business::where("number_identifer", $number_identifer)->first();
        try {
        if (!is_null($objBusiness)) {
            //$objBusiness->name = $business->name;
            $objBusiness->address = $business->address;
            //$objBusiness->ubigeo = $business->ubigeo;
            //$objBusiness->number_identifer = $business->number_identifer;
            //$objBusiness->status = $business->status;
            $objBusiness->save();
            DB::commit();
            return response(["rst" => 1, "obj" => $objBusiness, "msj" => "Empresa Actualiza"]);
        } 
    }catch (Exception $e) {
            DB::rollback();
            return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
        }
    }

    public function destroy($number_identifer = "", Request $business)
    {
        $objBusiness = Business::where("number_identifer", $number_identifer)->first();
        if (!is_null($objBusiness)) {
            $objBusiness->delete();
        }
        
    }
}
