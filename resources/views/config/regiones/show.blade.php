@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACIÓN DE REGIONES</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3> {{ $region->region }} | {{ $region->sede }} </h3>
            <h5> <strong>COORDINADOR:</strong>&emsp;{{ $region->coordinador }}</h5>            

        </div>

        <div class="card-body">

            @php
                $heads = [
                    ['label' => 'DELEGACIÓN', 'width' => 5],
                    'NIVEL',
                    ['label' => 'SEDE', 'width' => 40],
                    ['label' => 'ACCIONES', 'no-export' => true, 'width' => 5],
                ];

                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';

                $config = [
                    
                    // 'order' => [[1, 'asc']],
                    'columns' => [null, ['orderable' => false], ['orderable' => false], ['orderable' => false]],
                    'lengthMenu' => [50,100,500],
                    // 'paging' => false,
                    // 'lengthMenu' => false,
                    // 'searching' => false,
                    // 'info' => false,                    
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config"  striped hoverable>
                @foreach ($region->delegaciones as $delegacion)
                    <tr>
                        <td> {{ $delegacion->nomenclatura->nomenclatura}}{{$delegacion->num_delegaciona}} </td>
                        <td> {{ $delegacion->nivel_delegaciona }} </td>
                        <td> {{$delegacion->sede_delegaciona}} </td>
                        <td>
                            <form action=" {{route('delegacion.show',$delegacion)}} " method="get">
                                @csrf
                                <x-adminlte-button type="submit" label=" VER" theme="success" icon="fas fa-eye"  class="btn-sm"/>
                            </form>                           
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>



            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/miestilo.css">
@stop

@section('js')

@stop
