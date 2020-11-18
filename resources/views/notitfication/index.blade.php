@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Lista de notificaciones</h1>
    <div class="row ">
         <div class="col-md-6">
           <h2>no leidas</h2>
           <ul class="list-group">
             @foreach($unreadNotifications as $unreadNotification)
              <li class="list-group-item d-flex justify-content-between">
                <a href="{{$unreadNotification->data['link']}}">
                  {{$unreadNotification->data['text']}} 
                </a>
              <form action="{{route('notification.read', $unreadNotification->id)}}" method="post">
                @csrf
                @method('PATCH')
                  <button class="btn btn-danger btn-sm ">x</button>
                </form>
              </li>
               @endforeach
           </ul>
         </div>

         <div class="col-md-6">
          <h2> leidas</h2>
          <ul class="list-group">
            @foreach($readNotifications as $readNotification)
               <li class="list-group-item list-group-item d-flex justify-content-between">
                  <a href="{{$readNotification->data['link']}}">
                    {{$readNotification->data['text']}} 
                  </a>
                  <form action="{{route('notification.destroy', $readNotification->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                      <button class="btn btn-danger btn-sm ">x</button>
                    </form>
                </li>
            @endforeach
          </ul>
        </div>
    </div>
</div>
@endsection
