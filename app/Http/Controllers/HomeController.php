<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Notifications\MessageSend;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::query()->where('id','!=', auth()->user()->id)->get();
        return view('home',[
            'users'=>$users
        ]);
    }

    public function store(Request $request )
    {
         request()->validate([
             'body'=>'required',
             'receive_id'=>'required|exists:users,id'
         ]);

       $message =  Message::create([
          'send_id'=>auth()->user()->id,
          'receive_id'=>$request->receive_id,
          'body'=>$request->body
        ]);
        $receive = User::find($request->receive_id);

        $receive->notify(new MessageSend($message));
        return back()->with('flash','tu mensaje fue enviado');
        
    }

    public function show($id){
        $message = Message::findOrFail($id);
        return view('message.show',[
            'message'=>$message
        ]);
    }

}
