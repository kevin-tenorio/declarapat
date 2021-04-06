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
              CLIENTES PRINCIPALES
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

                  <div class="form-group row">
                    <label for="tipoRelacion" class="col-sm-5 col-form-label">¿Quién se relaciona con el cliente?: 🌐 <code>*</code></label>
                    <div class="col-sm-6">
                      <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRelacion" name="tipoRelacion" autofocus required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoRelacion() as $relacion)
                        <option value="{{ $relacion->clave }}"
                          @if($relacion->clave == old('tipoRelacion'))
                          selected
                          @endif
                          >
                          {{ $relacion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('tipoRelacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos de la Empresa o Servicio:
                        <small>
                          <br>
                          Nombre de la empresa o servicio con el que tú, pareja o dependiente económico realiza la actividad lucrativa prestando un servicio a algún cliente.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-7 mb-3">
                        <label for="empresa_nombreEmpresaServicio">Nombre de la empresa y/o servicio que proporciona: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empresa_nombreEmpresaServicio') is-invalid @enderror" id="empresa_nombreEmpresaServicio" name="empresa_nombreEmpresaServicio" value="@if(old('empresa_nombreEmpresaServicio')){{ old('empresa_nombreEmpresaServicio') }}@endif" required>
                        <small> Ejemplo: Consultoria Rogalsa S.A. de C.V. / Servicio de consultoría contable</small>
                        @error('empresa_nombreEmpresaServicio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="empresa_rfc"> RFC: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empresa_rfc') is-invalid @enderror" id="empresa_rfc" name="empresa_rfc" value="@if(old('empresa_rfc')){{ old('empresa_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('empresa_rfc')
                        <span class="invalid-feedback" role="alert" >
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos del Cliente Principal:
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="clientePrincipal_tipoPersona">Tipo de Persona: 🌐 <code>*</code></label>
                        <select class="form-control @error('clientePrincipal_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="clientePrincipal_tipoPersona" name="clientePrincipal_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->valor }}"
                            @if($persona->valor == old('clientePrincipal_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('clientePrincipal_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="clientePrincipal_nombreRazonSocial">Nombre o razón social del cliente: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('clientePrincipal_nombreRazonSocial') is-invalid @enderror" id="clientePrincipal_nombreRazonSocial" name="clientePrincipal_nombreRazonSocial" value="@if(old('clientePrincipal_nombreRazonSocial')){{ old('clientePrincipal_nombreRazonSocial') }}@endif" required>
                        @error('clientePrincipal_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="clientePrincipal_rfc"> RFC: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('clientePrincipal_rfc') is-invalid @enderror" id="clientePrincipal_rfc" name="clientePrincipal_rfc" value="@if(old('clientePrincipal_rfc')){{ old('clientePrincipal_rfc') }}@endif">
                        @error('clientePrincipal_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div><!--row-->

                    <div class="row">
                      <div class="col-md-6 mb-3" id="div_sector">
                        <label for="sector">Sector productivo: 🌐 <code>*</code></label>
                        <select class="form-control @error('sector') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector" name="sector" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->sector() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('sector'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('sector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3" id="div_especifiqueSector">
                        <label for="especifiqueSector">Especifique sector: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueSector') is-invalid @enderror" id="especifiqueSector" name="especifiqueSector" value="@if(old('especifiqueSector')){{ old('especifiqueSector') }}@endif" maxlength="100">
                        @error('especifiqueSector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_pais">
                        <label for="ubicacion_pais">País: 🌐 <code>*</code></label>
                        <select class="form-control @error('ubicacion_pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ubicacion_pais" name="ubicacion_pais" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('ubicacion_pais'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('ubicacion_pais')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3" id="div_entidadFederativa">
                        <label for="ubicacion_pais">Estado: 🌐 <code>*</code></label>
                        <select class="form-control @error('ubicacion_entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ubicacion_entidadFederativa" name="ubicacion_entidadFederativa">
                          <option value="">Seleccione una entidad:</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $tipo)
                          <option value="{{ $tipo->Cve_Ent }}"
                            @if($tipo->Cve_Ent == old('ubicacion_entidadFederativa'))
                            selected
                            @endif
                            >
                            {{ $tipo->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('ubicacion_entidadFederativa')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div><!--row-->
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Ganancia obtenida del cliente principal:
                      </h4>
                    </legend>
                    <div class="form-group row">
                      <label for="montoAproximadoGanancia_valor" class="col-sm-4 col-form-label">
                        Monto mensual aproximado: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoAproximadoGanancia_valor') is-invalid @enderror" id="montoAproximadoGanancia_valor" name="montoAproximadoGanancia_valor" value="@if(old('montoAproximadoGanancia_valor')){{ old('montoAproximadoGanancia_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('montoAproximadoGanancia_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control @error('montoAproximadoGanancia_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoAproximadoGanancia_moneda" name="montoAproximadoGanancia_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('montoAproximadoGanancia_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('montoAproximadoGanancia_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('montoAproximadoGanancia_moneda')
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
$("#sector").ready(sector);
$("#sector").change(sector);

function sector()
{
  var sectorValue = $("#sector").val();

  if(sectorValue == "OTRO")
  {
    $('#div_sector').attr("class","col-md-3 mb-3");
    $('#div_especifiqueSector').show();
    $('#especifiqueSector').attr("required","required");

  }
  else
  {
    $('#div_sector').attr("class","col-md-6 mb-3");
    $('#div_especifiqueSector').hide();
  }
}

$("#clientePrincipal_tipoPersona").ready(largo_rfc);
$("#clientePrincipal_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcValue = $("#clientePrincipal_tipoPersona").val();

  if(rfcValue == "MORAL")
  {
    $('#clientePrincipal_rfc').attr("maxlength","12");
    $('#clientePrincipal_rfc').attr("minlength","12");
  }
  else
  {
    $('#clientePrincipal_rfc').attr("maxlength","13");
    $('#clientePrincipal_rfc').attr("minlength","13");
  }
}


$("#ubicacion_pais").ready(pais);
$("#ubicacion_pais").change(pais);

function pais()
{
  var paisValue = $("#ubicacion_pais").val();

  if(paisValue == "MX")
  {
    $('#div_pais').attr("class","col-md-3 mb-3");
    $('#div_entidadFederativa').show();
    $('#ubicacion_entidadFederativa').attr("required","required");
  }
  else
  {
    $('#div_pais').attr("class","col-md-6 mb-3");
    $('#div_entidadFederativa').hide();
    $('#ubicacion_entidadFederativa').removeAttr("required");
  }
}
@endsection
