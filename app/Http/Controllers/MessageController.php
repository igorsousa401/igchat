<?php

namespace App\Http\Controllers;

use App\Events\Chat\SendMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($auth_id,$user_id)
    {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->from = $request->from;
        $message->to = $request->to;
        $message->content = filter_var($request->content, FILTER_SANITIZE_STRIPPED);
        $message->save();

        Event::dispatch(new SendMessage($message, $request->to));

        return response()->json([
            'message' =>$message
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
