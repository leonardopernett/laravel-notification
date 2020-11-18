@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>mensaje</h1>
        <p>{{$message->body}}</p>
        <p>{{$message->sender->name}}</p>
    </div>
</div>
@endsection
