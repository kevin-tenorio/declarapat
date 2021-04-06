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
              DATOS DE LA  PAREJA
              <br>
              <small>   </small>
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 order-md-1">

                <form action="{{ url('declaracion/'.$declaracion->id.'/'.Route::current()->parameters()['formato_slug']) }}" method="POST" autocomplete="off">
                  @csrf



                  <fieldset>
                    <legend><h4 class="mb-3">Datos Generales de la pareja</h4></legend>

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
                        <label for="curp">CURP: <code>*</code></label>
                        <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('curp') is-invalid @enderror" id="curp" name="curp" placeholder="" value="@if(old('curp')){{ old('curp') }}{{-- @else{{ $declaracion->datos->curp }} --}}@endif" maxlength="50" >
                        @error('curp')
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
                  </div>

                  <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="relacionConDeclarante">Relación con el Declarante: <code>*</code></label>
                    <select tabindex="{{ ++$tabindex }}" class="form-control @error('relacionConDeclarante') is-invalid @enderror" id="relacionConDeclarante" name="relacionConDeclarante" >
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
                    @error('relacionConDeclarante')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="esDependienteEconomico">¿Es dependiente económico? <code>*</code></label>
                    <select class="form-control @error('extranjero') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="esDependienteEconomico" name="esDependienteEconomico">
                      <option value="">Seleccione...</option>
                      <option value="1">SI</option>
                      <option value="0">NO</option>
                    </select>
                    @error('esDependienteEconomico')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                  <div class="row">
                    <div class="col-md-4 mb-3">
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


                    <div class="col-md-4 mb-3">
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

                    <div class="col-md-4 mb-3">
                      <label for="lugarDondeReside">Lugar donde reside: <code>*</code></label>
                      <select class="form-control @error('lugarDondeReside') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="lugarDondeReside" name="lugarDondeReside">
                        <option value="">Seleccione...</option>
                        <option value="1">MÉXICO</option>
                        <option value="0">EXTRANJERO</option>
                        <option value="2">SE DESCONOCE</option>
                      </select>
                      @error('lugarDondeReside')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  </fieldset>

                  <p>&nbsp;</p>

                    <fieldset>
                      <legend><h4 class="mb-3">Domicilio Pareja</h4></legend>

                        <div class="row">
                          <div class="col-md-4 mb-4">
                            <label for="pais">País: <code>*</code></label>
                            <select tabindex="{{ ++$tabindex }}" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" required="required">
                              <option value="">Seleccione...</option>
                              @foreach($declaracion->catalogo->paises() as $pais)
                              <option value="{{ $pais->ISO2 }}"
                                @if(old('pais') == $pais->ISO2)
                                selected
                                @elseif($declaracion->datos->pais == $pais->ISO2 and old('pais') == null)
                                selected
                                @elseif(old('pais') == null and $declaracion->datos->pais == null)
                                  @if($pais->default == true) selected @endif
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

                          <div class="col-md-4 mb-3" id="div_entidadFederativa">
                            <label for="entidadFederativa_clave">Entidad Federativa: <code>*</code></label>
                            <select class="form-control @error('entidadFederativa_clave') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="entidadFederativa_clave" name="entidadFederativa_clave" autofocus>
                              <option value="">Seleccionar:</option>
                              @foreach($declaracion->catalogo->inegiEntidades() as $entidad)
                              <option value="{{ $entidad->Cve_Ent }}"
                                @if($entidad->Cve_Ent == old('entidadFederativa_clave'))
                                  selected
                                @else
                                  @if($entidad->Cve_Ent == $declaracion->datos->entidadFederativa_clave and empty(old('entidadFederativa_clave')))
                                    selected
                                    @else
                                  @endif
                                @endif
                                >
                                {{ $entidad->Nom_Ent }}
                              </option>
                              @endforeach
                            </select>
                            @error('entidadFederativa_clave')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3" id="div_municipioAlcaldia">
                            <label for="municipioAlcaldia_clave">Municipio/Alcaldía: <code>*</code></label>
                            <select class="form-control @error('municipioAlcaldia_clave') is-invalid @enderror" id="municipioAlcaldia_clave" name="municipioAlcaldia_clave" tabindex="{{ ++$tabindex }}">
                              <option value="">Seleccionar:</option>
                              @if(old('entidadFederativa_clave'))
                                @foreach($declaracion->catalogo->inegiAlcaldias(old('entidadFederativa_clave')) as $alcaldia)
                                <option value="{{ $alcaldia->Cve_Mun }}"
                                  @if($alcaldia->Cve_Mun == old('municipioAlcaldia_clave'))
                                    selected
                                  @endif
                                  >
                                  {{ $alcaldia->Nom_Mun }}
                                </option>
                                @endforeach
                              @else
                                @foreach($declaracion->catalogo->inegiAlcaldias($declaracion->datos->entidadFederativa_clave) as $alcaldia)
                                <option value="{{ $alcaldia->Cve_Mun }}"
                                  @if($alcaldia->Cve_Mun == $declaracion->datos->municipioAlcaldia_clave)
                                    selected
                                  @endif
                                  >
                                  {{ $alcaldia->Nom_Mun }}
                                </option>
                                @endforeach
                              @endif
                            </select>
                            @error('municipioAlcaldia_clave')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3" id="div_coloniaLocalidad">
                            <label for="coloniaLocalidad_select">Colonia o Localidad: <code>*</code></label>
                            <select class="form-control @error('coloniaLocalidad') is-invalid @enderror" tabindex="{{ ++$tabindex }}" id="coloniaLocalidad_select" name="coloniaLocalidad">
                              <option value="">Seleccionar:</option>
                              @if(old('entidadFederativa_clave'))

                                @if(old('municipioAlcaldia_clave'))

                                    @foreach($declaracion->catalogo->inegiLocalidades(old('entidadFederativa_clave'),old('municipioAlcaldia_clave')) as $colonia)
                                    <option value="{{ $colonia->Nom_Loc }}"
                                      @if($colonia->Nom_Loc == old('coloniaLocalidad'))
                                        selected
                                      @endif
                                      >
                                      {{ $colonia->Nom_Loc }}
                                    </option>
                                    @endforeach

                                @endif

                              @else

                                @foreach($declaracion->catalogo->inegiLocalidades($declaracion->datos->entidadFederativa_clave,$declaracion->datos->municipioAlcaldia_clave) as $colonia)
                                <option value="{{ $colonia->Nom_Loc }}"
                                  @if($colonia->Nom_Loc == $declaracion->datos->coloniaLocalidad)
                                    selected
                                  @endif
                                  >
                                  {{ $colonia->Nom_Loc }}
                                </option>
                                @endforeach

                              @endif
                            </select>
                            @error('coloniaLocalidad')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3" id="div_estadoProvincia">
                            <label for="estadoProvincia">Estado/Provincia: <code>*</code></label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('estadoProvincia') is-invalid @enderror" id="estadoProvincia" name="estadoProvincia" placeholder="" value="@if(old('estadoProvincia')){{ old('estadoProvincia') }}@else{{ $declaracion->datos->estadoProvincia }}@endif" maxlength="100">
                            @error('estadoProvincia')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3" id="div_ciudadLocalidad">
                            <label for="ciudadLocalidad">Ciudad/Localidad: <code>*</code></label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('ciudadLocalidad') is-invalid @enderror" id="ciudadLocalidad" name="ciudadLocalidad" placeholder="" value="@if(old('ciudadLocalidad')){{ old('ciudadLocalidad') }}@else{{ $declaracion->datos->ciudadLocalidad }}@endif" maxlength="100">
                            @error('ciudadLocalidad')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="calle">Calle: <code>*</code></label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('calle') is-invalid @enderror" id="calle" name="calle" placeholder="" value="@if(old('calle')){{ old('calle') }}@else{{ $declaracion->datos->calle }}@endif" maxlength="100" required>
                            @error('calle')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3">
                            <label for="numeroExterior">Número Exterior: <code>*</code></label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroExterior') is-invalid @enderror" id="numeroExterior" name="numeroExterior" placeholder="" value="@if(old('numeroExterior')){{ old('numeroExterior') }}@else{{ $declaracion->datos->numeroExterior }}@endif" maxlength="6" required>
                            @error('numeroExterior')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3">
                            <label for="numeroInterior">Número Interior: </label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('numeroInterior') is-invalid @enderror" id="numeroInterior" name="numeroInterior" placeholder="" value="@if(old('numeroInterior')){{ old('numeroInterior') }}@else{{ $declaracion->datos->numeroInterior }}@endif" maxlength="6">
                            @error('numeroInterior')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="col-md-4 mb-3">
                            <label for="codigoPostal">Código Postal: <code>*</code></label>
                            <input type="text" tabindex="{{ ++$tabindex }}" class="form-control @error('codigoPostal') is-invalid @enderror" id="codigoPostal" name="codigoPostal" placeholder="" value="@if(old('codigoPostal')){{ old('codigoPostal') }}@else{{ $declaracion->datos->codigoPostal }}@endif" maxlength="7" required >
                            @error('codigoPostal')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>

                      </fieldset>


                      <p>&nbsp;</p>

                      <fieldset>

                      <legend><h4 class="mb-3">Actividad Laboral</h4></legend>
                      <div class="row">
                        <div class="col-md-4 mb-3">
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

                        <div class="col-md-4 mb-3">
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

                          <div class="col-md-4 mb-3">
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

                        <div class="form-group row">
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
                            <label for="fechaIngreso">Fecha Ingreso: <code>*</code></label>
                            <input type="date" tabindex="{{ ++$tabindex }}" class="form-control @error('fechaIngreso') is-invalid @enderror" id="fechaIngreso" name="fechaIngreso" value="@if(old('fechaIngreso')){{ old('fechaIngreso') }}@endif">
                            @error('fechaIngreso')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

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


