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
              Bienes Muebles
              <br>
              <small> (Situación Actual) </small>
              <small> (Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)   </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Bien:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="titular">Titular del bien: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoInmueble') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="titular" name="titular">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                          <option value="{{ $relacion->valor }}"
                            @if($relacion->valor == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('relacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="tipoBien">Tipo de Bien: 🌐 <code>*</code></label>
                        <select class="form-control @error('representacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoBien" name="tipoBien">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRepresentacion() as $representacion)
                          <option value="{{ $representacion->valor }}"
                            @if($representacion->valor == old('representacion'))
                            selected
                            @endif
                            >
                            {{ $representacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoBien')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="descripcionGeneralBien"> Descripción General del Bien: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('descripcionGeneralBien') is-invalid @enderror" id="descripcionGeneralBien" name="descripcionGeneralBien" value="@if(old('descripcionGeneralBien')){{ old('descripcionGeneralBien') }}@endif">
                        @error('descripcionGeneralBien')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Transmisor:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoPersona" name="tipoPersona">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                          <option value="{{ $relacion->valor }}"
                            @if($relacion->valor == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('relacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="nombreRazonSocial"> Nombre del Transmisor: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreRazonSocial') is-invalid @enderror" id="nombreRazonSocial" name="nombreRazonSocial" value="@if(old('nombreRazonSocial')){{ old('nombreRazonSocial') }}@endif">
                        @error('nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="rfc"> RFC: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@endif">
                        @error('rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="relacion">Relación: 🌐 <code>*</code></label>
                        <select class="form-control @error('relacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="relacion" name="relacion">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                          <option value="{{ $relacion->valor }}"
                            @if($relacion->valor == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('relacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos de Adquisición del Bien Mueble</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="formaAdquisicion">Forma de Adquisición 🌐 <code>*</code></label>
                        <select class="form-control @error('formaPago') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaAdquisicion" name="formaAdquisicion">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->valor }}"
                            @if($persona->valor == old('persona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('formaAdquisicion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="formaPago">Forma de Pago: 🌐 <code>*</code></label>
                        <select class="form-control @error('formaPago') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaPago" name="formaPago">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                          <option value="{{ $relacion->valor }}"
                            @if($relacion->valor == old('relacion'))
                            selected
                            @endif
                            >
                            {{ $relacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('formaPago')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaAdquisicion"> Fecha de Adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaAdquisicion') is-invalid @enderror" id="fechaAdquisicion" name="fechaAdquisicion" value="@if(old('fechaAdquisicion')){{ old('fechaAdquisicion') }}@endif">
                        @error('fechaAdquisicion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="valorAdquisicion_valor" class="col-sm-4 col-form-label">
                        Valor de Adquisición: 🌐 <code>*</code>
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

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Motivo de Baja</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-6 mb-3">
                        <label for="motivoBaja">Motivo de Baja 🌐 <code>*</code></label>
                        <select class="form-control @error('motivoBaja') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="motivoBaja" name="motivoBaja">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->valor }}"
                            @if($persona->valor == old('persona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('motivoBaja')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    </fieldset>

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
<!--**********************************
Content body end
***********************************-->
@endsection

@section('script')
$("#pais").ready(entidad);
$("#pais").change(entidad);

function entidad()
{
  var paisValue = $("#pais").val();

  if(paisValue == "MX")
  {
    $('#div_entidadFederativa').show();
  }
  else
  {
    $('#div_entidadFederativa').hide();
  }
}



$("#sector").ready(sector);
$("#sector").change(sector);

function sector()
{
  var sectorValue = $("#sector").val();

  if(sectorValue == "OTRO")
  {
    $('#div_especifiqueSector').show();
  }
  else
  {
    $('#div_especifiqueSector').hide();
  }
}

@endsection
