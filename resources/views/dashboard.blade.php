@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="title">
        ESTRUCTURA REGIONAL DE LA SECCIÓN 56 DEN SNTE
        <h5>
            COMITÉS EJECUTIVOS DELEGACIONALES Y REPRESENTANTES DE CENTROS DE TRABAJO
        </h5>      
    </div>   
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($regiones as $region)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <x-adminlte-info-box title="{{ $region->delegaciones_count }} Delegaciones" 
                            text="{{ $region->region}} - {{ $region->sede}}" 
                            icon="fas fa-lg fa-users text-orange"
                            theme="gradient-success" 
                            icon-theme="white"
                            url="{{ route('region.show', $region) }}" 
                            url-text="Ver todas las delegaciones" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop