<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class formatoRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }





  public function messages()
  {
    return [
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DATOS GENERALES
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						'nombres.required'    => 'Olvidaste agregar tu nombre.',
						'nombres.max'			    => 'El nombre no puede tener más de 100 letras.',

            'primerApellido.required'	=> 'El primer apellido es obligatorio.',
            'primerApellido.max'	=> 'El primer apellido no puede tener más de 50 letras.',

            'segundoApellido.max' => 'El segundo apellido no puede tener más de 50 letras.',

            'paisNacimiento.required'	=> 'El país de nacimiento es obligatorio.',
            'paisNacimiento.exists'	=> 'El país de nacimiento no existe en la lista proporcionada.',

            'nacionalidad.required'	=> 'La nacionalidad es obligatoria.',
            'nacionalidad.exists'	=> 'La nacionalidad no existe en la lista proporcionada.',

            'curp.required' => 'El CURP es obligatorio.',
            'curp.size' => 'El CURP debe tener 18 caracteres.',
            'curp.alpha_num' => 'El CURP debe contener letras y números únicamente.',

            'rfc_rfc.required' => 'El RFC es obligatorio.',
            'rfc_rfc.size' => 'El RFC debe tener 10 caracteres.',
            'rfc_rfc.alpha_num' => 'El RFC debe contener letras y números únicamente.',

            'rfc_homoClave.required' => 'La homoclave es obligatoria.',
            'rfc_homoClave.size' => 'La homoclave debe tener 3 caracteres.',
            'rfc_homoClave.alpha_num' => 'La homoclave debe contener letras y números únicamente.',

            'correoElectronico_institucional.email' => 'El correo institucional no es válido.',
            'correoElectronico_institucional.max' => 'El correo institucional no puede tener mas de 75 caracteres.',

            'correoElectronico_personal.email' => 'El correo personal ingresado no es válido.',
            'correoElectronico_personal.max' => 'El correo personal no puede tener mas de 75 caracteres.',

            'telefono_casa_lada.required_with' => 'La lada es obligatoria con el teléfono de casa.',
            'telefono_casa_lada.exists' => 'La lada no existe en la lista.',

            'telefono_casa.digits_between' => 'El número de casa debe tener 10 dígitos numéricos.',

            'telefono_celularPersonal_lada.required_with' => 'La lada es obligatoria con el teléfono celular.',
            'telefono_celularPersonal_lada.exists' => 'La lada no existe en la lista.',

            'telefono_celularPersonal.digits_between' => 'El número de celular debe tener 10 dígitos numéricos.',

            'situacionPersonalEstadoCivil_clave.required'	=> 'La situación personal es obligatoria.',
            'situacionPersonalEstadoCivil_clave.exists'	=> 'La situación personal no existe en la lista.',

            'regimenMatrimonial_clave.required_if' => 'El régimen matrimonial es obligatorio si eres casado/a.',
            'regimenMatrimonial_clave.exists'	=> 'El régimen matrimonial no existe en la lista.',

            'especifiqueRegimen.required_if' => 'El campo otro es obligatorio si eres casado/a y tu régimen matrimonial es otro.',
            'especifiqueRegimen.max' => 'El campo "otro" no puede tener más de 100 caracteres.',

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DOMICILIO DECLARANTE
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            'pais.required' => 'Olvidaste agregar el país.',
            'pais.exists' => 'El país no existe en la lista dada.',
            'entidadFederativa_clave.required_if' => 'Olvidaste agregar la entidad.',
            'entidadFederativa_clave.required_with' => 'La entidad debe ir junto con el país y municipio.',
            'entidadFederativa_clave.exists' => 'La entidad no existe en la lista dada.',
            'municipioAlcaldia_clave.required_if' => 'Olidaste agregar el municipio.',
            'municipioAlcaldia_clave.required_with' => 'El municipio debe ir con el país y la entidad.',
            'municipioAlcaldia_clave.exists' => 'El municipio no existe en la lista dada.',
            'coloniaLocalidad.required_if' => 'Olvidaste agregar la colonia.',
            'coloniaLocalidad.required_with' => 'La colonia debe ir con el municipio y la entidad.',
            'coloniaLocalidad.exists' => 'La colonia no existe en la lista.',
            'calle.required' => 'Olvidaste agregar la calle.',
            'calle.max' => 'La calle no puede tener más de 100 caracteres.',
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

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DATOS CURRICULARES
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////// DATOS EMPLEO
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            /* DATOS PAREJA */
            'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fechaNacimiento.date' => 'Escoja una fecha.',
            'rfc.size' => 'Este campo debe ser de 13 caracteres.',
            'relacionConDeclarante.required' => 'La relación con el declarante es obligatoria.',
            'relacionConDeclarante.exists' => 'Por favor seleccione una opción...',
            'ciudadanoExtranjero.required' => 'Este campo es obligatorio.',
            'ciudadanoExtranjero.boolean' => 'Por favor seleccione una opción...',
            'curp.required_if' => 'Este campo es obligatorio.',
            'esDependienteEconomico.required' => 'Indque si es dependiente económico.',
            'esDependienteEconomico.boolean' => 'Por favor seleccione una opción...',
            'habitaDomicilioDeclarante.required' => 'Indique si habita el mismo domicilio.',
            'habitaDomicilioDeclarante.boolean' => 'Por favor seleccione una opción...',
            'lugarDondeReside.required_if' => '¿En dónde reside?.',
            'lugarDondeReside.exists' => 'Por favor seleccione una opción...',
            'pais.required_if' =>'Indique el país.',
            'domicilioMexico_calle.required_if' => 'Indique la calle.',
            'domicilioMexico_numeroExterior.max' => 'Este campo debe ser de 10 caracteres.',
            'domicilioMexico_numeroExterior.required' => 'Indique el número exterior.',
            'domicilioMexico_numeroInterior.max' => 'Este campo debe ser de 5 caracteres.',
            'domicilioMexico_codigoPostal.required_if' => 'Indique el código postal en México.',
            'domicilioMexico_codigoPostal.max' => 'Este campo debe ser de un máximo de 7 caracteres.',
            #'entidadFederativa_clave' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Cve_Ent',
            #'municipioAlcaldia_clave' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Cve_Mun',
            #'coloniaLocalidad' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Nom_Loc',
            'domicilioExtranjero_estadoProvincia.required_if' => 'Indique la provincia.',
            'domicilioExtranjero_ciudadLocalidad.required_if' => 'Indique la ciudad/localidad.',
            'domicilioExtranjero_calle.required_if' => 'Indique la calle.',
            'domicilioExtranjero_calle.max' =>  'Este campo no debe tener más de 100 caracteres.',
            'domicilioExtranjero_numeroExterior.required_if' => 'Indique el número exterior.',
            'domicilioExtranjero_numeroExterior.max' => 'Este campo no debe tener más de 10 caracteres.',
            'domicilioExtranjero_numeroInterior.max' => 'Este campo no debe tener más de 5 caracteres.',
            'domicilioExtranjero_codigoPostal.required_if' => 'Indique el código postal.',
            'domicilioExtranjero_codigoPostal.max' =>  'Este campo no debe tener más de 7 caracteres.',
            'actividadLaboral_clave.required' => 'Escoja la actividad laboral.',
            'actividadLaboral_clave.exists' => 'Por favor seleccione una opción...',
            'publico_nivelOrdenGobierno.required_if' => 'Indique el nivel de gobierno.',
            'publico_nivelOrdenGobierno.exists' => 'Por favor seleccione una opción...',
            'publico_ambitoPublico.required_if' => 'Escoja el ámbito público.',
            'publico_ambitoPublico.exists' => 'Por favor seleccione una opción...',
            'publico_nombreEntePublico.required_if' => 'Indique el nombre del ente público.',
            'publico_nombreEntePublico.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_areaAdscripcion.required_if' => 'Indique el área de Adscripción.',
            'publico_areaAdscripcion.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_empleoCargoComision.required_if' => 'Indique el empleo/cargo.',
            'publico_empleoCargoComision.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_funcionPrincipal.required_if' => 'Indique la función principal.',
            'publico_funcionPrincipal.max' => 'Este campo no debe tener más de 100 caracteres.',
            'publico_salarioMensualNeto_valor.required_if' =>'Indique el salario mensual.',
            'publico_salarioMensualNeto_valor.numeric' => "En este campo solo se aceptan numeros",
            'publico_salarioMensualNeto_valor.max' => 'Este campo no debe tener más de 10 caracteres.',
            'publico_salarioMensualNeto_moneda.required_if' =>'Escoja la moneda.',
            'publico_salarioMensualNeto_moneda.exists' => 'Por favor seleccione una opción...',
            'publico_fechaIngreso.required_if' => 'Escoja una fecha.',
            'publico_fechaIngreso.date' => 'Escoja una fecha.',
            'privado_nombreEmpresaSociedadAsociacion.required_if' => 'Nombre de la empresa.',
            'privado_nombreEmpresaSociedadAsociacion.max' => 'Este campo no debe tener más de 100 caracteres.',
            'privado_empleoCargoComision.required_if' => 'Indique el cargo.',
            'privado_empleoCargoComision.max' => 'Este campo no debe tener más de 100 caracteres.',
            'privado_rfc.size' => 'Este campo debe ser de 12 caracteres.',
            'privado_fechaIngreso.required_if' => 'Indique la fecha de ingreso.',
            'privado_fechaIngreso.date' => 'Escoja una fecha.',
            'sector_clave.required_if' => 'Seleccione el sector.',
            'sector_clave.exists' => 'Por favor seleccione una opción...',
            'privado_salarioMensualNeto_valor.required_if' => 'Indique el salario mensual.',
            'privado_salarioMensualNeto_valor.numeric' =>"En este campo solo se aceptan numeros",
            'privado_salarioMensualNeto_moneda.required_if' => 'Indique la moneda.',
            'privado_salarioMensualNeto_moneda.exists' => 'Por favor seleccione una opción...',
            'privado_proveedorContratistaGobierno.required_if' => 'Indique si es contratista.',
            'privado_proveedorContratistaGobierno.boolean' => 'Por favor seleccione una opción...',
            'aclaracionesObservaciones.max' => 'Este campo no debe tener más de 1000 caracteres.',
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
      switch($this->route()->parameters()['formato_slug'])
      {
        case "datos_generales":
        return [
                'nombres' => 'required|max:100',
                'primerApellido' => 'required|max:50',
                'segundoApellido' => 'max:50',
                'paisNacimiento' => 'required|exists:catalogos.paises,ISO2',
                'nacionalidad' => 'required|exists:catalogos.paises,ISO2',
                'curp' => 'required|size:18|alpha_num',
                'rfc_rfc' => 'required|size:10|alpha_num',
                'rfc_homoClave' => 'required|size:3|alpha_num',
                'correoElectronico_institucional' => 'nullable|email|max:75',
                'correoElectronico_personal' => 'nullable|email|max:75',
                'telefono_casa_lada' => 'required_with:telefono_casa|exists:catalogos.paises,LADA',
                'telefono_casa' => 'nullable|digits_between:10,10',
                'telefono_celularPersonal_lada' => 'required_with:telefono_celularPersonal|exists:catalogos.paises,LADA',
                'telefono_celularPersonal' => 'nullable|digits_between:10,10',
                'situacionPersonalEstadoCivil_clave' => 'required|exists:catalogos.estadocivil,clave',
                'regimenMatrimonial_clave' => 'required_if:situacionPersonalEstadoCivil_clave,CAS|exists:catalogos.regimenmatrimonial,clave',
                'especifiqueRegimen' => 'required_if:regimenMatrimonial_clave,OTR|max:100',
               ];
      break;
      case "domicilio_declarante":
        return [
                'pais' => 'required|exists:catalogos.paises,ISO2',
                'entidadFederativa_clave' => 'required_if:pais,MX|required_with:municipioAlcaldia_clave,coloniaLocalidad|nullable|integer|exists:catalogos.inegi,Cve_Ent',
                'municipioAlcaldia_clave' => 'required_if:pais,MX|required_with:entidadFederativa_clave,coloniaLocalidad|nullable|integer|exists:catalogos.inegi,Cve_Mun',
                'coloniaLocalidad'        => 'required_if:pais,MX|required_with:entidadFederativa_clave,municipioAlcaldia_clave|nullable|exists:catalogos.inegi,Nom_Loc',
                'estadoProvincia'         => 'required_unless:pais,MX|max:100',
                'ciudadLocalidad'         => 'required_unless:pais,MX|max:100',
                'calle'                   => 'required|max:100',
                'numeroExterior' => 'required|alpha_num|min:1|max:6',
                'numeroInterior' => 'nullable|alpha_num|min:1|max:5',
                'codigoPostal' => 'required|min:3|max:9',
               ];
          case "datos_curriculares":
            return [];
          break;
          case "datos_empleo":
            return [];
          break;

           case "datos_pareja":
            return [
              'nombres' => 'alpha|required|max:100',
              'primerApellido' => 'alpha|required|max:100',
              'segundoApellido' => 'nullable|alpha|max:100',
             'fechaNacimiento' => 'required|date',
              'rfc' => 'nullable|size:13',
              'relacionConDeclarante' => 'required|exists:catalogos.relacioncondeclarante,valor',
              'ciudadanoExtranjero' => 'required|boolean',
              'curp' => 'required_if:ciudadanoExtranjero,0|size:18',
              'esDependienteEconomico' => 'required|boolean',
              'habitaDomicilioDeclarante' => 'required|boolean',
              'lugarDondeReside' => 'required_if:habitaDomicilioDeclarante,0|exists:catalogos.lugardondereside,valor',
              'pais' => 'required_if:lugarDondeReside,EXTRANJERO|exists:catalogos.paises,ISO2',
              'domicilioMexico_calle' => 'required_if:lugarDondeReside,MEXICO',
              'domicilioMexico_numeroExterior' => 'required_if:lugarDondeReside,MEXICO|max:100',
              'domicilioMexico_numeroInterior' => 'max:100',
              'domicilioMexico_codigoPostal' => 'required_if:lugarDondeReside,MEXICO|max:7',
              #'entidadFederativa_clave' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Cve_Ent',
              #'municipioAlcaldia_clave' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Cve_Mun',
              #'coloniaLocalidad' => 'required_if:lugarDondeReside,0|exists:catalogos.inegi,Nom_Loc',

              'domicilioExtranjero_estadoProvincia' => 'required_if:lugarDondeReside,EXTRANJERO|max:150',
              'domicilioExtranjero_ciudadLocalidad' => 'required_if:lugarDondeReside,EXTRANJERO|max:150',
              'domicilioExtranjero_calle' => 'required_if:lugarDondeReside,EXTRANJERO|max:150',
              'domicilioExtranjero_numeroExterior' => 'required_if:lugarDondeReside,EXTRANJERO|max:10',
              'domicilioExtranjero_numeroInterior' => 'nullable|max:5',
              'domicilioExtranjero_codigoPostal' => 'required_if:lugarDondeReside,EXTRANJERO|max:7',
              'actividadLaboral_clave' => 'required|exists:catalogos.actividadlaboral,clave',
              'publico_nivelOrdenGobierno' => 'required_if:actividadLaboral_clave,PUB|exists:catalogos.nivelordengobierno,valor',
              'publico_ambitoPublico' => 'required_if:actividadLaboral_clave,PUB|exists:catalogos.ambitopublico,valor',
              'publico_nombreEntePublico' => 'required_if:actividadLaboral_clave,PUB|max:100',
              'publico_areaAdscripcion' => 'required_if:actividadLaboral_clave,PUB|max:100',
              'publico_empleoCargoComision' => 'required_if:actividadLaboral_clave,PUB|max:100',
              'publico_funcionPrincipal' => 'required_if:actividadLaboral_clave,PUB|max:100',
              'publico_salarioMensualNeto_valor' => 'required_if:actividadLaboral_clave,PUB|numeric',
              'publico_salarioMensualNeto_moneda' => 'required_if:actividadLaboral_clave,PUB|exists:catalogos.tipomoneda,clave',
              'publico_fechaIngreso' => 'required_if:actividadLaboral_clave,PUB|date',
              'privado_nombreEmpresaSociedadAsociacion' => 'required_if:actividadLaboral_clave,PRI|max:100',
              'privado_empleoCargoComision' => 'required_if:actividadLaboral_clave,PRI|max:100',
              'privado_rfc' => 'nullable|size:12',
              'privado_fechaIngreso' => 'required_if:actividadLaboral_clave,PRI|date',
              'sector_clave' => 'required_if:actividadLaboral_clave,PRI|exists:catalogos.sector,clave',
              'privado_salarioMensualNeto_valor' => 'required_if:actividadLaboral_clave,PRI|numeric',
              'privado_salarioMensualNeto_moneda' => 'required_if:actividadLaboral_clave,PRI|exists:catalogos.tipomoneda,clave',
              'privado_proveedorContratistaGobierno' => 'required_if:actividadLaboral_clave,PRI|boolean',
              'aclaracionesObservaciones' => 'nullable|max:1000',
            ];
          break;

          case "prestamos_terceros":
            return [];
          break;
          case "participaciones":
            return [];
          break;
          case "decisiones":
            return [];
          break;
          case "apoyos_publicos":
            return [];
          break;
          case "clientes":
            return [];
          break;
        default:
          return [];
      }
    }

  }//rules

}
