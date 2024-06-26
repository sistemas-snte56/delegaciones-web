@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACIÓN DE REGIONES</h1>
@stop

@section('content')

    <form action=" {{route('region.store')}} " method="post">
        <div class="card">

            <div class="card-header">
                Ingresa la información de las <strong>Regiones</strong>.
            </div>

            <div class="card-body">
                {{-- With prepend slot --}}
                @csrf
                <x-adminlte-input type="text" name="region" id="region" label="Región" placeholder="Ingresa nombre de la región" label-class="text-orange" value="{{old('region')}}" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-cogs text-orange"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>    
                <x-adminlte-input type="text" name="sede" id="sede" label="Sede" placeholder="Ingrese su sede" label-class="text-orange" value="{{old('sede')}}" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-location-arrow text-orange"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>    
                <x-adminlte-input type="text" name="coordinador" id="coordinador" label="Coordinador" placeholder="Nombre del Coordinador Regional" label-class="text-orange" value="{{old('coordinador')}}" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-orange"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>    
            </div>
                
            <div class="card-footer text-muted">
                <x-adminlte-button type="submit" label="Guardar" theme="warning" icon="fa fa-save" class="btnGuardar"/>
            </div>
            
        </div>
            
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>    
@stop