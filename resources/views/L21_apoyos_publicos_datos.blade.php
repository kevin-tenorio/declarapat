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
              APOYOS O BENEFICIOS PÚBLICOS
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
                    <legend><h4 class="mb-3">Datos del Beneficiario</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="beneficiarioPrograma_clave">Beneficiario: 🌐 <code>*</code></label>
                        <select class="form-control @error('beneficiarioPrograma_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="beneficiarioPrograma_clave" name="beneficiarioPrograma_clave" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->beneficiarios() as $beneficiario)
                          <option value="{{ $beneficiario->clave }}"
                            @if($beneficiario->clave == old('beneficiarioPrograma_clave'))
                            selected
                            @endif
                            >
                            {{ $beneficiario->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('beneficiarioPrograma_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_especifiqueBeneficiario">
                        <label for="especifiqueBeneficiario">Especifica beneficiario: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueBeneficiario') is-invalid @enderror" id="especifiqueBeneficiario" name="especifiqueBeneficiario" value="@if(old('especifiqueBeneficiario')){{ old('especifiqueBeneficiario') }}@endif" required>
                        @error('especifiqueBeneficiario')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Datos del Apoyo</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoApoyo_clave">Tipo de apoyo: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoApoyo_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoApoyo_clave" name="tipoApoyo_clave"  required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoApoyo() as $apoyo)
                          <option value="{{ $apoyo->clave }}"
                            @if($apoyo->valor == old('tipoApoyo_clave'))
                            selected
                            @endif
                            >
                            {{ $apoyo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoApoyo_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3" id="div_especifiqueTipo">
                        <label for="especifiqueTipo">Especifica tipo apoyo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueTipo') is-invalid @enderror" id="especifiqueTipo" name="especifiqueTipo" value="@if(old('especifiqueTipo')){{ old('especifiqueTipo') }}@endif" required>
                        @error('especifiqueTipo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6 mb-3">
                        <label for="nivelOrdenGobierno">Nivel u Orden de Gobierno : 🌐 <code>*</code></label>
                        <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno" required >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivelOrdenGobierno() as $gobierno)
                          <option value="{{ $gobierno->valor}}"
                            @if($gobierno->valor == old('nivelOrdenGobierno'))
                            selected
                            @endif
                          >
                          {{ $gobierno->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('nivelOrdenGobierno')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                      <div class="col-md-6 mb-3">
                        <label for="institucionOtorgante">Institución que otorga el apoyo. 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('institucionOtorgante') is-invalid @enderror" id="institucionOtorgante" name="institucionOtorgante" value="@if(old('institucionOtorgante')){{ old('institucionOtorgante') }}@endif" required>
                        @error('institucionOtorgante')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6 mb-3">
                        <label for="nombrePrograma">Nombre del programa de apoyo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombrePrograma') is-invalid @enderror" id="nombrePrograma" name="nombrePrograma" value="@if(old('nombrePrograma')){{ old('nombrePrograma') }}@endif" required>
                        @error('nombrePrograma')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="formaRecepcion">Forma de Recepción : 🌐 <code>*</code></label>
                        <select class="form-control @error('formaRecepcion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaRecepcion" name="formaRecepcion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->formaRecepcion() as $recepcion)
                          <option value="{{ $recepcion->valor }}"
                            @if($recepcion->valor == old('formaRecepcion'))
                            selected
                            @endif
                            >
                            {{ $recepcion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('formaRecepcion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">

                      <div class="form-group row">
                        <label for="montoApoyoMensual_valor" class="col-sm-4 col-form-label">
                          Monto Apoyo Mensual: 🌐 <code>*</code>
                        </label>
                        <div class="col-sm-4">
                          <div class="input-group input-default">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('montoApoyoMensual_valor') is-invalid @enderror" id="montoApoyoMensual_valor" name="montoApoyoMensual_valor" value="@if(old('montoApoyoMensual_valor')){{ old('montoApoyoMensual_valor') }}@endif"  maxlength="20" required style="text-align:right">
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            @error('montoApoyoMensual_valor')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <select class="form-control @error('montoApoyoMensual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoApoyoMensual_moneda" name="montoApoyoMensual_moneda" required>
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                            <option value="{{ $tipo->clave }}"
                              @if(old('montoApoyoMensual_moneda') == null and $tipo->default == 1)
                              selected
                              @elseif($tipo->clave == old('montoApoyoMensual_moneda'))
                              selected
                              @endif
                              >
                              {{ $tipo->valor }} - {{ $tipo->clave }}
                            </option>
                            @endforeach
                          </select>
                          @error('montoApoyoMensual_moneda')
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

$("#beneficiarioPrograma_clave").ready(beneficiario);
$("#beneficiarioPrograma_clave").change(beneficiario);

function beneficiario()
{
  var beneficiarioValue = $("#beneficiarioPrograma_clave").val();

  if(beneficiarioValue == "OTRO")
  {
    $("#div_especifiqueBeneficiario").show();
  }
  else
  {
    $("#div_especifiqueBeneficiario").hide();
  }
}


$("#tipoApoyo_clave").ready(apoyo);
$("#tipoApoyo_clave").change(apoyo);

function apoyo()
{
  var apoyoValue = $("#tipoApoyo_clave").val();

  if(apoyoValue == "OTRO")
  {
    $("#div_especifiqueTipo").show();
  }
  else
  {
    $("#div_especifiqueTipo").hide();
  }
}

@endsection
