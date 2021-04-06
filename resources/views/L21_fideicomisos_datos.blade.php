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
              FIDEICOMISOS
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
                    <legend><h4 class="mb-3">Datos del Fideicomiso:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoRelacion">¿Quién participa en el fideicomiso?: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRelacion" name="tipoRelacion" required autofocus>
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

                      <div class="col-md-6 mb-3">
                        <label for="tipoParticipacion">Tipo de participación: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoParticipacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoParticipacion" name="tipoParticipacion" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoParticipacionFideicomiso() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tipoParticipacion'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoParticipacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="rfcFideicomiso">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfcFideicomiso') is-invalid @enderror" id="rfcFideicomiso" name="rfcFideicomiso" value="@if(old('rfcFideicomiso')){{ old('rfcFideicomiso') }}@endif" maxlength="13" minlength="12">
                        @error('rfcFideicomiso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="tipoFideicomiso">Tipo de fideicomiso: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoFideicomiso') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoFideicomiso" name="tipoFideicomiso" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoFideicomiso() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('tipoFideicomiso'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoFideicomiso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
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
                        <label for="especifiqueSector">Especifique el sector: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueSector') is-invalid @enderror" id="especifiqueSector" name="especifiqueSector" value="@if(old('especifiqueSector')){{ old('especifiqueSector') }}@endif" maxlength="100">
                        @error('especifiqueSector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="extranjero">¿Ubicación?: 🌐 <code>*</code></label>
                        <select class="form-control @error('extranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="extranjero" name="extranjero" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $localizacion)
                          <option value="{{ $localizacion->clave }}"
                            @if($localizacion->clave == old('extranjero'))
                            selected
                            @endif
                            >
                            {{ $localizacion->valor }}
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

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">
                        Datos del Fiduciario:
                        <small>
                        <br>
                        El fiduciario es una persona física o moral que ha sido designada como responsable de administrar el dinero, propiedades y patrimonio de otra persona, es decir, está encargada de gestionar sus bienes.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="fiduciario_nombreRazonSocial">Nombre o Razón Social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fiduciario_nombreRazonSocial') is-invalid @enderror" id="fiduciario_nombreRazonSocial" name="fiduciario_nombreRazonSocial" value="@if(old('fiduciario_nombreRazonSocial')){{ old('fiduciario_nombreRazonSocial') }}@endif" required maxlength="100">
                        @error('fiduciario_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="fiduciario_rfc">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fiduciario_rfc') is-invalid @enderror" id="fiduciario_rfc" name="fiduciario_rfc" value="@if(old('fiduciario_rfc')){{ old('fiduciario_rfc') }}@endif" maxlength="13" minlength="12">
                        @error('fiduciario_rfc')
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
                        Datos del Fideicomitente:
                        <small>
                          <br>
                          El fideicomitente es la persona física o moral que establece un fideicomiso, es decir, que entrega ciertos bienes a otra persona, para que los administre y utilice de acuerdo con un fin determinado. Sólo pueden hacerlo aquellas personas físicas o morales que legalmente puedan gestionar los bienes.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-3 mb-3">
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

                      <div class="col-md-4 mb-3">
                        <label for="fideicomitente_nombreRazonSocial">Nombre o razón social: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fideicomitente_nombreRazonSocial') is-invalid @enderror" id="fideicomitente_nombreRazonSocial" name="fideicomitente_nombreRazonSocial" value="@if(old('fideicomitente_nombreRazonSocial')){{ old('fideicomitente_nombreRazonSocial') }}@endif" maxlength="100" required>
                        @error('fideicomitente_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="fideicomitente_rfc">RFC: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fideicomitente_rfc') is-invalid @enderror" id="fideicomitente_rfc" name="fideicomitente_rfc" value="@if(old('fideicomitente_rfc')){{ old('fideicomitente_rfc') }}@endif">
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
                    <legend>
                      <h4 class="mb-3">
                        Datos del Fideicomisario:
                        <br>
                        <small>
                          El fideicomisario es el beneficiario que fue nombrado en el contrato de fideicomiso. Puede ser una persona física o moral, que recibirá bienes, valores o recursos cuando se cumplan las condiciones establecidas.
                        </small>
                      </h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="fideicomisario_tipoPersona">
                          Tipo de Persona: 🌐 <code>*</code>
                        </label>
                        <select class="form-control @error('fideicomisario_tipoPersona') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="fideicomisario_tipoPersona" name="fideicomisario_tipoPersona" required>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoPersona() as $tipo)
                          <option value="{{ $tipo->clave }}"
                            @if($tipo->clave == old('fideicomisario_tipoPersona'))
                            selected
                            @endif
                            >
                            {{ $tipo->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('fideicomisario_tipoPersona')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="fideicomisario_nombreRazonSocial">
                          Nombre o razón social: 🌐 <code>*</code>
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fideicomisario_nombreRazonSocial') is-invalid @enderror" id="fideicomisario_nombreRazonSocial" name="fideicomisario_nombreRazonSocial" value="@if(old('fideicomisario_nombreRazonSocial')){{ old('fideicomisario_nombreRazonSocial') }}@endif" maxlength="100" required>
                        @error('fideicomisario_nombreRazonSocial')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-3 mb-3">
                        <label for="fideicomisario_rfc">
                          RFC: 🌐
                        </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('fideicomisario_rfc') is-invalid @enderror" id="fideicomisario_rfc" name="fideicomisario_rfc" value="@if(old('fideicomisario_rfc')){{ old('fideicomisario_rfc') }}@endif">
                        @error('fideicomisario_rfc')
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


$("#fideicomitente_tipoPersona").ready(largo_rfc);
$("#fideicomitente_tipoPersona").change(largo_rfc);

$("#fideicomisario_tipoPersona").ready(largo_rfc);
$("#fideicomisario_tipoPersona").change(largo_rfc);

function largo_rfc()
{
  var cValue = $("#fideicomitente_tipoPersona").val();
  var dValue = $("#fideicomisario_tipoPersona").val();

  if(cValue == "MORAL")
  {
    $('#fideicomitente_rfc').attr("maxlength","12");
    $('#fideicomitente_rfc').attr("minlength","12");
  }
  else
  {
    $('#fideicomitente_rfc').attr("maxlength","13");
    $('#fideicomitente_rfc').attr("minlength","13");
  }

  if(dValue == "MORAL")
  {
    $('#fideicomisario_rfc').attr("maxlength","12");
    $('#fideicomisario_rfc').attr("minlength","12");
  }
  else
  {
    $('#fideicomisario_rfc').attr("maxlength","13");
    $('#fideicomisario_rfc').attr("minlength","13");
  }
}
@endsection
