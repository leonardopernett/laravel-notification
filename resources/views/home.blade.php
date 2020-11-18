@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('enviar mensaje') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('message')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <select name="receive_id" id="" class="form-control @error('body') is-invalid @enderror" >
                                <option value="">Selecciona usuario </option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('receive_id') <span class="text-danger">{{$message}}</span>  @enderror

                        </div>
                         <div class="form-group">
                             <textarea name="body" class="form-control @error('body') is-invalid @enderror"  rows="3"></textarea>
                             @error('body') <span class="text-danger">{{$message}}</span>  @enderror
                       </div>
                         <div class="form-group">
                             <button class="btn btn-primary">enviar mensaje</button>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
