@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($task)) Editar @else Cadastrar @endif</h1> <hr>

    <div class="col-8 m-auto">

        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($task))
            <form name="formEdit" id="formEdit" method="post" action="{{url("tasks/$task->id")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('tasks')}}">
        @endif
                @csrf
                <input class="form-control" type="text" name="title" id="title" placeholder="Título:" value="{{$task->title ?? ''}}" required><br>
                <input class="form-control" type="text" name="done" id="done" placeholder="Completo:" value="{{$task->done ?? ''}}" required><br>
                <select class="form-control" name="id_user" id="id_user" required>
                    <option value="{{$task->relUsers->id ?? ''}}">{{$task->relUsers->name ?? 'Autor'}}</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select><br>
                <input class="btn btn-primary" type="submit" value="@if(isset($task)) Editar @else Cadastrar @endif">
            </form>
    </div>
@endsection