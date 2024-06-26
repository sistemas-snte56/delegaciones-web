@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CONFIGURACION DE PERMISOS</h1>
@stop

@section('content')
    <p>Lista de  <strong>Permiso</strong></p>
    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo" theme="primary" icon="fas fa-key" class="float-right" data-toggle="modal" data-target="#modalNuevoPermiso"  />
        </div>

        <div class="card-body">

            {{-- Setup data for datatables --}}
            @php
                $heads = ['ID', 'NOMBRE', ['label' => 'Actions', 'no-export' => true, 'width' => 15]];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';

                $config = [
                    // 'order' => [[1, 'asc']],
                    // 'columns' => [null, null, null, ['orderable' => true]],
                    'columns' => [null, null, null],
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                    ],
                    'paging' => false,
                    'lengthMenu' => [50,100,500],
                ];

            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped hoverable bordered compressed >
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{ $permiso->id }}</td>
                        <td>{{ $permiso->name }}</td>
                        <td>
                            <a href=" {{ route('permisos.edit',$permiso) }} " class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form action=" {{ route('permisos.destroy',$permiso) }} " method="post" class="formEliminar" style="display: inline">
                                @csrf
                                @method('DELETE')
                                {!! $btnDelete !!}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>



    {{-- Themed --}}
    <x-adminlte-modal id="modalNuevoPermiso" title="Nuevo Permiso" theme="primary"
        icon="fas fa-bolt" size='lg' disable-animations>
        <form action="{{route('permisos.store')}}" method="post">
            @csrf
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Ingresa el nombre del permiso"
                fgroup-class="col-md-12" disable-feedback/>
            </div>
            <x-adminlte-button label="Guardar" theme="success" icon="fas fa-save" type="submite" />
        </form>
    </x-adminlte-modal>

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
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    }
                });

            })
        });
    </script>
@stop