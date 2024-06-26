@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ASIGNAR ROLES Y PERMISOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{$role->name}} </h2>
        </div>
        <div class="card-body">
            <h5>Lista de Permisos</h5>
            <form action="{{route('roles.update',$role)}}" method="post">
                @csrf
                @method('PUT')

                @foreach ($permisos as $permiso)
                    <div class="form-check" style="margin-top: 10px; margin-bottom: 10px;">
                        <label>
                            <input type="checkbox" name="permisos[]" value="{{ $permiso->id }}" {{ $role->hasPermissionTo($permiso->id) ? 'checked' : '' }} class="mr-1">
                            {{ $permiso->name }}
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