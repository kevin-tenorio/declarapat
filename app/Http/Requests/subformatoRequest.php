<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class subformatoRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }





  public function messages()
  {
    return [
      'beneficiarioPrograma_clave.exists' => 'Seleccione una opción.',
      'nombrePrograma.required' => 'Indique el nombre del Programa.',
      'institucionOtorgante.required' => 'Nombre de la Institución Otorgante',
      'nivelOrdenGobierno.required' => 'El orden de gobierno es obligatorio.',
      'tipoApoyo_clave.exists' => 'Seleccione el tipo de Apoyo.',
      'montoApoyoMensual_valor.required' => "Indique la cantidad.",
      'montoApoyoMensual_moneda.required' => "La moneda seleccionada no existe.",
      'especifiqueApoyo.required_if' => 'Especifique el Tipo de Apoyo.',

      /* EXPERIENCIA LABORAL */
      'ambitoSector_clave.exists' => 'Por favor seleccione una opción...',
      'ambitoSector_clave.required' => 'Este campo es obligatorio.',
      'especifiqueAmbito.required_if' => 'Este campo es obligatorio.',
      'especifiqueAmbito.max' => 'Este campo no debe tener más de 150 caracteres.',
      'nivelOrdenGobierno.exists' => 'Por favor seleccione una opción...',
      'nivelOrdenGobierno.required' => 'Este campo es obligatorio.',
      'ambitoPublico.exists' => 'Por favor seleccione una opción...',
      'ambitoPublico.required' => 'Este campo es obligatorio.',
      'nombreEntePublico.required' => 'Este campo es obligatorio.',
      'nombreEntePublico.max' => 'Este campo no debe tener más de 150 caracteres.',
      'areaAdscripcion.required' => 'Este campo es obligatorio.',
      'areaAdscripcion.max' => 'Este campo no debe tener más de 150 caracteres.',
      'empleoCargoComision.max' => 'Este campo no debe tener más de 150 caracteres.',
      'funcionPrincipal.required' => 'Este campo es obligatorio.',
      'funcionPrincipal.max' => 'Este campo no debe tener más de 150 caracteres.',
      'fechaIngreso.required' => 'Este campo es obligatorio.',
      'fechaIngreso.date' => 'Indique la fecha de ingreso.',
      'fechaEgreso.required' => 'Este campo es obligatorio.',
      'fechaEgreso.date' => 'Indique la fecha de egreso.',
      'ubucacion.required' => 'Este campo es obligatorio.',
      'ubicacion.exists' =>'Por favor seleccione una opción...',
      'nombreEmpresaSociedadAsociacion.required' => 'Este campo es obligatorio.',
      'nombreEmpresaSociedadAsociacion.max' => 'Este campo no debe tener más de 150 caracteres.',
      'rfc.max' => 'Este campo no debe tener más de 13 caracteres.',
      'area.required' => 'Este campo es obligatorio.',
      'area.max' => 'Este campo no debe tener más de 150 caracteres.',
      'puesto.max' => 'Este campo no debe tener más de 150 caracteres.',
      'sector.required_unless' => 'Este campo es obligatorio.',
      'sector.required_exists' => 'Por favor seleccione una opción...',

      /* DEPENDIENTES ECONÓMICOS*/
      'nombre.required' => 'Este campo es obligatorio.',
      'nombre.max' => 'Este campo no debe tener más de 100 caracteres.',
      'nombre.alpha' => "En este campo solo se aceptan letras",
      'primerApellido.alpha' => "En este campo solo se aceptan letras",
      'primerApellido.required' =>'Este campo es obligatorio.',
      'primerApellido.max' =>  'Este campo no debe tener más de 100 caracteres.',
      'segundoApellido.alpha' => "En este campo solo se aceptan letras",
      'segundoApellido.max' => 'Este campo no debe tener más de 100 caracteres.',
      'fechaNacimiento.required' => 'Este campo es obligatorio.',
      'fechaNacimiento.date' => 'Escoja una fecha.',
      'rfc.size' => 'Este campo debe ser de 12 caracteres.',
      'parentesco.required' => 'Este campo es obligatorio.',
      'parentesco.exists' => 'Por favor seleccione una opción.',
      'extranjero.required' => 'Este campo es obligatorio.',
      'extranjero.boolean' => 'Por favor seleccione una opción.',
      'curp.required_if' => 'Este campo es obligatorio.',
      'curp.required.size' =>  'Este campo debe ser de 18 caracteres.',
      'habitaDomicilioDeclarante.required' => 'Este campo es obligatorio.',
      'habitaDomicilioDeclarante.boolean' => 'Por favor seleccione una opción.',
      'lugarDondeReside.required_if' => 'Este campo es obligatorio.',
      #'entidadFederativa_clave'
      #'municipioAlcaldia_clave'
      #'coloniaLocalidad_select'
      'estadoProvincia.required_if' => 'Este campo es obligatorio.',
      'estadoProvincia.max' => 'Este campo no debe tener más de 150 caracteres.',
      'ciudadLocalidad.required_if' => 'Este campo es obligatorio.',
      'ciudadLocalidad.max' => 'Este campo no debe tener más de 150 caracteres.',
      'calle.required_unless' => 'Este campo es obligatorio.',
      'calle.max' => 'Este campo no debe tener más de 150 caracteres.',
      'numeroExterior.required_unless' => 'Este campo es obligatorio.',
      'numeroExterior.max' => 'Este campo no debe tener más de 10 caracteres.',
      'numeroInterior.max' => 'Este campo no debe tener más de 5 caracteres.',
      'codigoPostal.required_unless' => 'Este campo es obligatorio.',
      'codigoPostal.max' => 'Este campo no debe tener más de 7 caracteres.',
      'actividadLaboral.required' =>'Este campo es obligatorio.',
      'actividadLaboral.max' =>'Este campo no debe tener más de 150 caracteres.',
      'nivelOrdenGobierno.required_if' => 'Este campo es obligatorio.',
      'nivelOrdenGobierno.exists' => 'Por favor seleccione una opción.',
      'ambitoPublico.required_if' => 'Este campo es obligatorio.',
      'ambitoPublico.exists' => 'Por favor seleccione una opción.',
      'nombreEntePublico.required_if' => 'Este campo es obligatorio.',
      'nombreEntePublico.max' => 'Este campo no debe tener más de 150 caracteres.',
      'areaAdscripcion.required_if' => 'Este campo es obligatorio.',
      'areaAdscripcion.max' => 'Este campo no debe tener más de 150 caracteres.',
      'empleoCargoComision.required_if' => 'Este campo es obligatorio.',
      'empleoCargoComision.max' => 'Este campo no debe tener más de 150 caracteres.',
      'funcionPrincipal.required_if' => 'Este campo es obligatorio.',
      'funcionPrincipal.max' => 'Este campo no debe tener más de 150 caracteres.',
      'monto_mensual_valor.required' => 'Este campo es obligatorio.',
      'monto_mensual_valor.numeric' => "En este campo solo se aceptan numeros",
      'monto_mensual_moneda.required' => 'Este campo es obligatorio.',
      'monto_mensual_moneda.exists' => 'Por favor seleccione una opción.',
      'fechaIngreso.required' => 'Este campo es obligatorio.',
      'fechaIngreso.date' => 'Escoja una fecha.',
      'nombreEmpresaSociedadAsociacion.required_if' => 'Este campo es obligatorio.',
      'nombreEmpresaSociedadAsociacion.max' => 'Este campo no debe tener más de 150 caracteres.',
      'empleoCargo.required_if' => 'Este campo es obligatorio.',
      'empleoCargo.max' => 'Este campo no debe tener más de 150 caracteres.',
      'proveedorContratistaGobierno.required_if' => 'Este campo es obligatorio.',
      'proveedorContratistaGobierno.boolean' => 'Por favor seleccione una opción.',
      'sector.required' => 'Este campo es obligatorio.',
      'sector.exists' => 'Por favor seleccione una opción.',
      'rfc_empresa.size' => 'Este campo debe ser de 13 caracteres.',
      'fechaIngreso.required_if' => 'Este campo es obligatorio.',
      'fechaIngreso.date' => 'Escoja una fecha.',
      'salario.required_if' => 'Este campo es obligatorio.',
      'salario.numeric' =>  "En este campo solo se aceptan numeros",
      'salario_moneda.required_if' => 'Este campo es obligatorio.',
      'salario_moneda.exists' => 'Por favor seleccione una opción.',

      /* CUENTAS BANCARIAS*/
      'tipoInversion_clave.required' => 'Este campo es obligatorio.',
      'tipoInversion_clave.exists' => 'Por favor seleccione una opción...',
      'subTipoInversion_clave.required' => 'Este campo es obligatorio.',
      'subTipoInversion_clave.exists' => 'Por favor seleccione una opción...',
      'titular_clave.required' => 'Este campo es obligatorio.',
      'titular_clave.exists' => 'Por favor seleccione una opción...',
      'numeroCuentaContrato.required' => 'Este campo es obligatorio.',
      'numeroCuentaContrato.max' => 'Este campo no debe tener más de 100 caracteres.',
      'tercero_tipoPersona.required' => 'Este campo es obligatorio.',
      'tercero_tipoPersona.exists' => 'Por favor seleccione una opción...',
      'tercero_nombreRazonSocial.required' => 'Este campo es obligatorio.',
      'tercero_nombreRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',
      'extranjero.required' => 'Este campo es obligatorio.',
      'extranjero.exists' => 'Por favor seleccione una opción...',
      'institucionRazonSocial.required' => 'Este campo es obligatorio.',
      'institucionRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',
      'saldoSituacionActual_valor.numeric' => 'Este campo es numerico.',
      'saldoSituacionActual_valor.required' => 'Este campo es obligatorio.',
      'saldoSituacionActual_moneda.required' => 'Este campo es obligatorio.',
      'saldoSituacionActual_moneda.exists' => 'Por favor seleccione una opción...',
      'rfc.max' => 'Este campo no debe tener más de 13 caracteres.',

      /* ADEUDOS / PASIVOS */
      'titular.required' => 'Este campo es obligatorio.',
      'titular.exists' => 'Por favor seleccione una opción...',
      'tipoAdeudo.required' => 'Este campo es obligatorio.',
      'tipoAdeudo.exists' => 'Por favor seleccione una opción...',
      'numeroCuentaContrato.required' => 'Este campo es obligatorio.',
      'numeroCuentaContrato.max' => 'Este campo no debe tener más de 20 caracteres.',
      'fechaAdquisicion.required' => 'Este campo es obligatorio.',
      'fechaAdquisicion.date' => 'Seleccione una fecha.',
      'montoOriginal_valor.required' => 'Este campo es obligatorio.',
      'montoOriginal_valor.max' => 'Este campo no debe tener más de 10 caracteres.',
      'montoOriginal_moneda.required' => 'Este campo es obligatorio.',
      'montoOriginal_moneda.exists' => 'Por favor seleccione una opción...',
      'saldoInsolutoFechaConclusion_valor.required' => 'Este campo es obligatorio.',
      'saldoInsolutoFechaConclusion_valor.max' => 'Este campo no debe tener más de 10 caracteres.',
      'saldoInsolutoFechaConclusion_moneda.required' => 'Este campo es obligatorio.',
      'saldoInsolutoFechaConclusion_moneda.exists' =>  'Por favor seleccione una opción...',
      'tercero_tipoPersona.exists' => 'Por favor seleccione una opción...',
      'tercero_nombreRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',
      'tipoPersona.required' => 'Este campo es obligatorio.',
      'tipoPersona.exists' => 'Por favor seleccione una opción...',
      'nombreRazonSocial.required' => 'Este campo es obligatorio.',
      'nombreRazonSocial.max' => 'Este campo no debe tener más de 150 caracteres.',
      /* PRESTAMOS DE TERCEROS */
      'tipoInmueble_clave.required_without' => 'Olvidaste seleccionar un inmueble.',
      'tipoInmueble_clave.exists' => 'El inmueble no existe en la lista.',

      'especifiqueOtro.required_if' => 'Olvidaste especificar el inmueble',
      'especifiqueOtro.max' => 'La especificacion no puede tener más de 50 caracteres',

      'pais.required' => 'Olvidaste seleccionar un país.',
      'pais.exists' => 'El país no existe en la lista.',

      'estadoProvincia.required_unless' => 'Olvidaste agregar el estado/provincia.',
      'estadoProvincia.max' => 'El estado/provincia no puede tener más de 100 caracteres',

      'ciudadLocalidad.required_unless' => 'Olvidaste agregar la ciudad/localidad. #1',
      'ciudadLocalidad.required_with' => 'Olvidaste agregar la ciudad/localidad. #2',
      'ciudadLocalidad.max' => 'La ciudad/localidad no puede tener más de 100 caracteres',

      'entidadFederativa_clave.required_if' => 'Olvidaste seleccionar el estado.',
      'entidadFederativa_clave.exists' => 'La entidad no existe en la lista.',

      'municipioAlcaldia_clave.required_if' => 'Olvidaste seleccionar el municipio. #1',
      'municipioAlcaldia_clave.required_with' => 'Olvidaste seleccionar el municipio. #2',
      'municipioAlcaldia_clave.exists' => 'El municipio no existe en la lista.',

      'coloniaLocalidad.required_if' => 'Olvidaste seleccionar la colonia #1.',
      'coloniaLocalidad.required_with' => 'Olvidaste seleccionar la colonia #2.',
      'coloniaLocalidad.exists' => 'La colonia no existe en la zona.',

      'calle.required' => 'Olvidaste agregar tu calle.',
      'calle.max' => 'La calle no debe tener más de 100 letras.',

      'numeroExterior.required' => 'Olvidaste agregar tu número exterior.',
      'numeroExterior.alpha_num' => 'El número exterior no puede tener símbolos como: !-#$%&.',
      'numeroExterior.min' => 'El número exterior debe tener al menos un caracter.',
      'numeroExterior.max' => 'El número exterior debe tener máximo 6 caracteres.',

      'numeroInterior.alpha_num' => 'El número interior no puede tener símbolos como: !-#$%&.',
      'numeroInterior.min' => 'El número interior debe tener al menos un caracter.',
      'numeroInterior.max' => 'El número interior debe tener máximo 5 caracteres.',

      'codigoPostal.required' => 'Olvidaste agregar código postal.',
      'codigoPostal.min' => 'El código postal debe tener al menos 3 caracteres.',
      'codigoPostal.max' => 'El código postal debe tener máximo 9 caracteres.',

      'tipo_clave.required' => 'Olvidaste seleccionar el tipo de vehículo.',
      'tipo_clave.exists' => 'El tipo de vehículo no existe en la lista.',

      'marca.required' => 'Olvidaste agregar la marca.',
      'marca.max' => 'La marca no puede tener más de 50 caracteres.',

      'modelo.required' => 'Olvidaste agregar el modelo.',
      'modelo.max' => 'El modelo no puede tener más de 50 caracteres.',

      'anio.required' => 'Olvidaste agregar el año.',
      'anio.digits_between' => 'El año debe tener 4 dígitos.',
      'anio.integer' => 'El año no es un número.',

      'numeroSerieRegistro.required' => 'Olvidaste agregar el no. de serie.',
      'numeroSerieRegistro.max' => 'El no. de serie no puede tener más de 50 caracteres.',

      'lugarRegistro_pais.required' => 'Olvidaste agregar el país.',
      'lugarRegistro_pais.exists' => 'El país no existe en la lista dada.',

      'pais_clave.required' => 'Olvidaste seleccionar un país.',
      'pais_clave.exists' => 'El país no existe en la lista.',

      'tipoDuenoTitular.required' => 'El tipo de persona es obligatorio.',
      'tipoDuenoTitular.exists' => 'El tipo de persona no existe en la lista.',

      'nombreTitular.required' => 'Olvidaste agregar el nombre del titular.',
      'nombreTitular.max' => 'El nombre no puede tener más de 100 caracteres.',

      'rfc.alpha_num' => 'El RFC debe ser alfanumérico sin símbolos.',
      'rfc.size' => 'El RFC debe tener de 12 caracteres para personas morales y 13 caracteres para físicas.',

      'relacionConTitular.required' => 'Olvidaste agregar la relación con el titular.',
      'relacionConTitular.max' => 'La relación no puede tener más de 50 caracteres.',

      /* PARTICIPACIONES */
      'tipoRelacion.exists' => 'Por favor seleccione una opción...',
      'tipoRelacion.required' => 'Este campo es obligatorio.',
      'nombreEmpresaSociedadAsociacion.required' => 'Indique el nombre de la empresa, sociedad o asociación.',
      'rfc.max' => 'El RFC debe contener 12 caracteres.',
      'porcentajeParticipacion.numeric' => 'Este valor es numérico.',
      'porcentajeParticipacion.required' => 'Indique el porcentaje',
      'porcentajeParticipacion.max' => 'El valor no debe ser mayor a 100',
      'tipoParticipacion.exists' => 'Por favor seleccione una opción...',
      'tipoParticipacion.required' => 'Por favor seleccione una opción...',
      'especifiqueParticipacion.required_if' => 'Indica el tipo de Participación.',
      'especifiqueParticipacion.max' => 'Este campo no debe tener más de 150 caracteres.',
      'recibeRemuneracion.boolean' => 'Por favor seleccione una opción...',
      'recibeRemuneracion.required' => 'Este campo es obligatorio...',
      'montoMensual_valor.required_if' => 'Indique el monto.',
      'montoMensual_moneda.required_if' => 'Indique la moneda.',

      'entidadFederativa.required_if' => 'Por favor seleccione una opción...',
      /* DECISIONES */
      'tipoRelacion.exists' => 'Por favor seleccione una opción...',
      'tipoRelacion.required' => 'Este campo es obligatorio.',
      'tipoInstitucion.exists' => 'Indique la institución.',
      'tipoInstitucion.required' => 'Este campo es obligatorio.',
      'nombreInstitucion.required' => 'Especifique el nombre de la institución.',
      'rfc.max' => 'El RFC debe contener 12 caracteres.',
      'puestoRol.required' => 'Indique el puesto o Rol.',
      'fechaInicioParticipacion.date' => 'Indique la fecha de inicio.',
      'fechaInicioParticipacion.required' => 'Este campo es obligatorio.',
      'recibeRemuneracion.boolean' => 'Por favor seleccione una opción...',
      'recibeRemuneracion.required' => 'Este campo es obligatorio.',
      'montoMensual_valor.required_if' => 'Indique el monto.',
      'montoMensual_moneda.required_if' => 'Indique la moneda.',
      'entidadFederativa.required_if' => 'Por favor seleccione una opción...',
      /*BENEFICIOS PRIVADOS*/
      'tipoBeneficio.exists' => 'La opción seleccionada en tipo de beneficio no existe.',
      'especifiqueTipo.required_if' => 'Indique el tipo de beneficio.',
      'especifiqueTipo.max' => 'El tipo de beneficio no puede tener mas de 100 caracteres.',
      'beneficiario.exists' => 'La opción seleccionada en beneficiario no existe.',
      'especifiqueBeneficiario.required_if' => 'Indique el tipo de beneficiario.',
      'especifiqueBeneficiario.max' => 'El tipo de beneficiario no puede tener mas de 100 caracteres.',
      'formaRecepcion.exists' => "La opción seleccionada en forma de recepción no existe.",
      'especifiqueBeneficio.required_if' => "Indique el beneficio en especie.",
      'montoMensualAproximado_valor.required' => "Indique la cantidad.",
      'montoMensualAproximado_moneda.exists' => "La moneda seleccionada no existe.",
      'sector.exists' => "La opción seleccionada en sector no existe.",
      'especifiqueSector.required_if' => "Indique el sector.",
      'otorgante_tipoPersona.exists' => "La opción seleccionada en tipo persona no existe.",
      'otorgante_nombreRazonSocial.required' => "Indique el nombre completo o razón social del otorgante.",
      'otorgante_nombreRazonSocial.max' => "El nombre o razón no puede tener más de 100 caracteres.",
      'otorgante_rfc.size' => 'El RFC debe tener 12 caracteres para personas morales y 13 caracteres para personas físicas.',
      'otorgante_rfc.alpha_num' => "El RFC tiene símbolos no permitidos.",
      /*FIDEICOMISOS*/
      'rfcFideicomiso.alpha_num' => 'El RFC debe ser alfanumérico.',
      'rfcFideicomiso.min' => 'El RFC debe tener 12 caracteres para personas morales y 13 caracteres para personas físicas.',
      'rfcFideicomiso.max' => 'El RFC debe tener 12 caracteres para personas morales y 13 caracteres para personas físicas.',
      'tipoFideicomiso.exists' => 'La opción seleccionada en tipo de fideicomiso no existe.',
      'extranjero.exists' => 'La opción seleccionada en ubicación no existe.',
      'tipoRelacion.exists' => 'La opción seleccionada en participante no existe.',
      'tipoParticipacion.exists' => 'La opción seleccionada en tipo de participación no existe.',
      'sector.exists' => 'La opción seleccionada en tipo de sector no existe.',
      'especifiqueSector.required_if' => 'Indica el sector.',
      'especifiqueSector.max' => 'El sector no debe tener más de 100 caracteres.',
      'fiduciario_nombreRazonSocial.required' => 'El nombre o razón social es obligatorio.',
      'fiduciario_nombreRazonSocial.max' => 'El nombre o razón social no debe tener más de 150 caracteres.',
      'fiduciario_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
      'fiduciario_rfc.min' => 'El RFC debe tener 12 caracteres para personas morales y 13 caracteres para personas físicas.',
      'fiduciario_rfc.max' => 'El RFC debe tener 12 caracteres para personas morales y 13 caracteres para personas físicas.',
      'fideicomitente_tipoPersona.exists' => 'La opción seleccionada en tipo de persona no existe.',
      'fideicomitente_nombreRazonSocial.required' => 'El nombre o razón social es obligatorio.',
      'fideicomitente_nombreRazonSocial.max' => 'El nombre o razón social no debe tener más de 150 caracteres.',
      'fideicomitente_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
      'fideicomitente_rfc.size' => 'El RFC debe tener 12 caracteres para personas morales y 13 caracteres para personas físicas.',
      'fideicomisario_tipoPersona.exists' => 'La opción seleccionada en tipo de persona no existe.',
      'fideicomisario_nombreRazonSocial.required' => 'El nombre o razón social es obligatorio.',
      'fideicomisario_nombreRazonSocial.max' => 'El nombre o razón social no debe tener más de 150 caracteres.',
      'fideicomisario_rfc.alpha_num' => 'El RFC debe ser alfanumérico.',
      'fideicomisario_rfc.size' => 'El RFC debe tener 12 caracteres para personas morales y 13 caracteres para personas físicas.',
    ];
  }


  public function rules()
  {

    if($this->method() == "GET")
    {
    	return [];
    }


    if($this->method() == "POST")
    {

      switch($this->route()->formato_slug)
      {
        case "datos_curriculares":
          return [
            'nivel_clave' => 'exists:catalogos.nivel,clave',
            'carreraAreaConocimiento' => 'required|max:150',
            'institucionEducativa_ubicacion' => 'exists:catalogos.extranjero,clave',
            'institucionEducativa_nombre' => 'required|max:150',
            'estatus' => 'exists:catalogos.estatus,valor',
            'documentoObtenido' => 'exists:catalogos.documentoObtenido,valor',
            'fechaObtencion' => 'date',
          ];
        break;
        case "datos_empleo":
          return [
            'nivelOrdenGobierno' => 'required',
            'ambitoPublico' => 'required',
            'nombreEntePublico' => 'required|max:120',
            'areaAdscripción' => 'required|max:120',
            'empleoCargoComision' => 'required|max:120',
            'contratadoPorHonorarios' => 'required',
            'nivelEmpleoCargoComision' => 'required|max:120',
            'funcionPrincipal' => 'required|max:120',
            'fechaTomaPosesion' => 'required',
            'telefono' => 'required|digits_between:10,12',
            'pais' => 'required|exists:catalogos.paises,ISO2',
            'entidadFederativa' => 'required',
            'municipioAlcaldia' => 'required',
            'coloniaLocalidad' => 'required|max:191',
            'estadoProvincia' => 'required|max:191',
            'ciudadLocalidad' => 'required|max:191',
            'calle' => 'required|max:191',
            'numeroExterior' => 'required|max:6',
            'numeroInterior' => 'nullable|max:6',
            'codigoPostal' => 'required|max:5',
              ];
        break;
        case "experiencia_laboral.":
          return[
             'ambitoSector_clave' => 'exists:catalogos.ambitosector,clave|required',
             'especifiqueAmbito' => 'required_if:ambitoSector_clave,OTR|max:150',
             'nivelOrdenGobierno' => 'exists:catalogos.nivelordengobierno,valor|required',
             'ambitoPublico' => 'exists:catalogos.ambitopublico,valor|required',
             'nombreEntePublico' => 'required|max:150',
             'areaAdscripcion' => 'required|max:150',
             'empleoCargoComision' => 'max:150',
             'funcionPrincipal' => 'required|max:150',
             'fechaIngreso' => 'required|date',
             'fechaEgreso' => 'required|date',
             'ubicacion' => 'required|exists:catalogos.extranjero,clave' ,
             'nombreEmpresaSociedadAsociacion' => 'required|max:150',
             'rfc' => 'max:12',
             'area' => 'required|max:150',
             'puesto' => 'max:150',
             'sector' => 'required_unless:ambitoSector_clave,PUB|exists:catalogos.sector,clave',
             'especifiqueSector' => 'required_if:sector,OTRO|max:150',
            ];
        break;
        case "dependientes_economicos":
          return[
             'nombre' => 'alpha|required|max:100',
             'primerApellido' => 'alpha|required|max:100',
             'segundoApellido' => 'nullable|alpha|max:100',
             'fechaNacimiento' => 'required|date',
             'rfc' => 'nullable|size:13',
             'parentesco' => 'required|exists:catalogos.parentescorelacion,clave',
             'extranjero' => 'required|boolean',
             'curp' => 'required_if:extranjero,0|size:18',
             'habitaDomicilioDeclarante' => 'required|boolean',
             'lugarDondeReside' => 'required_if:habitaDomicilioDeclarante,0',
             'pais' => 'required_if:lugarDondeReside,0',
             #'entidadFederativa_clave' ='required_if:lugarDondeReside,1|exists:catalogos.inegi,Cve_Ent',
             #'municipioAlcaldia_clave' ='required_if:lugarDondeReside,1|exists:catalogos.inegi,Cve_Mun',
             #'coloniaLocalidad_select' ='required_if:lugarDondeReside,1|exists:catalogos.inegi,Nom_Loc',
             'estadoProvincia' => 'required_if:lugarDondeReside,0|max:150',
             'ciudadLocalidad' => 'required_if:lugarDondeReside,0|max:150',
             'calle' => 'required_unless:lugarDondeReside,2|max:150',
             'numeroExterior' => 'required_unless:lugarDondeReside,2|max:10',
             'numeroInterior' => 'nullable|max:5',
             'codigoPostal' => 'required_unless:lugarDondeReside,2|max:7',
             'actividadLaboral' => 'required|max:100',
             'nivelOrdenGobierno' => 'required_if:actividadLaboral,PUB|exists:catalogos.nivelordengobierno,valor',
             'ambitoPublico' => 'required_if:actividadLaboral,PUB|exists:catalogos.ambitopublico,valor',
             'nombreEntePublico' => 'required_if:actividadLaboral,PUB|max:100',
             'areaAdscripcion' => 'required_if:actividadLaboral,PUB|max:100',
             'empleoCargoComision' => 'required_if:actividadLaboral,PUB|max:100',
             'funcionPrincipal' => 'required_if:actividadLaboral,PUB|max:150',
             'monto_mensual_valor' => 'required|numeric',
             'monto_mensual_moneda' => 'required|exists:catalogos.tipomoneda,clave',
             'fechaIngreso' => 'required|date',
             'nombreEmpresaSociedadAsociacion' => 'required_if:actividadLaboral,PRI|max:150',
             'empleoCargo' => 'required_if:actividadLaboral,PRI|max:150',
             'proveedorContratistaGobierno' => 'required_if:actividadLaboral,PRI|boolean',
             'sector' => 'required_if:actividadLaboral,PRI|exists:catalogos.sector,clave',
             'rfc_empresa' => 'nullable|size:12',
             'fechaIngreso' => 'required_if:actividadLaboral,PRI|date',
             'salario' => 'required_if:actividadLaboral,PRI|numeric',
             'salario_moneda' => 'required_if:actividadLaboral,PRI|exists:catalogos.tipomoneda,clave',
        ];
        break;
        case "cuentas_bancarias":
          if($this->tercero_tipoPersona == "MORAL")
          {
            $rfcCuenta = 'nullable|alpha_num|size:12';
          }
          else
          {
            $rfcCuenta = 'nullable|alpha_num|size:13';
          }
          return [
          'tipoInversion_clave' => 'required|exists:catalogos.tipoinversion,clave',
          'subTipoInversion_clave' => 'required|exists:catalogos.subtipoinversion,clave',
          'titular_clave' => 'required|exists:catalogos.titularbien,clave',
          'numeroCuentaContrato' => 'required|max:100',
          'tercero_tipoPersona' => 'required|exists:catalogos.tipopersona,clave',
          'tercero_nombreRazonSocial' => 'required|max:150',
          'tercero_rfc' => $rfcCuenta,
          'extranjero' => 'required|exists:catalogos.extranjero,clave',
          'institucionRazonSocial' => 'required|max:150',
          'saldoSituacionActual_valor' => 'numeric|required',
          'saldoSituacionActual_moneda' => 'required|exists:catalogos.tipomoneda_2,ISO4217',
        ];
        break;
        case "adeudos_pasivos":
         if($this->tercero_tipoPersona == "MORAL")
            {
              $rfcAdeudos = 'nullable|alpha_num|size:12';
            }
         else
            {
              $rfcAdeudos = 'nullable|alpha_num|size:13';
            }
        return[
            'titular_clave' => 'required|exists:catalogos.titulares,clave',
            'tipoAdeudo_clave' => 'required|exists:catalogos.tipoadeudo,clave',
            'numeroCuentaContrato' => 'required|max:100',
            'fechaAdquisicion' => 'required|date',
            'montoOriginal_valor' => 'required|max:20',
            'montoOriginal_moneda' => 'required|exists:catalogos.tipomoneda_2,ISO4217',
            'saldoInsolutoFechaConclusion_valor' => 'required|max:20',
            'saldoInsolutoFechaConclusion_moneda' => 'required|exists:catalogos.tipomoneda_2,ISO4217',
            'tercero_tipoPersona' => 'exists:catalogos.tipopersona,clave',
            'tercero_nombreRazonSocial' => 'max:150',
            'tercero_rfc' => $rfcAdeudos,
            'tipoPersona' => 'required|exists:catalogos.tipopersona,clave',
            'nombreRazonSocial' => 'required|max:150',
            'rfc' => $rfcAdeudos,
            'pais' => 'required:exists:catalogos.paises,ESPANOL',
         ];
        break;
        case "prestamos_terceros":
          if($this->tipoDuenoTitular == "MORAL")
          {
            $rfc = 'size:12';
          }
          else
          {
            $rfc = 'size:13';
          }

          if(!empty($this->tipoInmueble_clave))
          {
            return
            [
            'tipoInmueble_clave' =>'required|exists:catalogos.tipoinmueble,clave',
            'especifiqueOtro' => 'required_if:tipoInmueble_clave,OTRO|max:100',
            'pais' => 'required|exists:catalogos.paises,ISO2',
            'estadoProvincia' => 'required_unless:pais,MX|max:100',
            'ciudadLocalidad' => 'required_unless:pais,MX|required_with:estadoProvincia|max:100',
            'entidadFederativa_clave' => 'required_if:pais,MX|exists:catalogos.inegi,Cve_Ent',
            'municipioAlcaldia_clave' => 'required_if:pais,MX|required_with:entidadFederativa_clave|exists:catalogos.inegi,Cve_Mun',
            'coloniaLocalidad'        => 'required_if:pais,MX|required_with:entidadFederativa_clave|required_with:municipioAlcaldia_clave|exists:catalogos.inegi,Nom_Loc',
            'calle' => 'required|max:100',
            'numeroExterior' => 'required|alpha_num|min:1|max:6',
            'numeroInterior' => 'nullable|alpha_num|min:1|max:5',
            'codigoPostal' => 'required|min:3|max:9',
            'tipoDuenoTitular' => 'required|exists:catalogos.tipopersona,clave',
            'nombreTitular' => 'required|max:100',
            'rfc' => 'nullable|alpha_num|'.$rfc,
            'relacionConTitular' => 'required|max:100',
            ];
          }
          else
          {
            return
            [
            'tipo_clave' => 'required|exists:catalogos.tipovehiculo,clave',
            'especifiqueOtro' => 'required_if:tipo_clave,OTRO|max:50',
            'marca' => 'required|max:50',
            'modelo' => 'required|max:50',
            'anio' => 'required|integer|digits_between:4,4',
            'numeroSerieRegistro' => 'required|max:50',
            'lugarRegistro_pais' => 'required|exists:catalogos.paises,ISO2',
            'entidadFederativa_clave' => 'required_if:lugarRegistro_pais,MX|exists:catalogos.inegi,Cve_Ent',
            'tipoDuenoTitular' => 'required|exists:catalogos.tipopersona,clave',
            'nombreTitular' => 'required|max:100',
            'rfc' => 'nullable|alpha_num|'.$rfc,
            'relacionConTitular' => 'required|max:100',
            ];
          }
        break;
        case "participaciones":
          return [
            'tipoRelacion' => 'exists:catalogos.tiporelacion,clave|required',
            'nombreEmpresaSociedadAsociacion' => 'required|max:150',
            'rfc' => 'max:12',
            'porcentajeParticipacion' => 'numeric|max:100|required',
            'tipoParticipacion' => 'exists:catalogos.tipoparticipacion,clave|required',
            'especifiqueParticipacion' => 'required_if:tipoParticipacion,OTROS (ESPECIFIQUE)|max:150',
            'recibeRemuneracion' => 'boolean|required',
            'montoMensual_valor' => 'required_if:recibeRemuneracion,1',
            'montoMensual_moneda' => 'required_if:recibeRemuneracion,1',
            'pais' => 'exists:catalogos.paises,ISO2|required',
            #'entidadFederativa' => 'required_if:pais,MX|exists:catalogos.inegiEntidades,Nom_Ent'
            'sector' => 'exists:catalogos.sector,clave|required',
            'especifiqueSector' => 'required_if:sector,OTRO|max:150',
          ];
        break;
        case "decisiones":
          return [
            'tipoRelacion' => 'exists:catalogos.tiporelacion,clave|required',
            'tipoInstitucion' => 'exists:catalogos.tipoinstitucion,clave|required',
            'nombreInstitucion' => 'required|max:150',
            'rfc' => 'max:12',
            'puestoRol' => 'required|max:150',
            'fechaInicioParticipacion' => 'date|required',
            'recibeRemuneracion' => 'boolean',
            'montoMensual_valor' => 'required_if:recibeRemuneracion,1',
            'montoMensual_moneda' => 'required_if:recibeRemuneracion,1',
            'pais' => 'exists:catalogos.paises,ISO2|required',
            #'entidadFederativa' => 'required_if:pais,MX|exists:catalogos.inegiEntidades,Nom_Ent'
          ];
        break;

        case "apoyos_publicos":
          return [
            'beneficiarioPrograma_clave'=> 'exists:catalogos.beneficiarios,clave|required',
            'nombrePrograma' => 'required|max:100',
            'institucionOtorgante' => 'required|max:100',
            'nivelOrdenGobierno' => 'required|exists:catalogos.nivelordengobierno,valor',
            'tipoApoyo_clave' => 'exists:catalogos.tipoapoyo,clave|required',
            'especifiqueApoyo' => 'required_if:tipoApoyo_clave,OTRO|max:100',
            'formaRecepcion' => 'exists:catalogos.formarecepcion,valor|required',
            'montoApoyoMensual_valor' => 'required|max:7',
            'montoApoyoMensual_moneda' => 'required|size:3',
          ];
        break;
        case "representaciones":
          return [
            'tipoRelacion' => 'exists:catalogos.tiporelacion,valor',
            'tipoRepresentacion' => 'exists:catalogos.tiporepresentacion,valor',
            'fechaInicioRepresentacion' => 'nullable|date',
            'tipoPersona' => 'exists:catalogos.tipopersona,valor',
            'nombreRazonSocial' => 'nullable|alpha_num',
            'rfc' => 'nullable|alpha_num',
            'recibeRemuneracion' => 'boolean',
            'montoMensual_valor' => 'nullable|alpha_num',
            'montoMensual_moneda' => 'nullable|alpha|size:3',
            'entidadFederativa_clave' => 'exists:catalogos.inegi,Cve_Ent',
            'pais' => 'exists:catalogos.paises,ISO2',
            'sector_clave' => 'exists:catalogos.sector,clave',
          ];
        break;
        case "clientes":
        if($this->clientePrincipal_tipoPersona == "MORAL")
        {
          $clientePrincipal_rfc = 'nullable|alpha_num|size:12';
        }
        else
        {
          $clientePrincipal_rfc = 'nullable|alpha_num|size:13';
        }
        return [
          'tipoRelacion' => 'exists:catalogos.tipoRelacion,clave',
          'empresa_nombreEmpresaServicio' => 'required|max:100',
          'empresa_rfc' => 'nullable|alpha_num|min:12|max:13',
          'clientePrincipal_tipoPersona' => 'exists:catalogos.tipoPersona,clave',
          'clientePrincipal_nombreRazonSocial' => 'required|max:100',
          'clientePrincipal_rfc' => $clientePrincipal_rfc,
          'sector' => 'exists:catalogos.sector,clave',
          'especifiqueSector' => 'required_if:sector,OTRO|max:100',
          'ubicacion_pais' => 'exists:catalogos.extranjero,clave',
          'ubicacion_entidadFederativa' => 'nullable|exists:catalogos.inegi,Cve_Ent|required_if:ubicacion_pais,MX',
          'montoAproximadoGanancia_valor' => 'required|max:20',
          'montoAproximadoGanancia_moneda' => 'exists:catalogos.tipomoneda,clave',
        ];
        break;
        case "beneficios_privados":
          if($this->otorgante_tipoPersona == "MORAL")
          {
            $otorgante_rfc = 'nullable|alpha_num|size:12';
          }
          else
          {
            $otorgante_rfc = 'nullable|alpha_num|size:13';
          }
          return [
            'tipoBeneficio' => 'exists:catalogos.tipobeneficio,clave',
            'especifiqueTipo' => 'required_if:tipoBeneficio,O|max:100',
            'beneficiario' => 'exists:catalogos.beneficiarios,clave',
            'especifiqueBeneficiario' => 'required_if:beneficiario,OTRO|max:100',
            'formaRecepcion' => 'exists:catalogos.formarecepcion,valor|required',
            'especifiqueBeneficio' => 'max:100|required_if:formaRecepcion,ESPECIE',
            'montoMensualAproximado_valor' => 'required|max:20',
            'montoMensualAproximado_moneda' => 'exists:catalogos.tipomoneda,clave',
            'sector' => 'exists:catalogos.sector,clave',
            'especifiqueSector' => 'required_if:sector,OTRO|max:100',
            'otorgante_tipoPersona' => 'exists:catalogos.tipopersona,valor',
            'otorgante_nombreRazonSocial' => 'required|max:100',
            'otorgante_rfc' => $otorgante_rfc,
            ];
        break;
        case "fideicomisos":
          if($this->fideicomitente_tipoPersona == "MORAL")
          {
            $fideicomitente_rfc = 'nullable|alpha_num|size:12';
          }
          else
          {
            $fideicomitente_rfc = 'nullable|alpha_num|size:13';
          }

          if($this->fideicomisario_tipoPersona == "MORAL")
          {
            $fideicomisario_rfc = 'nullable|alpha_num|size:12';
          }
          else
          {
            $fideicomisario_rfc = 'nullable|alpha_num|size:13';
          }
          return [
            'rfcFideicomiso' => 'nullable|alpha_num|min:12|max:13',
            'tipoFideicomiso' => 'exists:catalogos.tipoFideicomiso,clave',
            'extranjero' => 'exists:catalogos.extranjero,clave',
            'tipoRelacion' => 'exists:catalogos.tipoRelacion,clave',
            'tipoParticipacion' => 'exists:catalogos.tipoParticipacionFideicomiso,clave',
            'sector' => 'exists:catalogos.sector,clave',
            'especifiqueSector' => 'required_if:sector,OTRO|max:100',

            'fiduciario_nombreRazonSocial' => 'required|max:150',
            'fiduciario_rfc' => 'nullable|alpha_num|min:12|max:13',

            'fideicomitente_tipoPersona' => 'exists:catalogos.tipoPersona,clave',
            'fideicomitente_nombreRazonSocial' => 'required|max:150',
            'fideicomitente_rfc' => $fideicomitente_rfc,

            'fideicomisario_tipoPersona' => 'exists:catalogos.tipoPersona,clave',
            'fideicomisario_nombreRazonSocial' => 'required|max:150',
            'fideicomisario_rfc' => $fideicomisario_rfc,
          ];
        break;
      }
    }

  }//rules

}
