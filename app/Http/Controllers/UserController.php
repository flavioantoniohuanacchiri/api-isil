<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::all();
        return response()->json($users);
    }

    public function show($dni)
    {
        $user = User::where("document_number", $dni)->first();
        return response()->json($user);
    }

    public function update($dni = "", Request $user)
    {
        $objUser = User::where("document_number", $dni)->first();
        if (!is_null($objUser)) {
            $objUser->email = $user->email;
            $objUser->save();
        }
        return $this->show($dni);
    }

    //
}