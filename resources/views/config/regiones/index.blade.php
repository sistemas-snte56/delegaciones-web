@extends('adminlte::page')

@section('title', 'REGIONES')

@section('content_header')
    <div class="title">
        ESTRUCTURA REGIONAL DE LA SECCIÓN 56 DEN SNTE
        <h5>
            LISTADO DE LAS REGIONES 
        </h5>      
    </div>       
@stop

@section('content')
    <div class="card">
        @can('region.create')
        <div class="card-header">
            Lista de <strong>Regiones</strong>
            <a href="{{route('region.create')}}" class="btn btn-primary float-right"><i class="fa fa-sm fa-fw fa-pen"></i>&emsp;Nueva Región</a>
        </div>
        @endcan

        <div class="card-body">
            @php

                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';
                            
                            
                $heads = [
                    'ID',
                    'REGIÓN',
                    'SEDE',
                    'COORDINADOR',
                    ['label' => 'DELEGACIONES', 'width' => 4 ],
                    ['label' => 'CONFIGURACIÓN', 'no-export' => true, 'width' => 5],
                ];
        
                $config = [
                    // 'order' => [[1, 'asc']],
                    'columns' => [
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false],
                        ['orderable' => false],
                    ],
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                    ],
                    'lengthMenu' => [50,100,500],                    
                ];
            @endphp
        
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config"
                striped hoverable bordered compressed>
                @foreach($regiones as $region)
                    <tr>
                        <td>{{ $region->id }}</td>
                        <td>{{ $region->region }}</td>
                        <td>{{ $region->sede }}</td>
                        <td>{{ $region->coordinador }}</td>
                        <td>{{ $region->delegaciones_count }}</td>
                        <td>
                            @can('region.show')
                                <a href="{{route('region.show',$region)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Mostrar">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>                            
                            @endcan

                            @can('region.edit')
                                <a href="{{route('region.edit',$region)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                            @endcan
                            @can('region.destroy')
                                <form action=" {{ route('region.destroy', $region) }} " method="post" class="formEliminar" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    {!! $btnDelete !!}
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
        
            </x-adminlte-datatable>
        </div>
        
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrarlo!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });

            })
        });
    </script>

    @if(session('update'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('update') }}"
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 1800
                });
            });
        </script>
    @endif

    @if(session('delete'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{session('delete')}}"
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 1800
                });

                // Swal.fire({
                //     title: '¿Estás seguro?',
                //     text: 'Eliminar esta región también eliminará todas las delegaciones asociadas. ¿Deseas continuar?',
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#d33',
                //     cancelButtonColor: '#3085d6',
                //     confirmButtonText: 'Sí, eliminar',
                //     cancelButtonText: 'Cancelar'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         // Realiza la acción de eliminación
                //         axios.delete(botonEliminar.href)
                //             .then(response => {
                //                 Swal.fire('Éxito', response.data.mensaje, 'success');
                //             })
                //             .catch(error => {
                //                 Swal.fire('Error', error.response.data.mensaje, 'error');
                //             });
                //     }
                // });                




            });
        </script>
    @endif    

    @if (session('error'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{session('error')}}"
                Swal.fire({
                    icon: "error",
                    title: mensaje,
                    text: "Debido a que depende de otras delegaciones. "
                });
            });            
        </script>
    @endif



    @if(session('success'))
        <script>
            $(document).ready(function(e){
                let mensaje = "{{ session('success') }}"
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 1800
                });
            });
        </script>
    @endif

@stop
