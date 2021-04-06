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
              Datos Empleo
              <br>
              <small>Empleo Actual</small>
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
                      <h4 class="mb-3">Datos del Empleo:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="nombreEntePublico"> Nombre del ente público: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('porcentajePropiedad') is-invalid @enderror" id="nombreEntePublico" name="nombreEntePublico" value="@if(old('nombreEntePublico')){{ old('nombreEntePublico') }}@endif">
                        @error('nombreEntePublico')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="nivelOrdenGobierno">Nivel orden de Gobierno: 🌐 <code>*</code></label>
                        <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno">
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

                      <div class="col-md-6 mb-3">
                        <label for="ambitoPublico">Ámbito Público: 🌐 <code>*</code></label>
                        <select class="form-control @error('ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoPublico" name="ambitoPublico">
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
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend>
                      <h4 class="mb-3">Datos del Cargo:</h4>
                    </legend>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="areaAdscripción"> Área de adscripción: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('areaAdscripción') is-invalid @enderror" id="areaAdscripción" name="areaAdscripción" value="@if(old('areaAdscripción')){{ old('areaAdscripción') }}@endif">
                        @error('areaAdscripción')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="empleoCargoComision"> Empleo, Cargo o Comisión: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargoComision') is-invalid @enderror" id="empleoCargoComision" name="empleoCargoComision" value="@if(old('empleoCargoComision')){{ old('empleoCargoComision') }}@endif">
                        @error('empleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="nivelEmpleoCargoComision"> Nivel Empleo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nivelEmpleoCargoComision') is-invalid @enderror" id="nivelEmpleoCargoComision" name="nivelEmpleoCargoComision" value="@if(old('nivelEmpleoCargoComision')){{ old('nivelEmpleoCargoComision') }}@endif">
                        @error('nivelEmpleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mb-3">
                        <label for="funcionPrincipal">Función Principal: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('funcionPrincipal') is-invalid @enderror" id="funcionPrincipal" name="funcionPrincipal" value="@if(old('funcionPrincipal')){{ old('funcionPrincipal') }}@endif">
                        @error('funcionPrincipal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>


                      <div class="col-md-4 mb-3">
                        <label for="fechaTomaPosesion"> Fecha Toma de Posesión: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaTomaPosesion') is-invalid @enderror" id="fechaTomaPosesion" name="fechaTomaPosesion" value="@if(old('fechaTomaPosesion')){{ old('fechaTomaPosesion') }}@endif">
                        @error('nivelEmpleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="contratadoPorHonorarios">¿Está contratado por honorarios? 🌐 <code>*</code></label>
                        <select class="form-control @error('contratadoPorHonorarios') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="contratadoPorHonorarios" name="contratadoPorHonorarios">
                          <option value="">Seleccione...</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                        </select>
                        @error('contratadoPorHonorarios')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">Teléfonos de Contacto:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="telefono"> Teléfono: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="@if(old('telefono')){{ old('telefono') }}@endif">
                        @error('telefono')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="extension"> Extensión: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('extension') is-invalid @enderror" id="extension" name="extension" value="@if(old('extension')){{ old('extension') }}@endif">
                        @error('nombreEntePublico')
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
