@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ADMINISTRACIÓN DE REGIONES</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Lista de <strong>Regiones</strong>
            <a href="{{route('region.create')}}" class="btn btn-primary float-right"><i class="fa fa-sm fa-fw fa-pen"></i> Nuevo</a>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach ($regiones as $region)
                    <div class="col-sm-4">
                        <div class="card">
                            <x-adminlte-small-box title="{{ $region->region}} - {{ $region->sede}}" 
                                text="{{ $region->delegaciones_count }} Delegaciones" 
                                icon="fa fa-users fa-2x text-white"
                                theme="secondary" 
                                url="{{ route('region.show', $region) }}" 
                                url-text="Ver todas las delegaciones" />
                                <!-- Botones adicionales -->
                                <div class="small-box-footer" style="margin-bottom: 6px; margin-left: 6px;" >
                                    {{-- <a href="{{ route('region.show', $region) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a> --}}
                                    <a href="{{ route('region.edit', $region) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $region->id }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button> --}}
                                </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
            <div class="tota-delegaciones">
                Total Delegaciones: {{ $regiones->sum('delegaciones_count') }}
            </div>
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
