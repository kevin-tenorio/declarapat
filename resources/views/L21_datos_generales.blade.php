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
              DATOS GENERALES
              <br>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf

                  <fieldset>
                    <legend><h4 class="mb-3">Tus datos personales:</h4></legend>


                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="nombres">Nombre(s): 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" autofocus class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="@if(old('nombres')){{ old('nombres') }}@else{{ $declaracion->datos->nombres }}@endif" maxlength="100" required="required">
                        @error('nombres')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="primerApellido">Primer apellido: 🌐 <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('primerApellido') is-invalid @enderror" id="primerApellido" name="primerApellido" placeholder="" value="@if(old('primerApellido')){{ old('primerApellido') }}@else{{ $declaracion->datos->primerApellido }}@endif" maxlength="50" required="required">
                        @error('primerApellido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="segundoApellido">Segundo apellido: 🌐</label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('segundoApellido') is-invalid @enderror" id="segundoApellido" name="segundoApellido" placeholder="" value="@if(old('segundoApellido')){{ old('segundoApellido') }}@else{{ $declaracion->datos->segundoApellido }}@endif" maxlength="50">
                        @error('segundoApellido')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="paisNacimiento">País de nacimiento: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('paisNacimiento') is-invalid @enderror" id="paisNacimiento" name="paisNacimiento" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('paisNacimiento') == $pais->ISO2)
                            selected
                            @elseif($declaracion->datos->paisNacimiento == $pais->ISO2 and old('paisNacimiento') == null)
                            selected
                            @elseif(old('paisNacimiento') == null and $declaracion->datos->paisNacimiento == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('paisNacimiento')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="nacionalidad">Nacionalidad: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('nacionalidad') is-invalid @enderror" id="nacionalidad" name="nacionalidad" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->paises() as $pais)
                          <option value="{{ $pais->ISO2 }}"
                            @if(old('nacionalidad') == $pais->ISO2)
                            selected
                            @elseif($declaracion->datos->nacionalidad == $pais->ISO2 and old('nacionalidad') == null)
                            selected
                            @elseif(old('nacionalidad') == null and $declaracion->datos->nacionalidad == null)
                              @if($pais->default == true) selected @endif
                            @endif
                            >
                            {{ $pais->ESPANOL }}
                          </option>
                          @endforeach
                        </select>
                        @error('nacionalidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="curp">CURP: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('curp') is-invalid @enderror" id="curp" name="curp" placeholder="" value="@if(old('curp')){{ old('curp') }}@else{{ $declaracion->datos->curp }}@endif" minlength="18" maxlength="18" required="required">
                        @error('curp')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="rfc_rfc">RFC: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('rfc_rfc') is-invalid @enderror" id="rfc_rfc" name="rfc_rfc" placeholder="" value="@if(old('rfc_rfc')){{ old('rfc_rfc') }}@else{{ $declaracion->datos->rfc_rfc }}@endif"  maxlength="10" minlength="10" required="required">
                        @error('rfc_rfc')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-2 mb-3">
                        <label for="rfc_homoClave">Homoclave: <code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('rfc_homoClave') is-invalid @enderror" id="rfc_homoClave" name="rfc_homoClave" placeholder="" value="@if(old('rfc_homoClave')){{ old('rfc_homoClave') }}@else{{ $declaracion->datos->rfc_homoClave }}@endif" maxlength="3" minlength="3" required="required">
                        @error('rfc_homoClave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>

                    <legend><h4 class="mb-3">¿Dónde te contactamos?</h4></legend>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                      <label for="correoElectronico_institucional">Correo institucional: 🌐<code>*</code></label>
                        <input tabindex="{{ ++$tabindex }}" type="email" class="form-control @error('correoElectronico_institucional') is-invalid @enderror" id="correoElectronico_institucional" name="correoElectronico_institucional" placeholder="tu@ejemplo.gob.mx" maxlength="75" value="@if(old('correoElectronico_institucional')){{ old('correoElectronico_institucional') }}@else{{ $declaracion->datos->correoElectronico_institucional }}@endif">
                        @error('correoElectronico_institucional')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="correoElectronico_personal">Correo personal:</label>
                        <input tabindex="{{ ++$tabindex }}" type="email" class="form-control @error('correoElectronico_personal') is-invalid @enderror" id="correoElectronico_personal" name="correoElectronico_personal" placeholder="tu@ejemplo.com" maxlength="75" value="@if(old('correoElectronico_personal')){{ old('correoElectronico_personal') }}@else{{ $declaracion->datos->correoElectronico_personal }}@endif">
                        @error('correoElectronico_personal')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="telefono_casa">Lada + Teléfono de casa:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('telefono_casa_lada') is-invalid @enderror" id="telefono_casa_lada" name="telefono_casa_lada" required="required">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->LADA }}"
                              @if(old('telefono_casa_lada') == $pais->LADA)
                              selected
                              @elseif($declaracion->datos->telefono_casa_lada == $pais->LADA and old('telefono_casa_lada') == null)
                              selected
                              @elseif(old('telefono_casa_lada') == null and $declaracion->datos->telefono_casa_lada == null)
                                @if($pais->default == true) selected @endif
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                              {{ $pais->LADA }}
                            </option>
                            @endforeach
                          </select>
                          <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('telefono_casa') is-invalid @enderror" id="telefono_casa" name="telefono_casa" value="@if(old('telefono_casa')){{ old('telefono_casa') }}@else{{ $declaracion->datos->telefono_casa }}@endif" minlength="10" maxlength="10">
                          @error('telefono_casa')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('telefono_casa_lada')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="telefono_celularPersonal">Lada + Teléfono celular:<code>*</code></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">+</span>
                          </div>
                          <select tabindex="{{ ++$tabindex }}" class="form-control @error('telefono_celularPersonal_lada') is-invalid @enderror" id="telefono_celularPersonal_lada" name="telefono_celularPersonal_lada" required="required">
                            <option value="">Seleccione...</option>
                            @foreach($declaracion->catalogo->paises() as $pais)
                            <option value="{{ $pais->LADA }}"
                              @if(old('telefono_celularPersonal_lada') == $pais->LADA)
                              selected
                              @elseif($declaracion->datos->telefono_celularPersonal_lada == $pais->LADA and old('telefono_celularPersonal_lada') == null)
                              selected
                              @elseif(old('telefono_celularPersonal_lada') == null and $declaracion->datos->telefono_celularPersonal_lada == null)
                                @if($pais->default == true) selected @endif
                              @endif
                              >
                              {{ $pais->ESPANOL }}
                              {{ $pais->LADA }}
                            </option>
                            @endforeach
                          </select>
                          <input tabindex="{{ ++$tabindex }}" type="text" class="form-control @error('telefono_celularPersonal') is-invalid @enderror" id="telefono_celularPersonal" name="telefono_celularPersonal" minlength="10" maxlength="10" value="@if(old('telefono_celularPersonal')){{ old('telefono_celularPersonal') }}@else{{ $declaracion->datos->telefono_celularPersonal }}@endif">
                          @error('telefono_celularPersonal')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          @error('telefono_celularPersonal_lada')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </fieldset>

                  <p>&nbsp;</p>

                  <fieldset>
                    <legend><h4 class="mb-3">¿Cuál es tu situación personal?</h4></legend>
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="situacionPersonalEstadoCivil_clave">Estado civil: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('situacionPersonalEstadoCivil_clave') is-invalid @enderror" id="situacionPersonalEstadoCivil_clave" name="situacionPersonalEstadoCivil_clave" required="required">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->estadoCivil() as $civil)
                          <option value="{{ $civil->clave }}"
                            @if(old('situacionPersonalEstadoCivil_clave') == $civil->clave)
                              selected
                            @elseif($declaracion->datos->situacionPersonalEstadoCivil_clave == $civil->clave and old('situacionPersonalEstadoCivil_clave') == null)
                              @if($civil->clave == $declaracion->datos->situacionPersonalEstadoCivil_clave) selected @endif
                            @endif
                            >
                            {{ $civil->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('situacionPersonalEstadoCivil_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div id="div_regmat" class="col-md-4 mb-3">
                        <label for="regimenMatrimonial_clave">Régimen matrimonial: <code>*</code></label>
                        <select tabindex="{{ ++$tabindex }}" class="form-control @error('regimenMatrimonial_clave') is-invalid @enderror" id="regimenMatrimonial_clave" name="regimenMatrimonial_clave">
                          <option value="">Seleccione...</option>
                          @foreach($declaracion->catalogo->regimenMatrimonial() as $regimen)
                          <option value="{{ $regimen->clave }}"
                            @if(!is_null($declaracion->datos->regimenMatrimonial_clave))
                              @if($regimen->clave == $declaracion->datos->regimenMatrimonial_clave) selected @endif
                            @endif
                          >
                            {{ $regimen->valor }}
                          </option>
                          @endforeach
                        </select>
                        @error('regimenMatrimonial_clave')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                      <div id="div_otro" class="col-md-4 mb-3">
                        <label for="especifiqueRegimen">Otro: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('especifiqueRegimen') is-invalid @enderror" id="especifiqueRegimen" name="especifiqueRegimen" value="@if(old('especifiqueRegimen')){{ old('especifiqueRegimen') }}@else{{ $declaracion->datos->especifiqueRegimen }}@endif" maxlength="100">
                        @error('especifiqueRegimen')
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
                        <label for="aclaracionesObservaciones">
                          Aclaraciones / Observaciones:
                        </label>
                      </h4>
                    </legend>
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <textarea tabindex="{{ ++$tabindex }}" class="form-control" id="aclaracionesObservaciones" rows="7" name="aclaracionesObservaciones" placeholder="">@if(old('aclaracionesObservaciones')){{ old('aclaracionesObservaciones') }}@else{{ $declaracion->datos->aclaracionesObservaciones }}@endif</textarea>
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
    $('#div_regmat').show();
    $('#regimenMatrimonial_clave').attr("required", "required");
    $('#regimenMatrimonial_clave').attr("name", "regimenMatrimonial_clave");

    @if(old('regimenMatrimonial_clave'))
      $('#regimenMatrimonial_clave option[value="{{ old('regimenMatrimonial_clave') }}"]').attr("selected", "selected");
    @endif
  }
  else
  {
    $('#div_regmat').hide();
    $("#regimenMatrimonial_clave").removeAttr("required");
    $("#regimenMatrimonial_clave").removeAttr("name");
    $('#regimenMatrimonial_clave option:selected').removeAttr('selected');


    $('#div_otro').hide();
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
    $('#div_otro').show();
    $('#especifiqueRegimen').attr("required", "required");
    $('#especifiqueRegimen').attr("name", "especifiqueRegimen");
  }
  else
  {
    $('#div_otro').hide();
    $("#especifiqueRegimen").removeAttr("required");
    $("#especifiqueRegimen").removeAttr("name");
  }
}

@endsection
