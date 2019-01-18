<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class UserController extends Controller
{
    public function ListarOficinas()
    {

        $response = Company::all();

        return response()->json($response); 

    }
}
