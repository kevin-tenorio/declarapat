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
              Datos Curriculares del Declarante
              <br>
              <small> </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf
                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">¿Dónde estudiaste?</h4></legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nivel_clave">Nivel: 🌐 <code>*</code></label>
                        <select class="form-control @error('nivel_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivel_clave" name="nivel_clave" autofocus>
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivel() as $nivel)
                          <option value="{{ $nivel->clave }}"
                            @if($nivel->clave == old('nivel_clave'))
                            selected
                            @endif
                          >
                          {{ $nivel->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('nivel_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="carreraAreaConocimiento">Carrera o Área de Conocimiento: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('carreraAreaConocimiento') is-invalid @enderror" id="carreraAreaConocimiento" name="carreraAreaConocimiento" value="@if(old('carreraAreaConocimiento')){{ old('carreraAreaConocimiento') }}@endif">
                        @error('carreraAreaConocimiento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="institucionEducativa_ubicacion">Ubicación del Instituto: 🌐 <code>*</code></label>
                        <select class="form-control @error('institucionEducativa_ubicacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="institucionEducativa_ubicacion" name="institucionEducativa_ubicacion" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $localizacion)
                          <option value="{{ $localizacion->clave }}"
                            @if($localizacion->clave == old('institucionEducativa_ubicacion'))
                            selected
                            @endif
                          >
                          {{ $localizacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('institucionEducativa_ubicacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-8 mb-3">
                        <label for="institucionEducativa_nombre">Institución Educativa: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('institucionEducativa_nombre') is-invalid @enderror" id="institucionEducativa_nombre" name="institucionEducativa_nombre" value="@if(old('institucionEducativa_nombre')){{ old('institucionEducativa_nombre') }}@endif">
                        @error('institucionEducativa_nombre')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="estatus">Estatus: 🌐 <code>*</code></label>
                        <select class="form-control @error('estatus') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="estatus" name="estatus" value="" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->estatus() as $estatus)
                          <option value="{{ $estatus->valor }}"
                          @if($estatus->valor == old('estatus'))
                          selected
                          @endif
                          >
                          {{ $estatus->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('estatus')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="documentoObtenido">Documento Obtenido: 🌐 <code>*</code></label>
                        <select class="form-control @error('documentoObtenido') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="documentoObtenido" name="documentoObtenido">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->documentoObtenido() as $documento)
                          <option value="{{ $documento->clave }}"
                          @if($documento->valor == old('documentoObtenido'))
                          selected
                          @endif
                          >
                          {{ $documento->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('documentoObtenido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="fechaObtencion">Fecha del Documento 🌐 <code>*</code> </label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaObtencion') is-invalid @enderror" id="fechaObtencion" name="fechaObtencion" placeholder="" value="@if(old('fechaObtencion')){{ old('fechaObtencion') }}@endif" >
                        @error('fechaObtencion')
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
$("#nivel_clave").ready(area);
$("#nivel_clave").change(area);

function area()
{
  var nivelValue = $("#nivel_clave" ).val();

  if(nivelValue == "PRI")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN BÁSICA");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
    $("#documentoObtenido option[value='TITULO']").remove();
  }
  if(nivelValue == "SEC")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
    $("#documentoObtenido option[value='TITULO']").remove();
  }
  if(nivelValue == "BCH")
  {
    $('#carreraAreaConocimiento').attr("value", "EDUCACIÓN MEDIA SUPERIOR");
    $('#carreraAreaConocimiento').attr("readonly", "readonly");
  }
  if(nivelValue == "CTC" || nivelValue == "LIC")
  {
    $('#carreraAreaConocimiento').attr("value", "");
    $('#carreraAreaConocimiento').attr("placeholder", "¿Cual es tu carrera? ");
    $('#carreraAreaConocimiento').removeAttr("readonly");
  }
  if(nivelValue == "MAE" || nivelValue == "ESP" || nivelValue == "DOC")
  {
    $('#carreraAreaConocimiento').attr("value", "");
    $('#carreraAreaConocimiento').attr("placeholder", "¿En que te especializaste?");
    $('#carreraAreaConocimiento').removeAttr("readonly");
  }
  if(0 === nivelValue.length)
  {
    $('#carreraAreaConocimiento').removeAttr("readonly");
    $('#carreraAreaConocimiento').removeAttr("value");
    $('#carreraAreaConocimiento').removeAttr("placeholder");
  }
}
@endsection
