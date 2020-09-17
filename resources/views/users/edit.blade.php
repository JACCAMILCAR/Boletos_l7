@extends('master.master')

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
        <input class="btn btn-success" type="submit" value="Editar">
    </div>
</form>

@endsection