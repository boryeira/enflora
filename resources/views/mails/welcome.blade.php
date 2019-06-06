<div class="text-center">
  <img src="{{asset('img/enflora.png')}}" width="300"/>
  <h3>Bienvenido <strong>{{$user->full_name}}</strong></h3>
  <p>
    Has sido seleccionado para los nuevos cupos de membresía.
  </p>

    <a class="btn btn-primary btn-block" href="{{route('login')}}">Ingresa acá</a>
  <p>
    Activa tu membresía con las siguientes credenciales.<br /><br />

    Usuario: {{$user->email}}<br />
    Contraseña: 3HDrSOvRIs
  </p>
  <p> se solicitara cambiar de contraseña una vez ingresado</p>

</div>
