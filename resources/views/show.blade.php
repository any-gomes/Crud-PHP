@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        @php
            $user=$task->find($task->id)->relUsers;
        @endphp
        Título: {{$task->title}}<br>
        Completo: {{$task->done}}<br>
        Usuario: {{$user->name}} <br>
        Email: {{$user->email}} <br>
    </div>
@endsection