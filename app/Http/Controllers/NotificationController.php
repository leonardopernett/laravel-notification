<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
class NotificationController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
          $noleidas = auth()->user()->unreadNotifications;
          $leidas = auth()->user()->readNotifications;

        return view('notitfication.index',[
            'unreadNotifications' => $noleidas,
            'readNotifications'   => $leidas 
        ]);
    }


    public function read($id){
        DatabaseNotification::find($id)->markAsread();
        return back();
   }

   public function destroy($id){
        DatabaseNotification::find($id)->delete();
        return back();
    }




}
