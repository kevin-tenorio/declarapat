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
              Datos del Adeudo:
              <br>
              <small> (Situación Actual: Entre el 01 de Enero y el 31 de Diciembre del Año Inmediato Anterior)</small>
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
                      <h4 class="mb-3">
                        <small>
                          Todos los datos de los adeudos / pasivos a nombre de la pareja, dependientes económicos y o terceros o que sea en copropiedad con el declarante no serán públicos.Adeudos del declarante, pareja y / o dependientes económicos.
                        </small>
                        <p><br></p>
                        <p>
                          Titular del Adeudo o Pasivo:
                        </p>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="titular">Titular del adeudo: 🌐 <code>*</code></label>
                        <select class="form-control @error('titular') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="titular" name="titular" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->titulares() as $persona)
                          <option value="{{ $persona->clave }}"
                            @if($persona->clave == old('titular'))
                            selected
                            @endif
                          >
                            {{ $persona->valor }}
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

                    <legend>
                      <h4 class="mb-3">
                        Datos del Tercero
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="tercero_tipoPersona">Tercero: </label>
                        <select class="form-control @error('tercero_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tercero_tipoPersona" name="tercero_tipoPersona" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->valor }}"
                            @if($persona->valor == old('tercero_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $persona->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tercero_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="tercero_nombreRazonSocial">Nombre o Razón Social: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero_nombreRazonSocial') is-invalid @enderror" id="tercero_nombreRazonSocial" name="tercero_nombreRazonSocial" value="@if(old('tercero_nombreRazonSocial')){{ old('tercero_nombreRazonSocial') }}@endif" >
                        @error('tercero_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tercero_rfc">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('tercero_rfc') is-invalid @enderror" id="tercero_rfc" name="tercero_rfc" value="@if(old('tercero_rfc')){{ old('tercero_rfc') }}@endif" >
                        @error('tercero_rfc')
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
                      <h4 class="mb-3">Datos del Adeudo:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="tipoAdeudo">Tipo de Adeudo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoAdeudo') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoAdeudo" name="tipoAdeudo" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoAdeudo() as $adeudo)
                          <option value="{{ $adeudo->clave }}"
                            @if($adeudo->clave == old('tipoAdeudo'))
                            selected
                            @endif
                            >
                            {{ $adeudo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoAdeudo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="numeroCuentaContrato">No. de cuenta o contrato: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroCuentaContrato') is-invalid @enderror" id="numeroCuentaContrato" name="numeroCuentaContrato" value="@if(old('numeroCuentaContrato')){{ old('numeroCuentaContrato') }}@endif" required>
                        @error('numeroCuentaContrato')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fechaAdquision">Fecha de adquisición: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaAdquision') is-invalid @enderror" id="fechaAdquision" name="fechaAdquision" value="@if(old('fechaAdquision')){{ old('fechaAdquision') }}@endif" required>
                        @error('fechaAdquision')
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
                    </div>

                    <p>&nbsp;</p>

                    <div class="form-group row">
                      <label for="montoOriginal_valor" class="col-sm-6 col-form-label">
                        Monto original del adeudo: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-3">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoOriginal_valor') is-invalid @enderror" id="montoOriginal_valor" name="montoOriginal_valor" value="@if(old('montoOriginal_valor')){{ old('montoOriginal_valor') }}@endif"  maxlength="20"  style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('montoOriginal_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control @error('montoOriginal_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoOriginal_moneda" name="montoOriginal_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('montoOriginal_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('montoOriginal_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('montoOriginal_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    @if($declaracion->inicial == true)
                    <div class="form-group row">
                      <label for="saldoInsolutoSituacionActual_valor" class="col-sm-6 col-form-label">
                        Saldo insoluto (situación actual):: 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-3">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('saldoInsolutoSituacionActual_valor') is-invalid @enderror" id="saldoInsolutoSituacionActual_valor" name="saldoInsolutoSituacionActual_valor" value="@if(old('saldoInsolutoSituacionActual_valor')){{ old('saldoInsolutoSituacionActual_valor') }}@endif"  maxlength="20"  style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('saldoInsolutoSituacionActual_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control @error('saldoInsolutoSituacionActual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="saldoInsolutoSituacionActual_moneda" name="saldoInsolutoSituacionActual_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('saldoInsolutoSituacionActual_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('saldoInsolutoSituacionActual_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('saldoInsolutoSituacionActual_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    @endif


                    <div class="form-group row">
                      <label for="saldoInsolutoDiciembreAnterior_valor" class="col-sm-6 col-form-label">
                        Saldo insoluto (Al Diciembre Inmediato Anterior): 🌐 <code>*</code>
                      </label>
                      <div class="col-sm-3">
                        <div class="input-group input-default">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('saldoInsolutoDiciembreAnterior_valor') is-invalid @enderror" id="saldoInsolutoDiciembreAnterior_valor" name="saldoInsolutoDiciembreAnterior_valor" value="@if(old('saldoInsolutoDiciembreAnterior_valor')){{ old('saldoInsolutoDiciembreAnterior_valor') }}@endif"  maxlength="20"  style="text-align:right" required>
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          @error('saldoInsolutoDiciembreAnterior_valor')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control @error('saldoInsolutoDiciembreAnterior_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="saldoInsolutoDiciembreAnterior_moneda" name="saldoInsolutoDiciembreAnterior_moneda" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if(old('saldoInsolutoDiciembreAnterior_moneda') == null and $tipo->default == 1)
                            selected
                            @elseif($tipo->clave == old('saldoInsolutoDiciembreAnterior_moneda'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }} - {{ $tipo->clave }}
                          </option>
                          @endforeach
                        </select>
                        @error('saldoInsolutoDiciembreAnterior_moneda')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                  <div class="form-group row">
                    <label for="saldoInsolutoFechaConclusion_valor" class="col-sm-6 col-form-label">
                      Saldo insoluto (A la fecha de conclusión): 🌐 <code>*</code>
                    </label>
                    <div class="col-sm-3">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('saldoInsolutoFechaConclusion_valor') is-invalid @enderror" id="saldoInsolutoFechaConclusion_valor" name="saldoInsolutoFechaConclusion_valor" value="@if(old('saldoInsolutoFechaConclusion_valor')){{ old('saldoInsolutoFechaConclusion_valor') }}@endif"  maxlength="20"  style="text-align:right" required>
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
                    <div class="col-sm-3">
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

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Quién otorgo el crédito?:</h4></legend>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="tipoPersona">Otorgante: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoPersona" name="tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipopersona() as $persona)
                          <option value="{{ $persona->valor }}"
                            @if($persona->valor == old('tipoPersona'))
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

                      <div class="col-md-4 mb-3">
                        <label for="nombreRazonSocial">Institución o Razón Social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreRazonSocial') is-invalid @enderror" id="nombreRazonSocial" name="nombreRazonSocial" value="@if(old('nombreRazonSocial')){{ old('nombreRazonSocial') }}@endif" required>
                        @error('nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="rfc">RFC: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@endif" >
                        @error('rfc')
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
