<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
    <!-- {--//recibe la funcion mensaje desde el controler para mostrar un mensaje de confirmacion --} -->
    @if(Session::has('mensaje1'))
        {{Session::get('mensaje2')}}
    @endif
    <a href="{{url('/empleados/create')}}" class="btn btn-success">Registrar Nuevo Empleado</a>
<h1>LISTA LOS DATOS DE LOS EMPLEADOS</h1>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>p. Apellido</th>
                <th>s. Apellido</th>
                <th>Correo</th>
                <th>Accion</th>
            </tr>
        </thead>
        
    <tbody>
       @foreach ($empleados as $datos)
    <tr>
        <td >{{$datos->id}}</td>
        <td><img src="{{asset('storage').'/'.$datos->Foto}}" alt=""width="200px" ></td>
        <td>{{$datos->Nombre}}</td>
        <td>{{$datos->PrimerApel}}</td>
        <td>{{$datos->SegundoApel}}</td>
        <td>{{$datos->Correo}}</td>
        <td><a href="{{url('/empleados/'.$datos->id.'/edit')}}"class="btn btn-warning"> 
           Editar</a><br>
          |
            
            <form action="{{url('/empleados/'.$datos->id)}}" method="POST" >
                @csrf
                {{method_field('DELETE')}}
                <input type="submit"  onclik="return confirm('¿Desea Eliminar?')" value="Eliminar"class="btn btn-danger">
            </form>
            </td>

    </tr>
      @endforeach
    </tbody> 
</table> 
     @endsection

    

</body>
</html>