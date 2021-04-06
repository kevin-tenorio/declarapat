<?php namespace App\Models;


class Instalar
{

  public static function bd()
  {

    $modelo = new User;
    $modelo->tabla();

    if(User::where('rfc','=','MODO-DIOS')->count() < 1)
    {
      $administrador = new User;

      $administrador->rfc        = "MODO-DIOS";
      $administrador->homoclave  = "451";
      $administrador->rol        = "administrador";
      $administrador->nombre     = "Superadministrador";
      $administrador->password   = "Foucault99.-";
      $administrador->save();
    }

    $modelo = new Declaracion;
    $modelo->tabla();

    $modelo = new declaracion_formato;
    $modelo->tabla();

    $modelo = new L21_datos_generales;
    $modelo->tabla();

    $modelo = new L21_domicilio_declarante;
    $modelo->tabla();

    $modelo = new L21_datos_curriculares;
    $modelo->tabla();

    $modelo = new L21_datos_curriculares_datos;
    $modelo->tabla();

    $modelo = new L21_datos_empleo;
    $modelo->tabla();

    $modelo = new L21_datos_empleo_datos;
    $modelo->tabla();

    $modelo = new L21_experiencia_laboral;
    $modelo->tabla();

    $modelo = new L21_experiencia_laboral_datos;
    $modelo->tabla();

    $modelo = new L21_datos_pareja;
    $modelo->tabla();

    $modelo = new L21_dependientes_economicos;
    $modelo->tabla();

    $modelo = new L21_dependientes_economicos_datos;
    $modelo->tabla();

    $modelo = new L21_ingresos_netos;
    $modelo->tabla();

    $modelo = new L21_actividad_anterior;
    $modelo->tabla();

    $modelo = new L21_bienes_inmuebles;
    $modelo->tabla();

    $modelo = new L21_vehiculos;
    $modelo->tabla();

    $modelo = new L21_vehiculos_datos;
    $modelo->tabla();

    $modelo = new L21_bienes_muebles;
    $modelo->tabla();

    $modelo = new L21_cuentas_bancarias;
    $modelo->tabla();

    $modelo = new L21_cuentas_bancarias_datos;
    $modelo->tabla();

    $modelo = new L21_adeudos_pasivos;
    $modelo->tabla();

    $modelo = new L21_adeudos_pasivos_datos;
    $modelo->tabla();

    $modelo = new L21_adeudos_pasivos_datos;
    $modelo->tabla();

    $modelo = new L21_prestamos_terceros;
    $modelo->tabla();

    $modelo = new L21_prestamos_terceros_datos;
    $modelo->tabla();

    $modelo = new L21_participaciones;
    $modelo->tabla();

    $modelo = new L21_participaciones_datos;
    $modelo->tabla();

    $modelo = new L21_decisiones;
    $modelo->tabla();

    $modelo = new L21_decisiones_datos;
    $modelo->tabla();

    $modelo = new L21_apoyos_publicos;
    $modelo->tabla();

    $modelo = new L21_apoyos_publicos_datos;
    $modelo->tabla();

    $modelo = new L21_representaciones;
    $modelo->tabla();

    $modelo = new L21_representaciones_datos;
    $modelo->tabla();

    $modelo = new L21_clientes;
    $modelo->tabla();

    $modelo = new L21_clientes_datos;
    $modelo->tabla();

    $modelo = new L21_beneficios_privados;
    $modelo->tabla();

    $modelo = new L21_beneficios_privados_datos;
    $modelo->tabla();

    $modelo = new L21_fideicomisos;
    $modelo->tabla();

    $modelo = new L21_fideicomisos_datos;
    $modelo->tabla();
  }

}
