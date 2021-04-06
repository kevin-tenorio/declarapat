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
              REPRESENTACIÓN
              <br>
              <small>(Hasta los dos últimos años)</small>
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
                      <h4 class="mb-3">Datos de Representación:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoRelacion">¿Quién está relacionado?: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRelacion" name="tipoRelacion">
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

                      <div class="col-md-4 mb-3">
                        <label for="tipoRepresentacion">Tipo de representación: 🌐 <code>*</code></label>
                        <select class="form-control @error('representacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRepresentacion" name="tipoRepresentacion">
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
                        @error('representacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaInicioRepresentacion">Fecha de inicio: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control" id="fechaInicioRepresentacion" name="fechaInicioRepresentacion" >
                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Datos del <span id="span_representante">Representante</span> <span id="span_representado">Representado</span>:</h4></legend>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="tipoPersona">Tipo de persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoPersona" name="tipoPersona">
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
                        @error('tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-5 mb-3">
                        <label for="nombreRazonSocial">Nombre o Razón Social 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreRazonSocial') is-invalid @enderror" id="nombreRazonSocial" name="nombreRazonSocial" value="@if(old('nombreRazonSocial')){{ old('empresa_nombreRazonSocial') }}@endif">
                        @error('nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="rfc"> RFC: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('nombreRazonSocial') }}@endif">
                        @error('rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_pais">
                        <label for="pais">País : 🌐 <code>*</code></label>
                        <select class="form-control @error('pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="pais" name="pais" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if($pais->ISO2 == old('pais'))
                            selected
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
                        <label for="entidadFederativa_clave">Estado: 🌐 <code>*</code></label>
                        <select class="form-control @error('entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa_clave" name="entidadFederativa_clave" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Nom_Ent == old('entidadFederativa_clave'))
                            selected
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

                      <div class="col-md-4 mb-3" id="div_sector">
                        <label for="sector">Sector productivo: <code>*</code></label>
                        <select class="form-control @error('sector') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector" name="sector" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->sector() as $sector)
                          <option value="{{ $sector->clave }}"
                            @if($sector->clave == old('sector'))
                            selected
                            @endif
                            >
                            {{ $sector->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('sector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3" id="div_especifiqueSector">
                        <label for="especifiqueSector">Especifique sector: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueSector') is-invalid @enderror" id="especifiqueSector" name="especifiqueSector" value="@if(old('especifiqueSector')){{ old('especifiqueSector') }}@endif">
                        @error('especifiqueSector')
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
                      <h4 class="mb-3">Remuneración por representación:</h4>
                    </legend>
                    <div class="row" >
                      <div class="col-md-4 mb-3">
                        <label for="recibeRemuneracion">¿Recibe remuneración?: 🌐 <code>*</code></label>
                        <select class="form-control @error('remuneracion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="recibeRemuneracion" name="recibeRemuneracion">
                          <option value="">Seleccione...</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                        </select>
                        @error('remuneracion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="montoMensual_valor">Monto Mensual: 🌐 <code>*</code></label>
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoMensual_valor') is-invalid @enderror" id="montoMensual_valor" name="montoMensual_valor" value="@if(old('montoMensual_valor')){{ old('montoMensual_valor') }}@endif" required maxlength="20" style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('montoMensual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="montoMensual_valor">Monto Mensual: 🌐 <code>*</code></label>
                        <select class="form-control @error('montoMensualAproximado_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoMensualAproximado_moneda" name="montoMensualAproximado_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('montoMensualAproximado_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('montoMensualAproximado_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('montoMensualAproximado_moneda')
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


$("#tipoRepresentacion").ready(span);
$("#tipoRepresentacion").change(span);

function span()
{
  var tipoValue = $("#tipoRepresentacion").val();

  if(tipoValue == "REPRESENTANTE")
  {
    $('#span_representante').show();
    $('#span_representado').hide();
  }
  else if(tipoValue == "REPRESENTADO")
  {
    $('#span_representante').hide();
    $('#span_representado').show();
  }
  else
  {
    $('#span_representado').hide();
    $('#span_representante').hide();
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
