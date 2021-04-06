<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;




class L21_actividad_anterior extends Model
{
  use HasFactory;

  protected $table="L21_actividad_anterior";

  protected $fillable = ['declaracion_id','fechaInicio','fechaIngreso','fechaConclusion','remuneracionNetaCargoPublico_valor','remuneracionNetaCargoPublico_moneda','otrosIngresosMensualesTotal_valor','otrosIngresosMensualesTotal_moneda','otrosIngresosTotal_valor','otrosIngresosTotal_moneda','actividadIndustial_remuneracionTotal_valor','actividadIndustial_remuneracionTotal_moneda','actividadIndustial_actividades_remuneracion_valor','actividadIndustial_actividades_remuneracion_moneda','nombreRazonSocial','tipoNegocio','actividadFinanciera_remuneracionTotal_valor','actividadFinanciera_remuneracionTotal_moneda','actividadFinanciera_actividades_remuneracion_valor','actividadFinanciera_actividades_remuneracion_moneda','tipoInstrumento_clave','tipoInstrumento_valor','serviciosProfesionales_remuneracionTotal_valor','serviciosProfesionales_remuneracionTotal_moneda','serviciosProfesionales_servicios_remuneracion_valor','serviciosProfesionales_servicios_remuneracion_moneda','enajenacionBienes_remuneracionTotal_valor','enajenacionBienes_remuneracionTotal_moneda','enajenacionBienes_bienes_remuneracion_valor','enajenacionBienes_bienes_remuneracion_moneda','tipoBienEnajenado_clave','tipoBienEnajenado_valor','otrosIngresos_remuneracionTotal_valor','otrosIngresos_remuneracionTotal_moneda','tipoingreso','ingresoNetoAnualDeclarante_valor','ingresoNetoAnualDeclarante_moneda','ingresoNetoAnualParejaDependiente_valor','ingresoNetoAnualParejaDependiente_moneda','totalIngresosNetosAnuales_valor','totalIngresosNetosAnuales_moneda','aclaracionesObservaciones'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// GETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function getcatalogoAttribute(){

    $catalogo = new catalogo;

    return $catalogo;
  }

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// CREO TABLA
  /////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
    {
      \Schema::create($this->table, function(Blueprint $table)
      {
        $table->integer('declaracion_id')->unsigned()->unique();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->boolean('servidorPublicoAnioAnterior')->default(0);
        $table->date('fechaInicio')->nullable()->default(null);
        $table->date('fechaIngreso')->nullable()->default(null);
        $table->date('fechaConclusion')->nullable()->default(null);

        $table->integer('remuneracionNetaCargoPublico_valor')->nullable()->default(null);
        $table->string('remuneracionNetaCargoPublico_moneda')->nullable()->default(null);

        $table->integer('otrosIngresosMensualesTotal_valor')->nullable()->default(null);
        $table->string('otrosIngresosMensualesTotal_moneda')->nullable()->default(null);

        $table->integer('otrosIngresosTotal_valor')->nullable()->default(null);
        $table->string('otrosIngresosTotal_moneda')->nullable()->default(null);

        $table->integer('actividadIndustial_remuneracionTotal_valor')->nullable()->default(null);
        $table->string('actividadIndustial_remuneracionTotal_moneda')->nullable()->default(null);

        $table->integer('actividadIndustial_actividades_remuneracion_valor')->nullable()->default(null);
        $table->string('actividadIndustial_actividades_remuneracion_moneda')->nullable()->default(null);
        $table->string('nombreRazonSocial')->nullable()->default(null);
        $table->string('tipoNegocio')->nullable()->default(null);


        $table->integer('actividadFinanciera_remuneracionTotal_valor')->nullable()->default(null);
        $table->string('actividadFinanciera_remuneracionTotal_moneda')->nullable()->default(null);

        $table->integer('actividadFinanciera_actividades_remuneracion_valor')->nullable()->default(null);
        $table->string('actividadFinanciera_actividades_remuneracion_moneda')->nullable()->default(null);

        $table->enum('tipoInstrumento_clave',["CAP", "FIN", "OPR", "SSI", "VBU", "BON", "OTRO"])->default("CAP");
        $table->string('tipoInstrumento_valor')->nullable()->default(null);

        $table->integer('serviciosProfesionales_remuneracionTotal_valor')->nullable()->default(null);
        $table->string('serviciosProfesionales_remuneracionTotal_moneda')->nullable()->default(null);

        $table->integer('serviciosProfesionales_servicios_remuneracion_valor')->nullable()->default(null);
        $table->string('serviciosProfesionales_servicios_remuneracion_moneda')->nullable()->default(null);
        $table->string('tipoServicio')->nullable()->default(null);

        $table->integer('enajenacionBienes_remuneracionTotal_valor')->nullable()->default(null);
        $table->string('enajenacionBienes_remuneracionTotal_moneda')->nullable()->default(null);

        $table->integer('enajenacionBienes_bienes_remuneracion_valor')->nullable()->default(null);
        $table->string('enajenacionBienes_bienes_remuneracion_moneda')->nullable()->default(null);

        $table->string('tipoBienEnajenado_clave')->nullable()->default(null);
        $table->string('tipoBienEnajenado_valor')->nullable()->default(null);

        $table->integer('otrosIngresos_remuneracionTotal_valor')->nullable()->default(null);
        $table->string('otrosIngresos_remuneracionTotal_moneda')->nullable()->default(null);

        $table->integer('otrosIngresos_ingresos_remuneracion_valor')->nullable()->default(null);
        $table->string('otrosIngresos_ingresos_remuneracion_moneda')->nullable()->default(null);
        $table->string('tipoingreso')->nullable()->default(null);

        $table->integer('ingresoNetoAnualDeclarante_valor')->nullable()->default(null);
        $table->string('ingresoNetoAnualDeclarante_moneda')->nullable()->default(null);

        $table->integer('ingresoNetoAnualParejaDependiente_valor')->nullable()->default(null);
        $table->string('ingresoNetoAnualParejaDependiente_moneda')->nullable()->default(null);

        $table->integer('totalIngresosNetosAnuales_valor')->nullable()->default(null);
        $table->string('totalIngresosNetosAnuales_moneda')->nullable()->default(null);


        $table->mediumText('aclaracionesObservaciones')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
