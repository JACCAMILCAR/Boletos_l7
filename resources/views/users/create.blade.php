@extends('master.master')

@section('content')
<h2>Crear Usuario</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/users" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="nombre" value="" required>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" name="foto" class="form-control" id="foto" placeholder="foto" value="" required>
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="email" value="">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="contraseña" required minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar Contraseña">
    </div>
    
    
    <div class="form-group pt-2">
        <input class="btn btn-success" type="submit" value="Registrar">
    </div>
</form>


@endsection