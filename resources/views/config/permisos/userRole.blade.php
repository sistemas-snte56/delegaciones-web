@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ASIGNAR ROLE A USUARIO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{$user->name}} </h2>
        </div>
        <div class="card-body">
            <h5>Lista de Roles</h5>
            <form action="{{route('asignar.update',$user)}}" method="post">
                @csrf
                @method('PUT')

                @foreach ($roles as $role)
                    <div class="form-check" style="margin-top: 10px; margin-bottom: 10px;">
                        <label>
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->hasAnyRole($role->id) ? 'checked' : '' }} class="mr-1">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach

                <x-adminlte-button label="Asignar permisos" theme="primary" icon="fas fa-pen" type="submite" />
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop