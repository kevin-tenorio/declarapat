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
              VEHÍCULO
              <br>
              <small> (Situación Actual) </small>
              <small>(Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Titular del Vehículo:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="titular">Titular (Dueño del Vehículo): 🌐 <code>*</code></label>
                        <select class="form-control @error('titular') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="titular" name="titular">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->titulares() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('titular'))
                            selected
                            @endif
                          >
                          {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('titular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Vehículo:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="tipoVehiculo">Tipo de Vehículo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoVehiculo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoVehiculo" name="tipoVehiculo" autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoVehiculo() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tipoVehiculo'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoVehiculo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-6 mb-3" id="div_tipoVehiculo_especifique">
                        <label for="tipoVehiculo_especifique">Especifique tipo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tipoVehiculo_especifique') is-invalid @enderror" id="tipoVehiculo_especifique" name="tipoVehiculo_especifique" value="@if(old('tipoVehiculo_especifique')){{ old('tipoVehiculo_especifique') }}@endif" maxlength="100">
                        @error('tipoVehiculo_especifique')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>

                      <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="marca">Marca: 🌐 <code>*</code></label>
                        <input type="list" tabindex="{{ ++$tabindex }}" class="form-control @error('marca') is-invalid @enderror" id="marca" name="fideicomitente_nombreRazonSocial" value="@if(old('marca')){{ old('marca') }}@endif">
                        @error('marca')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-6 mb-3">
                        <label for="modelo">Modelo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="@if(old('modelo')){{ old('modelo') }}@endif" maxlength="100" required>
                        @error('modulo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>

                      <div class="row">
                      <div class="form-group col-md-6 mb-3">
                        <label for="anio">Año: 🌐 <code>*</code></label>
                        <input type="number" step="1" tabindex="{{ ++$tabindex }}" class="form-control @error('anio') is-invalid @enderror" id="anio" name="anio" value="@if(old('anio')){{ old('anio') }}@endif" maxlength="100">
                        @error('anio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-6 mb-3">
                        <label for="numeroSerieRegistro">No. Serie / Registro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroSerieRegistro') is-invalid @enderror" id="numeroSerieRegistro" name="numeroSerieRegistro" value="@if(old('numeroSerieRegistro')){{ old('numeroSerieRegistro') }}@endif" maxlength="100">
                        @error('numeroSerieRegistro')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <fieldset>

                      <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del Transmisor:</h4></legend>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="fideicomitente_tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('fideicomitente_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="fideicomitente_tipoPersona" name="fideicomitente_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('fideicomitente_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('fideicomitente_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-6">
                        <label for="fideicomitente_nombreRazonSocial">Nombre o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fideicomitente_nombreRazonSocial') is-invalid @enderror" id="fideicomitente_nombreRazonSocial" name="fideicomitente_nombreRazonSocial" value="@if(old('fideicomitente_nombreRazonSocial')){{ old('fideicomitente_nombreRazonSocial') }}@endif" maxlength="100" required>
                        @error('fideicomitente_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="fideicomitente_rfc">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fideicomitente_rfc') is-invalid @enderror" id="fideicomitente_rfc" name="fideicomitente_rfc" value="@if(old('fideicomitente_rfc')){{ old('fideicomitente_rfc') }}@endif">
                        @error('fideicomitente_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6" id="div_transmisor_relacion">
                        <label for="transmisor_relacion">Relación del transmisor de la propiedad con el titular: 🌐 <code>*</code></label>
                        <select class="form-control @error('transmisor_relacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="transmisor_relacion" name="transmisor_relacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->beneficiarios() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('transmisor_relacion'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('fideicomitente_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-6" id="div_transmisor_relacion_especifique">
                        <label for="transmisor_relacion_especifique">Especifique relación: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('transmisor_relacion_especifique') is-invalid @enderror" id="transmisor_relacion_especifique" name="fideicomitente_rfc" value="@if(old('transmisor_relacion_especifique')){{ old('transmisor_relacion_especifique') }}@endif">
                        @error('fideicomitente_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>


                      <fieldset>
                        <legend><h4 class="mb-3">Ubicación del Registro:</h4></legend>

                        <div class="row">
                        <div class="form-group col-md-6 mb-3">
                          <label for="lugarRegistro_pais">Lugar Registro: 🌐 <code>*</code></label>
                          <select class="form-control @error('lugarRegistro_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="lugarRegistro_pais" name="lugarRegistro_pais">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->ISO2 }}"
                              @if(old('lugarRegistro_pais') == $pais->ISO2)
                              selected
                              @elseif($pais->default == true)
                              selected
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

                        <div class="form-group col-md-6 mb-3" id="div_lugarRegistro_entidadFederativa">
                          <label for="lugarRegistro_entidadFederativa">Entidad Federativa: 🌐 <code>*</code></label>
                          <select class="form-control @error('lugarRegistro_entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="lugarRegistro_entidadFederativa" name="lugarRegistro_entidadFederativa">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->ISO2 }}"
                              @if(old('lugarRegistro_entidadFederativa') == $pais->ISO2)
                              selected
                              @elseif($pais->default == true)
                              selected
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                            </option>
                            @endforeach
                          </select>
                          @error('lugarRegistro_entidadFederativa')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                    </fieldset>

                    <p>&nbsp;</p>

                    <fieldset>
                      <legend><h4 class="mb-3">Datos de Adquisición:</h4></legend>

                      <div class="row">
                      <div class="form-group col-md-4 mb-3">
                        <label for="formaAdquisicion_clave">Forma adquisición: 🌐 <code>*</code></label>
                        <select class="form-control @error('formaAdquisicion_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaAdquisicion_clave" name="formaAdquisicion_clave">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaAdquisicion() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('formaAdquisicion_clave'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('formaAdquisicion_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="fechaAdquision">Fecha adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaAdquision') is-invalid @enderror" id="fechaAdquision" name="fechaAdquision" value="@if(old('fechaAdquision')){{ old('fechaAdquision') }}@endif">
                        @error('fechaAdquision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="formaPago">Forma de pago: 🌐 <code>*</code></label>
                        <select class="form-control @error('formaPago') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaPago" name="formaPago">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formapago() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('formaPago'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('formaPago')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      </div>

                    <div class="form-group row">
                      <label for="valorAdquisicion_valor" class="col-sm-4 col-form-label">
                        Valor de la adquisición: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('valorAdquisicion_valor') is-invalid @enderror" id="valorAdquisicion_valor" name="valorAdquisicion_valor" value="@if(old('valorAdquisicion_valor')){{ old('valorAdquisicion_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('valorAdquisicion_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control @error('valorAdquisicion_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="valorAdquisicion_moneda" name="valorAdquisicion_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('valorAdquisicion_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('valorAdquisicion_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('valorAdquisicion_moneda')
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

$("#tipoVehiculo").ready(tipoVehiculo);
$("#tipoVehiculo").change(tipoVehiculo);

function tipoVehiculo()
{
  var tipoValue = $("#tipoVehiculo").val();

  if(tipoValue == "OTRO")
  {
    $('#div_tipoVehiculo_especifique').show();
  }
  else
  {
    $('#div_tipoVehiculo_especifique').hide();
  }
}


$("#transmisor_relacion").ready(transmisor_relacion);
$("#transmisor_relacion").change(transmisor_relacion);

function transmisor_relacion()
{
  var relacionValue = $("#transmisor_relacion").val();

  if(relacionValue == "OTRO")
  {
    $('#div_transmisor_relacion_especifique').show();
  }
  else
  {
    $('#div_transmisor_relacion_especifique').hide();
  }
}


$("#lugarRegistro_pais").ready(lugarRegistro_entidadFederativa);
$("#lugarRegistro_pais").change(lugarRegistro_entidadFederativa);

function lugarRegistro_entidadFederativa()
{
  var paisValue = $("#lugarRegistro_pais").val();

  if(paisValue == "MX")
  {
    $('#div_lugarRegistro_entidadFederativa').show();
  }
  else
  {
    $('#div_lugarRegistro_entidadFederativa').hide();
  }
}

@endsection
