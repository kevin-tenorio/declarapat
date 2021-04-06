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
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                  @csrf
                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">Experiencia laboral en el Sector Público (Últimos cinco empleos)</h4></legend>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="ambitoSector_clave">Ámbito/Sector en el que laboraste: 🌐 <code>*</code></label>
                        <select class="form-control @error('ambitoSector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoSector_clave" name="ambitoSector_clave" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->ambitoSector() as $ambito)
                          <option value="{{ $ambito->clave }}"
                            @if($ambito->clave == old('ambitoSector_clave'))
                            selected
                            @endif
                            >
                            {{ $ambito->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('ambitoSector_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="especifiqueAmbito">Especifique el Ámbito 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueAmbito') is-invalid @enderror" id="especifiqueAmbito" name="especifiqueAmbito" value="@if(old('especifiqueAmbito')){{ old('especifiqueAmbito') }}@endif">
                        @error('especifiqueAmbito')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                      <legend><h4 class="mb-3">Experiencia Laboral en el Sector Público </h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="nombreEntePublico">Nombre ente público: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreEntePublico') is-invalid @enderror" id="nombreEntePublico" name="nombreEntePublico" value="@if(old('nombreEntePublico')){{ old('nombreEntePublico') }}@endif">
                        @error('nombreEntePublico')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="nivelOrdenGobierno">Nivel de gobierno: 🌐 <code>*</code></label>
                        <select class="form-control @error('nivelOrdenGobierno') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="nivelOrdenGobierno" name="nivelOrdenGobierno" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->nivelordengobierno() as $nivel)
                          <option value="{{ $nivel->valor }}"
                            @if($nivel->valor == old('nivelOrdenGobierno'))
                            selected
                            @endif
                            >
                            {{ $nivel->valor }}
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
                        <label for="ambitoPublico">Ámbito Público: 🌐 <code>*</code></label>
                        <select class="form-control @error('ambitoPublico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ambitoPublico" name="ambitoPublico" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->ambitopublico() as $ambito)
                          <option value="{{ $ambito->valor }}"
                            @if($ambito->valor == old('ambitoPublico'))
                            selected
                            @endif
                            >
                            {{ $ambito->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('ambitoPublico')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="areaAdscripcion">Área adscripción: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('areaAdscripcion') is-invalid @enderror" id="areaAdscripcion" name="areaAdscripcion" value="@if(old('areaAdscripcion')){{ old('areaAdscripcion') }}@endif">
                        @error('areaAdscripcion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="empleoCargoComision">Empleo,Cargo o Comisión: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargoComision') is-invalid @enderror" id="empleoCargoComision" name="empleoCargoComision" value="@if(old('empleoCargoComision')){{ old('empleoCargoComision') }}@endif">
                        @error('empleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="funcionPrincipal">Función principal: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('funcionPrincipal') is-invalid @enderror" id="funcionPrincipal" name="funcionPrincipal" value="@if(old('funcionPrincipal')){{ old('funcionPrincipal') }}@endif">
                        @error('funcionPrincipal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="fechaIngreso">Fecha Ingreso: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaIngreso') is-invalid @enderror" id="fechaIngreso" name="fechaIngreso" value="@if(old('fechaIngreso')){{ old('fechaIngreso') }}@endif">
                        @error('fechaIngreso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="fechaEgreso">Fecha Egreso: 🌐 <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaEgreso') is-invalid @enderror" id="fechaEgreso" name="fechaEgreso" value="@if(old('fechaEgreso')){{ old('fechaEgreso') }}@endif">
                        @error('fechaEgreso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                  <div class="col-md-6 mb-3">
                        <label for="ubicacion">Ubicación : 🌐 <code>*</code></label>
                        <select class="form-control @error('ubicacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="ubicacion" name="ubicacion" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->extranjero() as $ubicacion)
                          <option value="{{ $ubicacion->clave }}"
                            @if($ubicacion->clave == old('ubicacion'))
                            selected
                            @endif
                            >
                            {{ $ubicacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('ubicacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">Experiencia Laboral en el Sector Privado </h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="nombreEmpresaSociedadAsociacion">Nombre,empresa, sociedad o asociación: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreEmpresaSociedadAsociacion') is-invalid @enderror" id="nombreEmpresaSociedadAsociacion" name="nombreEmpresaSociedadAsociacion" value="@if(old('nombreEmpresaSociedadAsociacion')){{ old('nombreEmpresaSociedadAsociacion') }}@endif">
                        @error('nombreEmpresaSociedadAsociacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="rfc">RFC: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@endif">
                        @error('rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="area">Área: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="@if(old('area')){{ old('area') }}@endif">
                        @error('area')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="puesto">Empleo/Cargo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto" value="@if(old('puesto')){{ old('puesto') }}@endif">
                        @error('puesto')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="sector">Sector al que pertenece: 🌐 <code>*</code></label>
                        <select class="form-control @error('sector') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector" name="sector">
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

                      <div class="col-md-6 mb-3">
                        <label for="especifiqueSector">Especifique el Sector : 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueSector') is-invalid @enderror" id="especifiqueSector" name="especifiqueSector" value="@if(old('especifiqueSector')){{ old('especifiqueSector') }}@endif" maxlength="100" >
                        @error('especifiqueSector')
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
