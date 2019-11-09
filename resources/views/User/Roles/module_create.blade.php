@extends('template.content')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item">Roles</li>
                            <li class="breadcrumb-item">Modulos</li>
                            <li class="breadcrumb-item active">Agregar Modulo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agregar Modulo</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.modules.attach', ['role_id' => $role_id]) }}" class="form" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <select name="module" id="module" class="form-control" required>
                                @foreach($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right"><i class="fa fa-plus"></i> Agregar</button>
                            <a href="{{ route('roles.modules', ['id' => $role_id]) }}" class="btn btn-default float-left"><i class="fa fa-arrow-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
