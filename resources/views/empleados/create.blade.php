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
        <a href="{{url('/empleados')}}">Listar Empleados </a>
    <form action="{{url('/empleados')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('empleados.form',['modo'=>'guardar'])
   
    </form>
</div>
@endsection
   
</body>
</html>
 