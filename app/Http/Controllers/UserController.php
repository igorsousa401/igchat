<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function get_users($auth_id) {

        $users = User::where('id', '!=', $auth_id)->get();
        return response()->json([
           'users' => $users,
        ],Response::HTTP_OK);
    }



    public function user_active($user_id) {

        $user_active = User::where('id', '=', $user_id)->get()->first();

        return response()->json(['user' => $user_active], Response::HTTP_OK);
    }


}
