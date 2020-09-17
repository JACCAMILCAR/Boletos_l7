@extends('master.master3')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Nombre: {{$user->name}}</h3>
            <h4>Apellido: {{$user->apellido}}</h4>
            <h4>C.I.: {{$user->ci}}</h4>
            <h4>Correo: {{$user->email}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Rol</h5>
            <p class="card-text">
                @if($user->rols->isNotEmpty())
                    @foreach($user->rols as $rol)
                        <span class="badge badge-success">
                            {{ $rol->name }}
                        </span>
                @endforeach
                @endif
            </p>
            <h5 class="card-title">Permisos</h5>
            <p class="card-text">
                @if($user->permisos->isNotEmpty())
                    @foreach($user->permisos as $permiso)
                        <span class="badge badge-success">
                            {{ $permiso->name }}
                         </span>
                    @endforeach
                @endif
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-success">Ir atras</a>
        </div>
    </div>

</div>
@endsection