$(document).ready(function(){

  $("#tipoInmueble").ready(mostrar_otro);
  $("#tipoInmueble").change(mostrar_otro);

  function mostrar_otro()
  {
    var prestamoValue = $("#tipoInmueble").val();

    if(prestamoValue == "OTRO")
    {
      $('#div_especifiqueOtro').show();
    }
    else
    {
      $('#div_especifiqueOtro').hide();
    }
  }

  $("#pais_clave").ready(mostrar_mexico);
  $("#pais_clave").change(mostrar_mexico);

  $("#entidadFederativa_clave").change(mostrar_alcaldias);
  $("#municipioAlcaldia_clave").change(mostrar_localidades);
  $("#coloniaLocalidad_select").change(mostrar_cp);

  function mostrar_mexico()
  {
    var paisValue = $("#pais_clave").val();

    if(paisValue == "MX")
    {
      $('#div_entidadFederativa').show();
      $('#div_municipioAlcaldia').show();
      $('#div_coloniaLocalidad').show();

      $('#div_estadoProvincia').hide();
      $('#div_ciudadLocalidad').hide();

      $('#entidadFederativa_clave').attr("required","required");
      $('#municipioAlcaldia_clave').attr("required","required");
      $('#coloniaLocalidad_select').attr("required","required");
      $('#entidadFederativa_clave').attr("name","entidadFederativa_clave");
      $('#municipioAlcaldia_clave').attr("name","municipioAlcaldia_clave");
      $('#coloniaLocalidad_select').attr("name","coloniaLocalidad");
      $('#codigoPostal').attr("readonly","readonly");

      $('#estadoProvincia').removeAttr("name");
      $('#ciudadLocalidad').removeAttr("name");
      $('#estadoProvincia').removeAttr("required");
      $('#ciudadLocalidad').removeAttr("required");
    }
    else
    {
      $('#div_entidadFederativa').hide();
      $('#div_municipioAlcaldia').hide();
      $('#div_coloniaLocalidad').hide();

      $('#div_estadoProvincia').show();
      $('#div_ciudadLocalidad').show();

      $('#estadoProvincia').attr("required","required");
      $('#ciudadLocalidad').attr("required","required");
      $('#estadoProvincia').attr("name","estadoProvincia");
      $('#ciudadLocalidad').attr("name","ciudadLocalidad");

      $("#entidadFederativa_clave").removeAttr("name");
      $('#municipioAlcaldia_clave').removeAttr("name");
      $('#coloniaLocalidad_select').removeAttr("name");
      $("#entidadFederativa_clave").removeAttr("required");
      $('#municipioAlcaldia_clave').removeAttr("required");
      $('#coloniaLocalidad_select').removeAttr("required");

      $('#codigoPostal').removeAttr("readonly");
      $('#codigoPostal').attr("maxlength","13");
    }
  }

  function mostrar_alcaldias()
  {
    var entidadValue = $("#entidadFederativa_clave").val();

    $('#municipioAlcaldia_clave').find('option').not(':first').remove();

    $.ajax({
      url: '../../../../catalogo/getAlcaldias/'+entidadValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {

          for(var i=0; i<len; i++)
          {
            var id = response[i].Cve_Mun;
            var nombre = response[i].Nom_Mun;
            var entidad = response[i].Cve_Ent;
            var option = "<option value='"+id+"'>"+nombre+"</option>";

            $("#municipioAlcaldia_clave").append(option);
            $('#coloniaLocalidad_select').find('option').not(':first').remove();
          }
        }
      }
    });
  };

  function mostrar_localidades()
  {
    var entidadValue = $("#entidadFederativa_clave").val();
    var alcaldiaValue = $("#municipioAlcaldia_clave").val();

    $('#coloniaLocalidad_select').find('option').not(':first').remove();

    $.ajax({
      url: '../../../../catalogo/getLocalidades/'+entidadValue+'/'+alcaldiaValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {

          for(var i=0; i<len; i++)
          {
            var nombre = response[i].Nom_Loc;
            var option = "<option value='"+nombre+"'>"+nombre+"</option>";
            $("#coloniaLocalidad_select").append(option);
          }
        }
      }
    });
  }

  function mostrar_cp()
  {
    var entidadValue = $("#entidadFederativa_clave").val();
    var alcaldiaValue = $("#municipioAlcaldia_clave").val();
    var localidadValue = $("#coloniaLocalidad_select").val();

    $.ajax({
      url: '../../../../catalogo/getCP/'+entidadValue+'/'+alcaldiaValue+'/'+localidadValue,
      type: 'get',
      dataType: 'json',
      success: function(response)
      {
        var len = 0;
        if(response != null)
        {
          len = response.length;
        }

        if(len > 0)
        {

          for(var i=0; i<len; i++)
          {
            var cp = response[i].CP;
            $("#codigoPostal").val(cp);
            $("#codigoPostal").attr("readonly","readonly");
          }
        }
      }
    });
  }//////


});
@endsection
