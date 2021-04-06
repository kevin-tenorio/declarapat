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
              DATOS DEL DEPENDIENTE ECONOMICO
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">

                  @csrf
                  <input name="tipoOperacion" type="hidden" value="{{ Str::upper(Route::current()->parameters()['operacion']) }}">

                  <fieldset>
                    <legend><h4 class="mb-3">Datos Generales del Dependiente Económico</h4></legend>


                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre(s): <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombres') is-invalid @enderror" id="nombre" name="nombre" placeholder="" value="@if(old('nombre')){{ old('nombre') }}{{-- @else{{ $declaracion->datos->nombre }} --}}@endif" maxlength="120" >
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="primerApellido">Primer Apellido: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('primerApellido') is-invalid @enderror" id="primerApellido" name="primerApellido" placeholder="" value="@if(old('primerApellido')){{ old('primerApellido') }}{{-- @else{{ $declaracion->datos->primerApellido }} --}}@endif" maxlength="50" >
                        @error('primerApellido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="segundoApellido">Segundo Apellido: </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('segundoApellido') is-invalid @enderror" id="segundoApellido" name="segundoApellido" placeholder="" value="@if(old('segundoApellido')){{ old('segundoApellido') }}{{-- @else{{ $declaracion->datos->segundoApellido }} --}}@endif" maxlength="50">
                        @error('segundoApellido')
                        <span >
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="fechaNacimiento">Fecha de Nacimiento: <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombres') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento" placeholder="" value="@if(old('fechaNacimiento')){{ old('fechaNacimiento') }}{{-- @else{{ $declaracion->datos->fechaNacimiento }} --}}@endif" maxlength="120" >
                        @error('fechaNacimiento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                        <div class="col-md-4 mb-3">
                        <label for="rfc">RFC: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" placeholder="" value="@if(old('rfc')){{ old('rfc') }}{{-- @else{{ $declaracion->datos->rfc }} --}}@endif" maxlength="50" >
                        @error('rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="parentesco">Parentesco/Relación: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('parentesco') is-invalid @enderror" id="parentesco" name="parentesco" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->parentescorelacion() as $parentesco)
                          <option value="{{ $parentesco->clave }}"
                            @if(old('paisNacimiento') == $parentesco->clave)
                            selected
                            {{-- @elseif($declaracion->datos->parentesco == $parentesco->clave and old('parentesco') == null)
                            selected --}}
                            {{-- @elseif(old('parentesco') == null and $declaracion->datos->parentesco == null)
                              @if($parentesco->default == true) selected @endif --}}
                            @endif
                            >
                            {{ $parentesco->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('parentesco')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="extranjero">¿Es ciudadano extranjero? <code>*</code></label>
                        <select class="form-control @error('extranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="extranjero" name="extranjero">
                          <option value="">Seleccione...</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                        </select>
                        @error('extranjero')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="curp">CURP: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('curp') is-invalid @enderror" id="curp" name="curp" placeholder="" value="@if(old('curp')){{ old('curp') }}{{-- @else{{ $declaracion->datos->curp }} --}}@endif" maxlength="50" >
                        @error('curp')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                      <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="habitaDomicilioDeclarante">¿Habita en el Domicilio del Declarante? <code>*</code></label>
                        <select class="form-control @error('extranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="habitaDomicilioDeclarante" name="habitaDomicilioDeclarante">
                          <option value="">Seleccione...</option>
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                        </select>
                        @error('habitaDomicilioDeclarante')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="pais">Lugar donde reside: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('pais') == $pais->ISO2)
                            selected
                            {{-- @elseif($declaracion->datos->pais == $pais->ISO2 and old('pais') == null)
                            selected
                            @elseif(old('pais') == null and $declaracion->datos->pais == null)
                              @if($pais->default == true) selected @endif --}}
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

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                  <legend><h4 class="mb-3">Actividad Pública</h4></legend>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="actividadLaboral">Actividad Laboral: <code>*</code></label>
                        <select class="form-control @error('actividadLaboral') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="actividadLaboral" name="actividadLaboral" >
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->actividadLaboral() as $actividadLaboral)
                          <option value="{{ $actividadLaboral->clave }}"
                            @if($actividadLaboral->clave == old('actividadLaboral'))
                            selected
                            @endif
                            >
                            {{ $actividadLaboral->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('actividadLaboral')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                  <legend><h4 class="mb-3">Sector Público</h4></legend>

                  <div class="row">
                  <div class="col-md-6 mb-3">
                      <label for="nombreEntePublico">Nombre ente público: <code>*</code></label>
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
                        <label for="nivelOrdenGobierno">Nivel de gobierno: <code>*</code></label>
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
                        <label for="ambitoPublico">Ámbito Público: <code>*</code></label>
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
                        <label for="areaAdscripcion">Área adscripción: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('areaAdscripcion') is-invalid @enderror" id="areaAdscripcion" name="areaAdscripcion" value="@if(old('areaAdscripcion')){{ old('areaAdscripcion') }}@endif">
                        @error('areaAdscripcion')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="empleoCargoComision">Empleo,Cargo o Comisión: <code>*</code> </label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargoComision') is-invalid @enderror" id="empleoCargoComision" name="empleoCargoComision" value="@if(old('empleoCargoComision')){{ old('empleoCargoComision') }}@endif">
                        @error('empleoCargoComision')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="funcionPrincipal">Función principal: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('funcionPrincipal') is-invalid @enderror" id="funcionPrincipal" name="funcionPrincipal" value="@if(old('funcionPrincipal')){{ old('funcionPrincipal') }}@endif">
                        @error('funcionPrincipal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                  <legend><h4 class="mb-3">Sector Privado</h4></legend>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="nombreEmpresaSociedadAsociacion">Nombre de la Empresa, Sociedad o Asociación: <code>*</code></label>
                      <input type="text" tabindex="{{ ++$tabindex }}"  class="form-control @error('nombreEmpresaSociedadAsociacion') is-invalid @enderror" id="nombreEmpresaSociedadAsociacion" name="nombreEmpresaSociedadAsociacion" placeholder="" value="@if(old('nombreEmpresaSociedadAsociacion')){{ old('nombreEmpresaSociedadAsociacion') }}{{-- @else{{ $declaracion->datos->nombreEmpresaSociedadAsociacion }} --}}@endif" maxlength="120" >
                      @error('nombreEmpresaSociedadAsociacion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="rfc_empresa">RFC de la Empresa: </label>
                      <input type="text" tabindex="{{ ++$tabindex }}"  class="form-control @error('rfc_empresa') is-invalid @enderror" id="rfc_empresa" name="rfc_empresa" placeholder="" value="@if(old('rfc_empresa')){{ old('rfc_empresa') }}{{-- @else{{ $declaracion->datos->rfc_empresa }} --}}@endif" maxlength="120" >
                      @error('rfc_empresa')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>


                  <div class="col-md-6 mb-3">
                    <label for="empleoCargo">Empleo,Cárgo o Comisión: <code>*</code> </label>
                     <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('empleoCargo') is-invalid @enderror" id="empleoCargo" name="empleoCargo" value="@if(old('empleoCargo')){{ old('empleoCargo') }}@endif">
                      @error('empleoCargo')
                      <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                   </div>
                 </div>












                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="fechaIngreso">Fecha Ingreso: <code>*</code></label>
                        <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaIngreso') is-invalid @enderror" id="fechaIngreso" name="fechaIngreso" value="@if(old('fechaIngreso')){{ old('fechaIngreso') }}@endif">
                        @error('fechaIngreso')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="salarioMensualNeto_valor" class="col-sm-4 col-form-label">
                      Salario Menusual Neto <code>*</code>
                    </label>
                    <div class="col-sm-4">
                      <div class="input-group input-default">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="number-separator form-control @error('salarioMensualNeto_valor') is-invalid @enderror" id="salarioMensualNeto_valor" name="salarioMensualNeto_valor" value="@if(old('salarioMensualNeto_valor')){{ old('salarioMensualNeto_valor') }}@endif"  maxlength="20" required style="text-align:right">
                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                        @error('salarioMensualNeto_valor')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control @error('salarioMensualNeto_moneda') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="salarioMensualNeto_moneda" name="salarioMensualNeto_moneda" required>
                        <option value="">Seleccione...</option>
                        @foreach($declaracion->catalogo->tipoMoneda() as $tipo)
                        <option value="{{ $tipo->clave }}"
                          @if(old('salarioMensualNeto_moneda') == null and $tipo->default == 1)
                          selected
                          @elseif($tipo->clave == old('salarioMensualNeto_moneda'))
                          selected
                          @endif
                          >
                          {{ $tipo->valor }} - {{ $tipo->clave }}
                        </option>
                        @endforeach
                      </select>
                      @error('salarioMensualNeto_moneda')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                  <div class="col-md-6 mb-3">
                    <label for="proveedorContratistaGobierno">Proveedor contratista de gobierno: <code>*</code></label>
                    <select class="form-control @error('esDependienteEconomico') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="esDependienteEconomico" name="esDependienteEconomico" >
                        <option value="">Seleccione...</option>
                        <option value=1>SI</option>
                        <option value=0>NO</option>
                      </select>
                    @error('proveedorContratistaGobierno')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="sector_clave"> Sector: <code>*</code></label>
                    <select class="form-control @error('sector_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="sector_clave" name="sector_clave" >
                        <option value="">Seleccione...</option>
                        <option value=1>SI</option>
                        <option value=0>NO</option>
                      </select>
                    @error('proveedorContratistaGobierno')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  </div>


                  </fieldset>

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
$("#situacionPersonalEstadoCivil_clave").ready(mostrar_regmat);
$("#situacionPersonalEstadoCivil_clave").change(mostrar_regmat);

function mostrar_regmat()
{
  var sitperValue = $( "#situacionPersonalEstadoCivil_clave" ).val();

  if(sitperValue == "CAS")
  {
    $('#div_regmat').show('slow');
    $('#regimenMatrimonial_clave').attr("required", "required");
    $('#regimenMatrimonial_clave').attr("name", "regimenMatrimonial_clave");

    @if(old('regimenMatrimonial_clave'))
      $('#regimenMatrimonial_clave option[value="{{ old('regimenMatrimonial_clave') }}"]').attr("selected", "selected");
    @endif
  }
  else
  {
    $('#div_regmat').hide('slow');
    $("#regimenMatrimonial_clave").removeAttr("required");
    $("#regimenMatrimonial_clave").removeAttr("name");
    $('#regimenMatrimonial_clave option:selected').removeAttr('selected');


    $('#div_otro').hide('slow');
    $("#otro").removeAttr("required");
    $("#otro").removeAttr("name");
  }
}



$("#regimenMatrimonial_clave").ready(mostrar_otro);
$("#regimenMatrimonial_clave").change(mostrar_otro);

function mostrar_otro()
{
  var regmatValue = $( "#regimenMatrimonial_clave" ).val();

  if(regmatValue == "OTR")
  {
    $('#div_otro').show('slow');
    $('#otro').attr("required", "required");
    $('#otro').attr("name", "otro");
  }
  else
  {
    $('#div_otro').hide('slow');
    $("#otro").removeAttr("required");
    $("#otro").removeAttr("name");
  }
}

@endsection
