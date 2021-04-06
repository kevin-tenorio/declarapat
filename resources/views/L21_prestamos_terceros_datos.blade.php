@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              PRÉSTAMO O COMODATO POR TERCEROS
              <br>
              <small>Situación Actual</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf
                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  @if(Route::current()->parameters()['opcion'] == "inmueble")
                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Inmueble:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoInmueble_clave">Tipo de inmueble: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoInmueble_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoInmueble_clave" name="tipoInmueble_clave" autofocus required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoInmueble() as $inmueble)
                          <option value="{{ $inmueble->clave }}"
                            @if($inmueble->clave == old('tipoInmueble_clave'))
                            selected
                            @endif
                          >
                            {{ $inmueble->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoInmueble_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especifiqueOtro">
                        <label for="especifiqueOtro">Especifique Otro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueOtro') is-invalid @enderror" id="especifiqueOtro" name="especifiqueOtro" @if(old('especifiqueOtro')) value="{{old('especifiqueOtro')}}" @endif maxlength="50" required>
                        @error('especifiqueOtro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="pais">País: 🌐 <code>*</code></label>
                        <select class="form-control @error('pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="pais" name="pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('pais_clave') == $pais->ISO2)
                            selected
                            @elseif(old('pais_clave') ==  null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_entidadFederativa">
                        <label for="entidadFederativa_clave">Entidad Federativa:<code>*</code></label>
                        <select class="form-control @error('entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa_clave" name="entidadFederativa_clave">
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('entidadFederativa_clave'))
                              selected
                            @else

                            @endif
                          >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_municipioAlcaldia">
                        <label for="municipioAlcaldia_clave">Municipio/Alcaldía: <code>*</code></label>
                        <select class="form-control @error('municipioAlcaldia_clave') is-invalid @enderror" id="municipioAlcaldia_clave" name="municipioAlcaldia_clave" tabindex="{{ ++$tabindex }}">
                          <option value="">Seleccionar:</option>
                          @if(old('entidadFederativa_clave'))
                            @foreach($declaracion->catalogo->inegiAlcaldias(old('entidadFederativa_clave')) as $alcaldia)
                            <option value="{{ $alcaldia->Cve_Mun }}"
                              @if($alcaldia->Cve_Mun == old('municipioAlcaldia_clave'))
                                selected
                              @endif
                              >
                              {{ $alcaldia->Nom_Mun }}
                            </option>
                            @endforeach
                          @else

                          @endif
                        </select>
                        @error('municipioAlcaldia_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_coloniaLocalidad">
                        <label for="coloniaLocalidad">Colonia o Localidad: <code>*</code></label>
                        <select class="form-control @error('coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="coloniaLocalidad" name="coloniaLocalidad">
                          <option value="">Seleccionar:</option>
                          @if(old('entidadFederativa_clave'))

                            @if(old('municipioAlcaldia_clave'))

                                @foreach($declaracion->catalogo->inegiLocalidades(old('entidadFederativa_clave'),old('municipioAlcaldia_clave')) as $colonia)
                                <option value="{{ $colonia->Nom_Loc }}"
                                  @if($colonia->Nom_Loc == old('coloniaLocalidad'))
                                    selected
                                  @endif
                                  >
                                  {{ $colonia->Nom_Loc }}
                                </option>
                                @endforeach

                            @endif

                          @else


                          @endif
                        </select>
                        @error('coloniaLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_estadoProvincia">
                        <label for="estadoProvincia">Estado/Provincia: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('estadoProvincia') is-invalid @enderror" id="estadoProvincia" name="estadoProvincia" @if(old('estadoProvincia')) value="{{old('estadoProvincia')}}" @endif maxlength="50" required>
                        @error('estadoProvincia')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_ciudadLocalidad">
                        <label for="ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ciudadLocalidad') is-invalid @enderror" id="ciudadLocalidad" name="ciudadLocalidad" placeholder="" value="@if(old('ciudadLocalidad')){{ old('ciudadLocalidad') }}@else @endif" maxlength="100">
                        @error('ciudadLocalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="calle">Calle: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('calle') is-invalid @enderror" id="calle" name="calle" value="@if(old('calle')){{ old('calle') }}@endif" maxlength="100" required>
                        @error('calle')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroExterior">Número Exterior: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroExterior') is-invalid @enderror" id="numeroExterior" name="numeroExterior" value="@if(old('numeroExterior')){{ old('numeroExterior') }}@endif" maxlength="6" required>
                        @error('numeroExterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroInterior">Número Interior: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroInterior') is-invalid @enderror" id="numeroInterior" name="numeroInterior" placeholder="" value="@if(old('numeroInterior')){{ old('numeroInterior') }}@else @endif" maxlength="5">
                        @error('numeroInterior')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="codigoPostal">Código Postal: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('codigoPostal') is-invalid @enderror" id="codigoPostal" name="codigoPostal" placeholder="" value="@if(old('codigoPostal')){{ old('codigoPostal') }}@else @endif" maxlength="7" required >
                        @error('codigoPostal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>
                  @else
                  <fieldset>
                    <legend><h4 class="mb-3">Vehículo:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipo_clave">
                          Vehículo: 🌐 <code>*</code>
                        </label>
                        <select class="form-control @error('tipo_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipo_clave" name="tipo_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipovehiculo() as $vehiculo)
                          <option value="{{ $vehiculo->clave }}"
                            @if($vehiculo->clave == old('tipo_clave'))
                            selected
                            @endif
                            >
                            {{ $vehiculo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipo_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especifiqueOtro">
                        <label for="especifiqueOtro">Especifique Otro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueOtro') is-invalid @enderror" id="especifiqueOtro" name="especifiqueOtro" @if(old('especifiqueOtro')) value="{{old('especifiqueOtro')}}" @endif maxlength="50" required>
                        @error('especifiqueOtro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="marca">
                          Marca: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="@if(old('marca')){{ old('marca') }}@endif" maxlength="50" required>
                        @error('marca')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="modelo">
                          Modelo: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="@if(old('modelo')){{ old('modelo') }}@endif" maxlength="50" required>
                        @error('modelo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="anio">
                          Año : 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('anio') is-invalid @enderror" id="anio" name="anio" value="@if(old('anio')){{ old('anio') }}@endif" minlength="4" maxlength="4" required>
                        @error('anio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroSerieRegistro">
                          Número de Serie: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroSerieRegistro') is-invalid @enderror" id="numeroSerieRegistro" name="numeroSerieRegistro" value="@if(old('numeroSerieRegistro')){{ old('numeroSerieRegistro') }}@endif" maxlength="50" required>
                        @error('numeroSerieRegistro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="lugarRegistro_pais">País: 🌐 <code>*</code></label>
                        <select class="form-control @error('lugarRegistro_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="lugarRegistro_pais" name="lugarRegistro_pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('lugarRegistro_pais') == $pais->ISO2)
                            selected
                            @elseif(old('lugarRegistro_pais') == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('lugarRegistro_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_entidadFederativa">
                        <label for="entidadFederativa_clave">Entidad Federativa:<code>*</code></label>
                        <select class="form-control @error('entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa_clave" name="entidadFederativa_clave">
                          <option value="">Seleccionar:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Cve_Ent == old('entidadFederativa_clave'))
                              selected
                            @else

                            @endif
                          >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('entidadFederativa_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>
                  @endif
                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Dueño o Titular:</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoDuenoTitular">
                          Tipo persona: 🌐 <code>*</code>
                        </label>
                        <select class="form-control @error('tipoDuenoTitular') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoDuenoTitular" name="tipoDuenoTitular" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tipoDuenoTitular'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoDuenoTitular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="nombreTitular">
                          Nombre del titular: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreTitular') is-invalid @enderror" id="nombreTitular" name="nombreTitular" value="@if(old('nombreTitular')){{ old('nombreTitular') }}@endif" maxlength="100" required>
                        @error('nombreTitular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="rfc">
                          RFC: 🌐
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@endif" >
                        @error('rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="relacionConTitular">
                          Relación con el titular: <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('relacionConTitular') is-invalid @enderror" id="relacionConTitular" name="relacionConTitular" value="@if(old('relacionConTitular')){{ old('relacionConTitular') }}@endif" maxlength="100" required>
                        <small>¿Que relación tiene el declarante con el dueño del bien? Ejemplo: Amigo</small>
                        @error('relacionConTitular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                  </fieldset>

                  <p>&nbsp;</p>

                  <button tabindex="{{ ++$tabindex }}" class="btn btn-primary btn-lg btn-block" type="submit">Siguiente</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')


$(document).ready(function(){

  @if(Route::current()->parameters()['opcion'] == "inmueble")

    $("#tipoInmueble_clave").ready(mostrar_otro);
    $("#tipoInmueble_clave").change(mostrar_otro);

    $("#pais").ready(mostrar_mexico);
    $("#pais").change(mostrar_mexico);

    $("#entidadFederativa_clave").change(mostrar_alcaldias);
    $("#municipioAlcaldia_clave").change(mostrar_localidades);
    $("#coloniaLocalidad").change(mostrar_cp);

    function mostrar_mexico()
    {
      var paisValue = $("#pais").val();

      if(paisValue == "MX")
      {
        $('#div_entidadFederativa').show();
        $('#div_municipioAlcaldia').show();
        $('#div_coloniaLocalidad').show();

        $('#div_estadoProvincia').hide();
        $('#div_ciudadLocalidad').hide();

        $('#entidadFederativa_clave').attr("required","required");
        $('#municipioAlcaldia_clave').attr("required","required");
        $('#coloniaLocalidad').attr("required","required");
        $('#entidadFederativa_clave').attr("name","entidadFederativa_clave");
        $('#municipioAlcaldia_clave').attr("name","municipioAlcaldia_clave");
        $('#coloniaLocalidad').attr("name","coloniaLocalidad");
        $('#codigoPostal').attr("readonly","readonly");

        $('#estadoProvincia').removeAttr("name");
        $('#ciudadLocalidad').removeAttr("name");
        $('#estadoProvincia').removeAttr("required");
        $('#ciudadLocalidad').removeAttr("required");
      }
      else
      {
        $('#div_entidadFederativa').hide();
        $('#div_municipioAlcaldia').hide();
        $('#div_coloniaLocalidad').hide();

        $('#div_estadoProvincia').show();
        $('#div_ciudadLocalidad').show();

        $('#estadoProvincia').attr("required","required");
        $('#ciudadLocalidad').attr("required","required");
        $('#estadoProvincia').attr("name","estadoProvincia");
        $('#ciudadLocalidad').attr("name","ciudadLocalidad");

        $("#entidadFederativa_clave").removeAttr("name");
        $('#municipioAlcaldia_clave').removeAttr("name");
        $('#coloniaLocalidad').removeAttr("name");
        $("#entidadFederativa_clave").removeAttr("required");
        $('#municipioAlcaldia_clave').removeAttr("required");
        $('#coloniaLocalidad').removeAttr("required");

        $('#codigoPostal').removeAttr("readonly");
        $('#codigoPostal').attr("maxlength","13");
      }
    }

    function mostrar_alcaldias()
    {
      var entidadValue = $("#entidadFederativa_clave").val();

      $('#municipioAlcaldia_clave').find('option').not(':first').remove();

      $.ajax({
        url: '../../../../catalogo/getAlcaldias/'+entidadValue,
        type: 'get',
        dataType: 'json',
        success: function(response)
        {
          var len = 0;
          if(response != null)
          {
            len = response.length;
          }

          if(len > 0)
          {

            for(var i=0; i<len; i++)
            {
              var id = response[i].Cve_Mun;
              var nombre = response[i].Nom_Mun;
              var entidad = response[i].Cve_Ent;
              var option = "<option value='"+id+"'>"+nombre+"</option>";

              $("#municipioAlcaldia_clave").append(option);
              $('#coloniaLocalidad').find('option').not(':first').remove();
            }
          }
        }
      });
    };

    function mostrar_localidades()
    {
      var entidadValue = $("#entidadFederativa_clave").val();
      var alcaldiaValue = $("#municipioAlcaldia_clave").val();

      $('#coloniaLocalidad').find('option').not(':first').remove();

      $.ajax({
        url: '../../../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
        type: 'get',
        dataType: 'json',
        success: function(response)
        {
          var len = 0;
          if(response != null)
          {
            len = response.length;
          }

          if(len > 0)
          {

            for(var i=0; i<len; i++)
            {
              var nombre = response[i].Nom_Loc;
              var option = "<option value='"+nombre+"'>"+nombre+"</option>";
              $("#coloniaLocalidad").append(option);
            }
          }
        }
      });
    }

    function mostrar_cp()
    {
      var entidadValue = $("#entidadFederativa_clave").val();
      var alcaldiaValue = $("#municipioAlcaldia_clave").val();
      var localidadValue = $("#coloniaLocalidad").val();

      $.ajax({
        url: '../../../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
        type: 'get',
        dataType: 'json',
        success: function(response)
        {
          var len = 0;
          if(response != null)
          {
            len = response.length;
          }

          if(len > 0)
          {

            for(var i=0; i<len; i++)
            {
              var cp = response[i].CP;
              $("#codigoPostal").val(cp);
              $("#codigoPostal").attr("readonly","readonly");
            }
          }
        }
      });
    }//////

  @else

    $("#tipo_clave").ready(mostrar_otro);
    $("#tipo_clave").change(mostrar_otro);

    $("#lugarRegistro_pais").ready(mostrar_mexico);
    $("#lugarRegistro_pais").change(mostrar_mexico);

    function mostrar_mexico()
    {
      var paisValue = $("#lugarRegistro_pais").val();

      if(paisValue == "MX")
      {
        $('#div_entidadFederativa').show();
        $('#entidadFederativa_clave').attr("required","required");
        $('#entidadFederativa_clave').attr("name","entidadFederativa_clave");
      }
      else
      {
        $('#div_entidadFederativa').hide();
        $("#entidadFederativa_clave").removeAttr("name");
        $("#entidadFederativa_clave").removeAttr("required");
      }
    }

  @endif

  function mostrar_otro()
  {
    @if(Route::current()->parameters()['opcion'] == "inmueble")
    var prestamoValue = $("#tipoInmueble_clave").val();
    @else
    var prestamoValue = $("#tipo_clave").val();
    @endif

    if(prestamoValue == "OTRO")
    {
      $('#div_especifiqueOtro').show();
      $('#especifiqueOtro').attr("required","required");
    }
    else
    {
      $('#div_especifiqueOtro').hide();
      $('#especifiqueOtro').removeAttr("required");
    }
  }


  $("#tipoDuenoTitular").ready(largo_rfc);
  $("#tipoDuenoTitular").change(largo_rfc);

  function largo_rfc()
  {
    var personaValue = $("#tipoDuenoTitular").val();

    if(personaValue == "MORAL")
    {
      $('#rfc').attr("maxlength","12");
      $('#rfc').attr("minlength","12");
    }
    else
    {
      $('#rfc').attr("maxlength","13");
      $('#rfc').attr("minlength","13");
    }
  }

});
@endsection
