<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function get_users() {

        $userLogged = Auth::user();
        $users = User::whereIn('id', '!=', $userLogged->id)->get();

        return response()->json([
           'users' => $users,
        ],Response::HTTP_OK);
    }
}
