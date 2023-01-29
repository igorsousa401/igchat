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

    public function get_messages($auth_id,$user_id){
        $from = $auth_id;
        $to = $user_id;
        $messages = Message::where(
            function($query) use($from, $to) {
                $query->where([
                    'from' => $from,
                    'to' => $to
                ]);
            }
        )->orWhere(
                function($query) use($from, $to) {
                    $query->where([
                        'from' => $to,
                        'to' => $from
                    ]);
                }
            )
            ->orderBy('created_at', 'ASC')
            ->get();

        return response()->json([
            'messages' => $messages,
        ], Response::HTTP_OK);
    }


}
