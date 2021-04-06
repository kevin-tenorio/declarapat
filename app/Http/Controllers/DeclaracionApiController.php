<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Declaracion;

// situacionPatrimonial
use App\Models\L21_datos_generales;
use App\Models\L21_domicilio_declarante;
use App\Models\L21_datos_curriculares_datos;
use App\Models\L21_datos_empleo_datos;
use App\Models\L21_experiencia_laboral_datos;
use App\Models\L21_datos_pareja;
use App\Models\L21_dependientes_economicos_datos;
use App\Models\L21_ingresos_netos;
use App\Models\L21_actividad_anterior;

use App\Models\L21_vehiculos_datos;
use App\Models\L21_adeudos_pasivos_datos;
use App\Models\L21_prestamos_terceros_datos;

// interes
use App\Models\L21_participaciones_datos;
use App\Models\L21_decisiones_datos;
use App\Models\L21_apoyos_publicos_datos;
use App\Models\L21_representaciones_datos;
use App\Models\L21_clientes_datos;
use App\Models\L21_beneficios_privados_datos;
use App\Models\L21_fideicomisos_datos;

class DeclaracionApiController extends Controller
{
    //
    public function index(Request $request) {
        
        //dd(request()->json()->all());
        $input = request()->json()->all();
      /*  $request->validate([
            'page' => 'required|integer',
            'pageSize' => 'required|integer',
            "sort.nombres" => "required|string|in:ASC,DESC",
            "sort.primerApellido" => "required|string|in:ASC,DESC",
            "sort.segundoApellido" => "required|string|in:ASC,DESC",
            "sort.escolaridadNivel" => "required|string|in:ASC,DESC",
            "sort.datosEmpleoCargoComision.nombreEntePublico" => "required|string|in:ASC,DESC",
            "sort.datosEmpleoCargoComision.entidadFederativa" => "required|string|in:ASC,DESC",
            "sort.datosEmpleoCargoComision.municipioAlcaldia"  => "required|string|in:ASC,DESC",
            "sort.datosEmpleoCargoComision.empleoCargoComision"  => "required|string|in:ASC,DESC",
            "sort.datosEmpleoCargoComision.nivelEmpleoCargoComision" => "required|string|in:ASC,DESC",
            "sort.datosEmpleoCargoComision.nivelOrdenGobierno" => "required|string|in:ASC,DESC",
            "sort.totalIngresosNetos" => "required|string|in:ASC,DESC",
            "sort.bienesInmuebles.superficieConstruccion" => "required|string|in:ASC,DESC",
            "sort.bienesInmuebles.superficieTerreno" => "required|string|in:ASC,DESC",
            "sort.bienesInmuebles.formaAdquisicion" => "required|string|in:ASC,DESC",
            "sort.bienesInmuebles.valorAdquisicion" => "required|string|in:ASC,DESC",
            'query.id' => 'required|string',
            "query.nombres" => "required|string",
            "query.primerApellido" => "required|string",
            "query.segundoApellido" => "required|string",
            "query.escolaridadNivel" => "required|string",
            "query.datosEmpleoCargoComision.nombreEntePublico" => "required|string",
            "query.datosEmpleoCargoComision.entidadFederativa" => "required|string",
            "query.datosEmpleoCargoComision.municipioAlcaldia" => "required|string",
            "query.datosEmpleoCargoComision.empleoCargoComision" => "required|string",
            "query.datosEmpleoCargoComision.nivelOrdenGobierno" => "required|string",
            "query.datosEmpleoCargoComision.nivelEmpleoCargoComision" => "required|string",
            "query.bienesInmuebles.superficieConstruccion.min" => 'required|integer',
            "query.bienesInmuebles.superficieConstruccion.max" => 'required|integer',
            "query.bienesInmuebles.superficieTerreno.min" => 'required|integer',
            "query.bienesInmuebles.superficieTerreno.max" => 'required|integer',
            "query.bienesInmuebles.formaAdquisicion" => "CSN",
            "query.bienesInmuebles.valorAdquisicion.min" => 'required|integer',
            "query.bienesInmuebles.valorAdquisicion.max" => 'required|integer',
            "query.totalIngresosNetos.min" => 'required|integer',
            "query.totalIngresosNetos.max" => 'required|integer',
            "query.rfcSolicitante" => "required|string"
        ]);*/

        $data = array(
            "declaraciones.*",
            "L21_datos_generales.*",
            "declaraciones.id_declaracion",
            "declaracion.updated_at",
            "declaracion.tipo"
        );

        $query = Declaracion::select($data)
            ->join('L21_datos_generales', 'L21_datos_generales.id', 'declaracion.id');
        
        // Order
        if(isset($input['sort'])) {
            if(isset($input['sort']['nombres']))
                $query->orderBy('L21_datos_generales.nombres', $input['sort']['nombres']);
            if(isset($input['sort']['primerApellido']))
                $query->orderBy('L21_datos_generales.primerApellido', $input['sort']['primerApellido']);
            if(isset($input['sort']['segundoApellido']))
                $query->orderBy('L21_datos_generales.segundoApellido', $input['sort']['segundoApellido']);
            
            // Falta ordenar por escolaridad

        }
        $query = $query->get();
        $info = array();

        if(count($query) > 0) {

            foreach($query AS $q):        

                // situacionPatrimonial
                $L21_domicilio_declarante = L21_domicilio_declarante::where('declaracion_id', $q->id_declaracion)->first();
                $L21_datos_curriculares_datos = L21_datos_curriculares_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_datos_empleo_datos = L21_datos_empleo_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_experiencia_laboral_datos = L21_experiencia_laboral_datos::where('declaracion_id', $q->id_declaracion)->get();
                $L21_datos_pareja = L21_datos_pareja::where('declaracion_id', $q->id_declaracion)->first();
                $L21_dependientes_economicos_datos = L21_dependientes_economicos_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_ingresos_netos = L21_ingresos_netos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_actividad_anterior = L21_actividad_anterior::where('declaracion_id', $q->id_declaracion)->first();

                $L21_vehiculos_datos = L21_vehiculos_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_adeudos_pasivos_datos = L21_adeudos_pasivos_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_prestamos_terceros_datos = L21_prestamos_terceros_datos::where('declaracion_id', $q->id_declaracion)->first();
                
                // interes
                $L21_participaciones_datos = L21_participaciones_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_decisiones_datos = L21_decisiones_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_apoyos_publicos_datos = L21_apoyos_publicos_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_representaciones_datos = L21_representaciones_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_clientes_datos = L21_clientes_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_beneficios_privados_datos = L21_beneficios_privados_datos::where('declaracion_id', $q->id_declaracion)->first();
                $L21_fideicomisos_datos = L21_fideicomisos_datos::where('declaracion_id', $q->id_declaracion)->first();
                
                array_push($info, array(
                    "id" => $q->id_declaracion,
                    "metadata" => [
                        "actualizacion" => $q->updated_at,
                        "institucion" => "Secretaría de Educación Pública",
                        "tipo" => $q->tipo
                    ],
                    "declaracion" => [
                            'situacionPatrimonial'=> 
                            [
                                'datosGenerales' => $L21_datos_generales,
                                'domicilioDeclarante' => $L21_domicilio_declarante,
                                'datosCurricularesDeclarante' => $L21_datos_curriculares_datos,
                                'datosEmpleoCargoComision' => $L21_datos_empleo_datos,
                                'experienciaLaboral' => $L21_experiencia_laboral_datos,
                                'datosPareja' => $L21_datos_pareja,
                                'datosDependienteEconomico' => $L21_dependientes_economicos_datos,
                                'ingresos' => $L21_ingresos_netos,
                                'actividadAnualAnterior' => $L21_actividad_anterior,
                                'bienesInmuebles' => null,
                                'vehiculos' => $L21_vehiculos_datos,
                                'bienesMuebles' => null,
                                'inversiones' => null,
                                'adeudos' => $L21_adeudos_pasivos_datos,
                                'prestamoOComodato' => $L21_prestamos_terceros_datos
                            ], 
                            'interes' => [
                                'participacion' => $L21_participaciones_datos,
                                'participacionTomaDecisiones' => $L21_decisiones_datos,
                                'apoyos' => $L21_apoyos_publicos_datos,
                                'representacion' => $L21_representaciones_datos,
                                'clientesPrincipales' => $L21_clientes_datos,
                                'beneficiosPrivados' => $L21_beneficios_privados_datos,
                                'fideicomisos' => $L21_fideicomisos_datos
                            ]
                        ])
                    );

            endforeach;

            $result = array(
                "codigo" => "0",
                "mensaje" => "Consulta exitosa",
                "results" => $info
            );

        } else {

            $result = array(
                "codigo"  => "1",
                "mensaje" => "La estrutura esta vacia.",
                "results" => []
            );
        }
        return $result;
    }
  
}
