@extends('layouts.app')

@section('content')
 <!--**********************************
    Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Inversiones, Cuentas Bancarias y otro tipo de valores/activos
              <br>
              <small>(Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)</small>
              <small> (Situación Actual) </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf

                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">Tipo de Inversion:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoInversion">Tipo de Inversion/activo 🌐</label>
                        <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoInversion" name="tipoInversion" required autofocus>
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
                        @error('tipoInversion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                          <label for="subTipoInversion">Subtipo de Inversion 🌐</label>
                        <select class="form-control @error('subTipoInversion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="subTipoInversion" name="subTipoInversion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->subtipoinversion() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('subTipoInversion'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('subTipoInversion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Datos del Titular</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="titular" > Titular : 🌐 <code>*</code> </label>
                        <select class="form-control @error('titular') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="titular" name="titular" required autofocus>
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
                        @error('titular')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="numeroCuentaContrato">Número de cuenta, contrato o póliza : <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroCuentaContrato') is-invalid @enderror" id="numeroCuentaContrato" name="numeroCuentaContrato" value="@if(old('numeroCuentaContrato')){{ old('numeroCuentaContrato') }}@endif" maxlength="100" required>
                        @error('numeroCuentaContrato')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                  </div>
                </fieldset>

                <p>&nbsp;</p>

                <fieldset>
                <legend><h4 class="mb-3">Copropiedad con Tercero:</h4></legend>
                  <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoPersona" > Tipo de Persona: 🌐 <code>*</code> </label>
                        <select class="form-control @error('tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoPersona" name="tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tercero_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_tercero_nombreRazonSocial">
                        <label for="nombreRazonSocial">Nombre o razón social del tercero: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreRazonSocial') is-invalid @enderror" id="nombreRazonSocial" name="nombreRazonSocial" value="@if(old('nombreRazonSocial')){{ old('nombreRazonSocial') }}@endif" maxlength="100" required>
                        @error('nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-3" id="div_tercero_rfc">
                        <label for="rfc">RFC del tercero:  🌐 <code>*</code> </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero_rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@endif" maxlength="100">
                        @error('rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Ubicación</h4></legend>
                  <div class="row">
                      <div class="col-sm-6">
                        <label for="extranjero">Donde se localiza la inversion: 🌐 <code>*</code></label>
                        <select class="form-control @error('extranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="extranjero" name="extranjero" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('extranjero'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('extranjero')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3" id="institucionRazonSocial">
                        <label for="institucionRazonSocial">Institución o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('institucionRazonSocial') is-invalid @enderror" id="institucionRazonSocial" name="institucionRazonSocial" value="@if(old('institucionRazonSocial')){{ old('institucionRazonSocial') }}@endif" maxlength="100" required>
                        @error('institucionRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-3" id="div_institucionRazonSocial_rfc">
                        <label for="institucionRazonSocial_rfc">RFC: 🌐 <code>*</code> </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('institucionRazonSocial_rfc') is-invalid @enderror" id="institucionRazonSocialo_rfc" name="institucionRazonSocial_rfc" value="@if(old('institucionRazonSocial_rfc')){{ old('institucionRazonSocial_rfc') }}@endif" maxlength="100">
                        @error('institucionRazonSocial_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Saldo</h4></legend>

                    @if($declaracion->inicial == true)
                    <div class="form-group row">
                      <label for="saldoSituacionActual_valor" class="col-sm-4 col-form-label">
                        Saldo Actual: <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('saldoSituacionActual_valor') is-invalid @enderror" id="saldoSituacionActual_valor" name="saldoSituacionActual_valor" value="@if(old('saldoSituacionActual_valor')){{ old('saldoSituacionActual_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('saldoSituacionActual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control @error('saldoSituacionActual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="saldoSituacionActual_moneda" name="saldoSituacionActual_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('saldoSituacionActual_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('saldoSituacionActual_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('saldoSituacionActual_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    @endif

                    @if($declaracion->modificacion == true)
                    <div class="form-group row">
                      <label for="saldoDiciembreAnterior_valor" class="col-sm-4 col-form-label">
                        Saldo al Diciembre Anterior: <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('saldoDiciembreAnterior_valor') is-invalid @enderror" id="saldoDiciembreAnterior_valor" name="saldoDiciembreAnterior_valor" value="@if(old('saldoDiciembreAnterior_valor')){{ old('saldoDiciembreAnterior_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('saldoDiciembreAnterior_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control @error('saldoDiciembreAnterior_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="saldoDiciembreAnterior_moneda" name="saldoDiciembreAnterior_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('saldoDiciembreAnterior_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('saldoDiciembreAnterior_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('saldoDiciembreAnterior_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    @endif

                    @if($declaracion->conclusion == true)
                    <div class="form-group row">
                      <label for="saldoInsolutoFechaConclusion_valor" class="col-sm-4 col-form-label">
                        Saldo a la Fecha de Conclulsión: <code>*</code>
                      </label>
                      <div class="col-sm-4">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('saldoInsolutoFechaConclusion_valor') is-invalid @enderror" id="saldoInsolutoFechaConclusion_valor" name="saldoInsolutoFechaConclusion_valor" value="@if(old('saldoInsolutoFechaConclusion_valor')){{ old('saldoInsolutoFechaConclusion_valor') }}@endif"  maxlength="20" required style="text-align:right">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('saldoInsolutoFechaConclusion_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control @error('saldoInsolutoFechaConclusion_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="saldoInsolutoFechaConclusion_moneda" name="saldoInsolutoFechaConclusion_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('saldoInsolutoFechaConclusion_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('saldoInsolutoFechaConclusion_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('saldoInsolutoFechaConclusion_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    @endif

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
{{-- $("#sector").ready(mostrar_sect);
$("#sector").change(mostrar_sect);

function mostrar_sect()
{
  var sectValue = $("#sector").val();

  if(sectValue == "OTRO")
  {
    $('#div_especifiqueSector').show('slow');
    $('#especifiqueSector').attr("", "");
  }
  else
  {
    $('#div_especifiqueSector').hide('slow');
    $("#especifiqueSector").removeAttr("");
  }
}
 --}}

@endsection
