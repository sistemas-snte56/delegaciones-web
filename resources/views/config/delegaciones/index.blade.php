@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACIÓN DE DELEGACIONES</h1>
@stop

@section('content')
    <div class="card">
        @role('Administrador')
        <div class="card-header">
            Lista de <strong>Delegaciones</strong>
            <a href="{{route('delegacion.create')}}" class="btn btn-primary float-right"><i class="fa fa-sm fa-fw fa-pen"></i> Nuevo</a>
        </div>
        @endrole
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = [
                    // ['label'=>'NO'],
                    // ['label'=>'ID', 'no-export' => false], 
                    'NO',
                    'ID',
                    'REGIÓN', 
                    'DELEGACION', 
                    'NIVEL', 
                    'SEDE', 
                    'INICIO', 
                    'FINAL', 
                    ['label' => 'ACCIONES', 'no-export' => true, 'width' => 15]
                ];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '';

                $config = [
                    // 'order' => [[0, 'asc'],  [4 , 'asc']],

                    'columns' => [
                        ['orderable' => false,'visible' => true, 'type' => 'num'],
                        ['orderable' => false,'visible' => true, 'type' => 'num'],
                        ['orderable' => false,'visible' => true], 
                        ['orderable' => true,'visible' => true, 'type' => 'text'], 
                        ['orderable' => false,'visible' => true], 
                        ['orderable' => false,'visible' => true], 
                        ['orderable' => false,'visible' => true], 
                        ['orderable' => false,'visible' => true], 
                        ['orderable' => false,'visible' => true], 
                    ],
                    'order' => [3 , 'asc'],

                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                    ],
                    // 'order' => [[4, 'asc']],
                    'lengthMenu' => [50,100,500],
                    'searching' => true,
                    'paging' => true,
                    'info' => true,

                    /*'columnsDefs' => [
                        // ['type' => 'num', 'target' => 0],
                        ['visible' => false, 'target' => 0],
                    ],*/
                    

                ];

                

            @endphp
            <x-adminlte-datatable id="delegaciones" :heads="$heads" :config="$config" striped hoverable bordered compressed with-buttons>
                @php $contador = 1; @endphp
                @foreach($delegaciones as $delegacion)
                    <tr>
                        <td>{{ $contador++}}</td>
                        <td>{{ $delegacion->id }}</td>
                        <td>{{ $delegacion->region->region }} - {{ $delegacion->region->sede }} </td>
                        <td>{{ $delegacion->nomenclatura->nomenclatura }}{{ $delegacion->num_delegaciona }}  </td>
                        <td>{{ $delegacion->nivel_delegaciona }}</td>
                        <td>{{ $delegacion->sede_delegaciona }}</td>
                        <td>{{ $delegacion->fecha_inicio_delegaciona }}</td>
                        <td>{{ $delegacion->fecha_final_delegaciona }}</td>
                        <td>
                            @can('delegacion.show')
                                <a href="{{route('delegacion.show', $delegacion)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Mostrar">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>                            
                            @endcan

                            @can('delegacion.date')
                                <a href="{{route('delegacion.date', $delegacion)}}" target="_blank" class="btn btn-xs buttons-print btn-default  mx-1 " title="Imprimir Directorio">
                                    <i class="fas fa-fw fa-lg fa-edit"></i>
                                </a>                            
                            @endcan

                            @can('delegacion.print')
                                <a href="{{route('delegacion.print', $delegacion)}}" target="_blank" class="btn btn-xs buttons-print btn-default  mx-1 " title="Imprimir hoja">
                                    <i class="fas fa-fw fa-lg fa-print"></i>
                                </a>                            
                            @endcan

                            @can('delegacion.destroy')
                                <form action="{{route('delegacion.destroy',$delegacion)}}" method="post" class="formEliminar" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    {!! $btnDelete !!}
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                @php
                    $numeroLista = 0;
                @endphp
            </x-adminlte-datatable>
        </div>
    </div>
@stop

@section('css')
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
                        if (result.isConfirmed) {
                            this.submit();
                        }
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
                    timer: 1900
                });
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
                    text: "Debido a que depende de alguna Secretaría. "
                });
            });            
        </script>
    @endif

@stop

