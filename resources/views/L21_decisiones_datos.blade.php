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
              ¿PARTICIPA EN LA TOMA DE DECISIONES DE ALGUNA DE ESTAS INSTITUCIONES?
              <br>
              <small>(Hasta los dos últimos años)</small>
            </h4>
          </div>
          <div class="card-body">
            <div class="col-md-12 order-md-1">
              <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug'].'/agregar') }}" method="POST" autocomplete="off">
                @csrf

                <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                <fieldset>
                  <legend><h4 class="mb-3">Datos de la Institución:</h4></legend>

                  <div class="row">

                    <div class="form-group col-md-4 mb-3">
                      <label for="tipoInstitucion">Tipo de Institución: 🌐 <code>*</code></label>
                      <select class="form-control @error('tipoInstitucion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="tipoInstitucion" name="tipoInstitucion" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoInstitucion() as $institucion)
                        <option value="{{ $institucion->clave }}"
                          @if($institucion->clave == old('tipoInstitucion'))
                          selected
                          @endif
                        >
                        {{ $institucion->valor }}
                        </option>
                        @endforeach
                      </select>
                      @error('tipoInstitucion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                      <label for="nombreInstitucion">Nombre de la Institución: <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('nombreInstitucion') is-invalid @enderror" id="nombreInstitucion" name="nombreInstitucion" value="@if(old('nombreInstitucion')){{ old('nombreInstitucion') }}@endif" required>
                      @error('nombreInstitucion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                      <label for="rfc"> RFC: <code>*</code> </label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@endif">
                      @error('rfc')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                      <label for="tipoRelacion">¿Quién toma la decisión?: 🌐 <code>*</code></label>
                      <select class="form-control @error('tipoRelacion') is-invalid @enderror" tabindex="{{ $tabindex }}" id="tipoRelacion" name="tipoRelacion" required>
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

                    <div class="form-group col-md-4 mb-3">
                      <label for="puestoRol"> Puesto/rol en la institución: 🌐 <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('puestoRol') is-invalid @enderror" id="puestoRol" name="puestoRol" value="@if(old('puestoRol')){{ old('puestoRol') }}@endif" required>
                      @error('puestoRol')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group col-md-4 mb-3">
                      <label for="fechaInicioParticipacion">Inicio de la participación: 🌐 <code>*</code></label>
                      <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaInicioParticipacion') is-invalid @enderror" id="fechaInicioParticipacion" name="fechaInicioParticipacion" required>
                      @error('fechaInicioParticipacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="pais">País : 🌐 <code>*</code></label>
                      <select class="form-control @error('pais') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="pais" name="pais">
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

                    <div class="col-md-4 mb-3">
                      <label for="entidadFederativa">Entidad Federativa : 🌐 <code>*</code></label>
                      <select class="form-control @error('entidadFederativa') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa" name="entidadFederativa" required>
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

                    <div class="col-md-4 mb-3">
                      <label for="recibeRemuneracion">¿Recibe remuneración? 🌐 <code>*</code></label>
                      <select class="form-control @error('recibeRemuneracion') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="recibeRemuneracion" name="recibeRemuneracion" required>
                        <option value="">Seleccione...</option>
                        <option value=1>SI</option>
                        <option value=0>NO</option>
                      </select>
                      @error('recibeRemuneracion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                  </div>








                  <fieldset>
                    <div class="row">







                    </div>

                  </fieldset>

                  <fieldset>
                    <legend><h4 class="mb-3">Monto Mensual</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
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

                      <div class="col-md-6 mb-3">
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
