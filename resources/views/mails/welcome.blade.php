<div class="text-center">
  <img src="{{asset('img/enflora.png')}}" width="300"/>
  <h3>Bienvenido <strong>{{$user->full_name}}</strong></h3>
  <p>
    Has sido seleccionado para los nuevos cupos de membresía.
  </p>
  <p>
    Para activar tu membresía debes ingresar al siguiente link

  </p>
  <p>
    Usuario:{{$user->mail}}<br />
    Contraseña: 3HDrSOvRIs
  </p>
  <a class="btn btn-primary btn-block" href="{{route('login')}}">Ingresa acá</a>
  <p> se solicitara cambiar de contraseña una vez ingresado</p>

</div>
