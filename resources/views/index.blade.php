@extends('templates.template')
@section('content')
<h1 class="text-center">Lista de Tarefas</h1>
@csrf
<div class="text-center mt-3 mb-4">
        <a href="{{url('tasks/create')}}">
            <button class="btn btn-success">Inserir</button>
        </a>
    </div>
    
    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Completo</th>
                <th scope="col">Usuário</th>
            </tr>
            </thead>
            <tbody>

            @foreach($task as $tasks)
                @php
                    $user=$tasks->find($tasks->id)->relUsers;
                @endphp
                <tr>
                    @if($tasks->done == '1')
                        <th scope="row"><strike>{{$tasks->id}}</strike></th>
                        <td><strike>{{$tasks->title}}</strike></td>
                        <td><strike>{{$tasks->done}}</strike></td>
                        <td><strike>{{$user->name}}</strike></td>
                    @else
                        <th scope="row">{{$tasks->id}}</th>
                        <td>{{$tasks->title}}</td>
                        <td>{{$tasks->done}}</td>
                        <td>{{$user->name}}</td>
                    @endif
                    <td>
                        <a href="{{url("tasks/$tasks->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="{{url("tasks/$tasks->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="{{url("tasks/$tasks->id")}}" class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$task->links()}}
    </div>
@endsection