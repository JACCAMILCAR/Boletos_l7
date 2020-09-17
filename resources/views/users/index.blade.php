@extends('master.master')

@section('content')

            <div class="row py-lg-2">
                <div class="col-md-6">
                    <h2>Añadir Usuario</h2>
                </div>
                <div class="col-md-6">
                    <a href="/users/create" class="btn btn-success btn-lg float-md-right" role="button" aria-pressed="true">Añadir Nuevo Usuario</a>
                </div>

            </div>
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                    Lista de Usuario
            </div>
            <!-- <div class="card-body">
                    <div class="table-responsive"> -->
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Foto</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Nombre</th>
                                    <th>Foto</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>                                            
                            </tfoot>
                            <tbody>
                                @foreach($users as $user)
                                <tr>  
                                    <td>{{$user['name']}}</td>
                                    <td>
                                    <img src="{{asset('storage').'/'.$user['foto']}}" alt="" width="150">    
                                    </td>
                                    <td>{{$user['email']}}</td>
                                    <td>
                                        <a href="/users/{{ $user['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                        <form action="{{ url('users/'.$user->id) }}" method="post">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE')}}
                                            <button type="submit" onclick="return confirm('¿Eliminar?')" class="btn-success"><i class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach                                        
                            </tbody>
                        </table>

@section('js_user')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('frontend') }}/dist/assets/demo/chart-area-demo.js"></script>
<script src="{{ asset('frontend') }}/dist/assets/demo/chart-bar-demo.js"></script>
<script src="{{ asset('frontend') }}/dist/assets/demo/datatables-demo.js"></script>

@endsection

@endsection