@extends('template.content')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Compañias</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item">Compañias</li>
                            <li class="breadcrumb-item active">Crear Compañia</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Compañia</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/companias') }}" class="form" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nit">NIT</label>
                            <input type="text" name="nit" id="nit" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right"><i class="fa fa-plus"></i> Crear</button>
                            <a href="{{ url('/companias') }}" class="btn btn-default float-left"><i class="fa fa-arrow-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

