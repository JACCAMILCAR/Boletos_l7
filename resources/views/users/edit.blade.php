@extends('master.master3')

@section('content')
<h2>Editar Usuario</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="nombre" value="{{ $user->name}}">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="apellido" value="{{ $user->apellido}}">
    </div>
    <div class="form-group">
        <label for="ci">Cedula de Identidad</label>
        <input type="text" name="ci" class="form-control" id="ci" placeholder="ci" value="{{ $user->ci}}">
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="email" value="{{ $user->email}}">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="contraseña" minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar Contraseña">
    </div>
    <div class="form-group">
        <label for="role">Seleccionar Rol</label>
        <select class="rol form-control" name="rol" id="rol">
        <option value="">Seleccionar rol</option>
            @foreach($rols as $rol)
                <option data-rol-id="{{ $rol->id }}" data-rol-slug="{{ $rol->slug }}" value="{{ $rol->id }}" {{ $user->rols->isEmpty() || $rol->name != userRol->name ? "" : "selected" }}>{{ $rol->name }}</option>
            @endforeach
        </select>
    </div>
    <div id="permissions_box">
        <label for="rols">Seleccionar Permisos</label>
        <div id="permissions_checkbox_list">
        </div>
    </div>

    @if($user->permisos->isNotEmpty())
        <div id="user_permissions_box">
            <label for="rols">Permisos de usuario</label>
            <div id="user_permissions_checkbox_list">
                @foreach($rolPermiso as $permiso)
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="permisos[]" id="{{ $permiso->slug}}" value="{{ $permiso->id }}" {{in_array($permiso->id, $userPermisos->pluck('id')->toArray() ) ? 'checked = "checked"' : ''}}>
                        <label class="custom-control-label" for="{{ $permiso->slug }}">{{ $permiso->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

    @endif
    <div class="form-group">
        <input class="btn btn-success" type="submit" value="Editar">
    </div>
</form>

@section('js_user')

    <script>

        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_checkbox_list = $('#permissions_checkbox_list');
            var user_permissions_box = $('#user_permissions_box');
            var user_permissions_checkbox_list = $('#user_permissions_checkbox_list');
            permissions_box.hide();

            $('#rol').on('change', function(){
                var rol = $(this).find(':selected');
                var rol_id = rol.data('rol-id');
                var rol_slug = rol.data('rol-slug');

                permissions_checkbox_list.empty();
                user_permissions_box.empty();

                $.ajax({
                    url:"/users/create",
                    method:'get',
                    dataType: 'json',
                    data:{
                        rol_id: rol_id,
                        rol_slug: rol_slug,
                    }
                }).done(function(data){
                    permissions_box.show();
                    $.each(data, function(index, element){
                        $(permissions_checkbox_list).append(
                            '<div class="custom-control custom-checkbox">'+
                                '<input class="custom-control-input" type="checkbox" name="permisos[]" id="'+ element.slug +'" value="'+ element.id +'">'+
                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );
                    });
                });
            });
        });

    </script>

@endsection

@endsection