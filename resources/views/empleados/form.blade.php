<p>Formulario que tendra los datos para crear o actualizar los empleados </p><br>

<a href="{{url('/empleados/')}}" class="btn btn-success">Lista De empleados</a><br>
<input type="text" value="{{isset($empleado->Nombre)?$empleado->Nombre:''}}" name="Nombre" id="Nombre" placeholder="Introdusca Nombre"><br>
    <input type="text" value="{{isset($empleado->PrimerApel)?$empleado->PrimerApel:''}}" name="PrimerApel" id="PrimerApel" placeholder="Introduzca primer Apellido"><br>
    <input type="text" value="{{isset($empleado->SegundoApel)?$empleado->SegundoApel:''}}" name="SegundoApel" id="SegundoApel" placeholder="Introduzca segundo Apellido"><br>
    <input type="text" value="{{isset($empleado->Correo)?$empleado->Correo:''}}"  name="Correo" id="Correo" placeholder="Introduzca el correo"><br>
    <input type="file" name="Foto" id="Foto"><br>
    @if(isset($empleado->Foto))
      <img src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="220" height="220">
    @endif
    <br><br>
    <input type="submit" value="{{$modo}} Registro">

    <a href="{{url('/empleados/create')}}" ></a>
    