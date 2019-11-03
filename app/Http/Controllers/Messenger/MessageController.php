<?php

namespace App\Http\Controllers\Messenger;

use App\Entities\Message;
use App\Events\MessagePosted;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages(User $user,Request $request)
    {
        $privateCommunication = Message::with('user')->with('receiver')
            ->where(['user_id' => auth()->id(), 'receiver_id' => $user->id])
            ->orWhere(function ($query) use ($user) {
                $query->where(['user_id' => $user->id, 'receiver_id' => auth()->id()]);
            })
            ->get();

        if (!($privateCommunication)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($privateCommunication, ' read successfully');
    }

    public function sendMessage(Request $request, User $user)
    {

        $input = $request->all();
        $input['receiver_id'] = $user->id;
        $message = auth()->user()->messages()->create($input);

        broadcast(new MessagePosted($message->load('user')))->toOthers();

        if (!($message)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($message, ' read successfully');
    }

    public function users()
    {
        $message = Message::with('user')->with('receiver')->orderBy('updated_at','DESC')->get()->unique('receiver_id');

        if (!($message)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($message, ' read successfully');
    }
}
