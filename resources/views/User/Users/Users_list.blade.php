@extends('template.content')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Usuarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Usuarios</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['cedula'] }}</td>
                                    <td>{{ $item['nombre'] }}</td>
                                    <td>{{ $item['correo'] }}</td>
                                    <td>{{ $item['telefono'] }}</td>
                                    <td>
                                        <button class="btn btn-danger eliminar" data-id="{{ $item['id'] }}"><i class="fa fa-trash"></i> Eliminar</button>
                                        <a href="{{ url('/usuarios/roles/' . $item['id'] ) }}" class="btn btn-primary"><i class="fa fa-user"></i> Roles</a>
                                        <a href="{{ url('/usuarios/companies/' . $item['id'] ) }}" class="btn btn-info"><i class="fa fa-home"></i> Compañias</a>
                                        <a href="{{ url('/usuarios/' . $item['id'] . '/edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
                                        <button class="btn {{ ($item['status'] == 1) ? 'btn-success' : 'btn-danger' }}  status" data-id="{{ $item['id'] }}" data-status="{{ ($item['status'] == 1) ? 1 : 0 }}"><i class="fa {{ ($item['status'] == 1) ? 'fa-unlock' : 'fa-lock' }}"></i>  {{ ($item['status'] == 1) ? 'Activo' : 'Desactivo' }}</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ url('/usuarios/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Crear</a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        @if (session('message'))
        Swal.fire({
            type: 'success',
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 2000
        });
        @endif

        $('.eliminar').click(function (e) {
            var info = $(this).parents('tr');
            var data = $(this).data();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Desea borrar?',
                text: "Este usuario",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('/usuarios') }}" + '/' + data['id'],
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        dataType : 'json',
                        error : function(xhr, status) {
                            alert('Disculpe, existió un problema');
                        },
                        success : function(xhr, status) {
                            info.remove();
                            swalWithBootstrapButtons.fire(
                                'Eliminado!',
                                'El usuario fue eliminado. ',
                                'success'
                            );
                        }
                    });
                }
            })
        });

        $('.status').click(function (e) {
            var btn = $(this);
            var data = btn.data();
            btn.addClass('overlay dark disabled');

            $.ajax({
                url: "{{ url('/usuarios/status/') }}" + '/' + data['id'],
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": data['status'],
                },
                dataType : 'json',
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                success : function(xhr, status) {
                    console.log("xhr" + xhr);
                    console.log("status" + status);
                    if (xhr.status)//Para activar usuario
                    {
                        //remover clases
                        btn.removeClass('overlay dark disabled btn-danger');
                        btn.children('i').removeClass('fa-lock');

                        //Agregar clases
                        btn.addClass('btn-success');
                        btn.children('i').addClass('fa-unlock');

                        btn.contents().last().replaceWith(" Activo");
                    }else{//Para desactivar usuario usuario
                        //remover clases
                        btn.removeClass('overlay dark disabled btn-success');
                        btn.children('i').removeClass('fa-unlock');

                        //Agregar clases
                        btn.addClass('btn-danger');
                        btn.children('i').addClass('fa-lock');

                        btn.contents().last().replaceWith(" Desactivo");
                    }

                    swalWithBootstrapButtons.fire(
                        xhr.title,
                        xhr.message,
                        'success'
                    );
                }
            });
        });
    </script>
@endsection

