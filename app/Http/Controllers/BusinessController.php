<?php namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

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

    public function update($number_identifer = "", Request $business)
    {
        $objBusiness = Business::where("number_identifer", $number_identifer)->first();
        if (!is_null($objBusiness)) {
            $objBusiness->name = $business->name;
            $objBusiness->address = $business->address;
            $objBusiness->status = $business->status;
            $objBusiness->updated_at = $business->updated_at;
            $objBusiness->save();
        }
        return $this->show($number_identifer);
    }

    public function delete($number_identifer = "", Request $business)
    {
        $objBusiness = Business::where("number_identifer", $number_identifer)->first();
        if (!is_null($objBusiness)) {
        return ["rst" => 1, "obj" => $objBusiness, "msj" => "No se encontro Numero de RUC"]; 
        }
        return $this->delete($number_identifer);
    }

    //
}