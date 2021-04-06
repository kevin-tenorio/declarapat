@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">

    @include('layouts.alert')

    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              BENEFICIOS PRIVADOS
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="basic-form">

              <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                @csrf
                <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                <fieldset>
                  <legend>
                    <h4 class="mb-3">Datos del Beneficio:</h4>
                  </legend>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="tipoBeneficio">Tipo de beneficio: 🌐 <code>*</code></label>
                      <select class="form-control @error('tipoBeneficio') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoBeneficio" name="tipoBeneficio" autofocus required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipobeneficio() as $beneficio)
                        <option value="{{ $beneficio->clave }}"
                          @if($beneficio->clave == old('tipoBeneficio'))
                          selected
                          @endif
                          >
                          {{ $beneficio->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('tipoBeneficio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3" id="div_especifiqueTipo">
                      <label for="especifiqueTipo">Especifica el tipo: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueTipo') is-invalid @enderror" id="especifiqueTipo" name="especifiqueTipo" value="@if(old('especifiqueTipo')){{ old('especifiqueTipo') }}@endif" maxlength="100">
                      @error('especifiqueTipo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="sector">Sector productivo: 🌐 <code>*</code></label>
                      <select class="form-control @error('sector') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector" name="sector" required>
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

                    <div class="col-md-3 mb-3" id="div_especifiqueSector">
                      <label for="especifiqueSector">Especifica el Sector: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueSector') is-invalid @enderror" id="especifiqueSector" name="especifiqueSector" value="@if(old('especifiqueSector')){{ old('especifiqueSector') }}@endif" maxlength="100" required>
                      @error('especifiqueSector')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="beneficiario">Beneficiario: 🌐 <code>*</code></label>
                      <select class="form-control @error('beneficiario') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="beneficiario" name="beneficiario" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->beneficiarios() as $beneficiario)
                        <option value="{{ $beneficiario->clave }}"
                          @if($beneficiario->clave == old('beneficiario'))
                          selected
                          @endif
                          >
                          {{ $beneficiario->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('beneficiario')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-3 mb-3" id="div_especifiqueBeneficiario">
                      <label for="especifiqueBeneficiario">Especifica beneficiario: <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueBeneficiario') is-invalid @enderror" id="especifiqueBeneficiario" name="especifiqueBeneficiario" value="@if(old('especifiqueBeneficiario')){{ old('especifiqueBeneficiario') }}@endif" maxlength="100">
                      @error('especifiqueBeneficiario')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="formaRecepcion">Forma de recepción: 🌐 <code>*</code></label>
                      <select class="form-control @error('formaRecepcion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="formaRecepcion" name="formaRecepcion" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->formaRecepcion() as $forma)
                        <option value="{{ $forma->valor }}"
                          @if($forma->valor == old('formaRecepcion'))
                          selected
                          @endif
                          >
                          {{ $forma->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('formaRecepcion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-6 mb-3" id="div_especifiqueBeneficio">
                      <label for="especifiqueBeneficio">Especifica el beneficio en especie: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueBeneficio') is-invalid @enderror" id="especifiqueBeneficio" name="especifiqueBeneficio" value="@if(old('especifiqueBeneficio')){{ old('especifiqueBeneficio') }}@endif" maxlength="100">
                      @error('especifiqueBeneficio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="montoMensual_valor">Monto mensual: 🌐 <code>*</code></label>
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
                      <small>Aproximado sin decimales</small>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="montoMensual_moneda">Moneda: 🌐 <code>*</code></label>
                      <select class="form-control @error('montoMensual_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="montoMensual_moneda" name="montoMensual_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('montoMensual_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('montoMensual_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('montoMensual_moneda')
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
                      Datos del Otorgante del Beneficio:
                    </h4>
                  </legend>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="otorgante_tipoPersona">
                        Tipo de Persona: 🌐 <code>*</code>
                      </label>
                      <select class="form-control @error('otorgante_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="otorgante_tipoPersona" name="otorgante_tipoPersona" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipopersona() as $persona)
                        <option value="{{ $persona->clave }}"
                          @if($persona->clave == old('otorgante_tipoPersona'))
                          selected
                          @endif
                          >
                          {{ $persona->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('otorgante_tipoPersona')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="otorgante_nombreRazonSocial">
                        Nombre o Razón Social: 🌐 <code>*</code>
                      </label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('otorgante_nombreRazonSocial') is-invalid @enderror" id="otorgante_nombreRazonSocial" name="otorgante_nombreRazonSocial" value="@if(old('otorgante_nombreRazonSocial')){{ old('otorgante_nombreRazonSocial') }}@endif" required maxlength="100">
                      @error('otorgante_nombreRazonSocial')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="otorgante_rfc">RFC: 🌐</label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('otorgante_rfc') is-invalid @enderror" id="otorgante_rfc" name="otorgante_rfc" value="@if(old('otorgante_rfc')){{ old('otorgante_rfc') }}@endif">
                      @error('otorgante_rfc')
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
@endsection

@section('script')
$("#tipoBeneficio").ready(mostrar_tipoBen);
$("#tipoBeneficio").change(mostrar_tipoBen);

function mostrar_tipoBen()
{
  var tipoBenValue = $( "#tipoBeneficio" ).val();

  if(tipoBenValue == "O")
  {
    $('#div_especifiqueTipo').show();
    $('#especifiqueTipo').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueTipo').hide();
    $("#especifiqueTipo").removeAttr("required");
  }
}

$("#formaRecepcion").ready(mostrar_formRep);
$("#formaRecepcion").change(mostrar_formRep);

function mostrar_formRep()
{
  var formRepValue = $("#formaRecepcion").val();

  if(formRepValue == "ESPECIE")
  {
    $('#div_especifiqueBeneficio').show();
    $('#especifiqueBeneficio').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueBeneficio').hide();
    $("#especifiqueBeneficio").removeAttr("required");
  }
}

$("#beneficiario").ready(mostrar_bene);
$("#beneficiario").change(mostrar_bene);

function mostrar_bene()
{
  var beneValue = $("#beneficiario").val();

  if(beneValue == "OTRO")
  {
    $('#div_especifiqueBeneficiario').show();
    $('#especifiqueBeneficiario').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueBeneficiario').hide();
    $("#especifiqueBeneficiario").removeAttr("required");
  }
}

$("#sector").ready(mostrar_sect);
$("#sector").change(mostrar_sect);

function mostrar_sect()
{
  var sectValue = $("#sector").val();

  if(sectValue == "OTRO")
  {
    $('#div_especifiqueSector').show();
    $('#especifiqueSector').attr("required", "required");
  }
  else
  {
    $('#div_especifiqueSector').hide();
    $("#especifiqueSector").removeAttr("required");
  }
}

$("#otorgante_tipoPersona").ready(largo_rfc);
$("#otorgante_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var rfcValue = $("#otorgante_tipoPersona").val();

  if(rfcValue == "MORAL")
  {
    $('#otorgante_rfc').attr("maxlength","12");
    $('#otorgante_rfc').attr("minlength","12");
  }
  else
  {
    $('#otorgante_rfc').attr("maxlength","13");
    $('#otorgante_rfc').attr("minlength","13");
  }
}

@endsection
