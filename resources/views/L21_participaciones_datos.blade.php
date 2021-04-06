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
              PARTICIPACIÓN EN EMPRESAS, SOCIEDADES O ASOCIACIONES
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
                    <legend><h4 class="mb-3">Datos de Participación en Empresas, Sociedades o Asociaciones:</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tipoRelacion">¿Quién participa?: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoRelacion" name="tipoRelacion">
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
                        <label for="porcentajeParticipacion">% de participación 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('porcentajeParticipacion') is-invalid @enderror" id="porcentajeParticipacion" name="porcentajeParticipacion" value="@if(old('porcentajeParticipacion')){{ old('porcentajeParticipacion') }}@endif">
                        @error('porcentajeParticipacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="nombreEmpresaSociedadAsociacion">Nombre de la empresa o asociación: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreEmpresaSociedadAsociacion') is-invalid @enderror" id="nombreEmpresaSociedadAsociacion" name="nombreEmpresaSociedadAsociacion" value="@if(old('nombreEmpresaSociedadAsociacion')){{ old('nombreEmpresaSociedadAsociacion') }}@endif">
                        @error('nombreEmpresaSociedadAsociacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="rfc"> RFC: 🌐 </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@endif">
                        @error('rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="tipoParticipacion">Tipo de participación: 🌐 <code>*</code></label>
                        <select class="form-control @error('tipoParticipacion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoParticipacion" name="tipoParticipacion">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->tipoParticipacion() as $participacion)
                          <option value="{{ $participacion->clave }}"
                            @if($participacion->clave == old('tipoParticipacion'))
                            selected
                            @endif
                          >
                          {{ $participacion->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('tipoParticipacion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="especifiqueParticipacion">Especifique el tipo: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueSector') is-invalid @enderror" id="especifiqueSector" name="especifiqueSector" value="@if(old('especifiqueSector')){{ old('especifiqueSector') }}@endif" maxlength="100" >
                        @error('especifiqueSector')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  <fieldset>
                    <legend><h4 class="mb-3">Tipo de Participación:</h4></legend>

                    <div class="row">


                    </div>
                  </fieldset>


                  <fieldset>
                    <div class="row">

                    </div>

                  </fieldset>

                  <fieldset>
                    <legend><h4 class="mb-3">Monto Mensual</h4></legend>

                    <div class="row">

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
                    </div>

                  </fieldset>

                  <fieldset>
                  <div class="row">
                    <div class="col-md-6 mb-3">
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

                    <div class="col-md-6 mb-3">
                        <label for="entidadFederativa">Entidad Federativa : 🌐 <code>*</code></label>
                        <select class="form-control @error('entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa" name="entidadFederativa" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                          <option value="{{ $entidad->Cve_Ent }}"
                            @if($entidad->Nom_Ent == old('entidadFederativa'))
                            selected
                            @endif
                            >
                            {{ $entidad->Nom_Ent }}
                          </option>
                          @endforeach
                        </select>
                        @error('entidadFederativa')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                  </div>
                  </fieldset>

                  <fieldset>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="sector">Sector productivo al que pertenece : 🌐 <code>*</code></label>
                        <select class="form-control @error('sector') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector" name="sector" >
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

                      <div class="col-md-6 mb-3">
                        <label for="sector">Especifique el Sector : 🌐 <code>*</code></label>
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
