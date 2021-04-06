<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_ingresos_netos extends Model
{
  use HasFactory;

  protected $table="L21_ingresos_netos";

  protected $fillable = ['declaracion_id','remuneracionMensualCargoPublico_valor','remuneracionMensualCargoPublico_moneda','remuneracionAnualCargoPublico_valor','remuneracionAnualCargoPublico_moneda','remuneracionConclusionCargoPublicoo_valor','remuneracionConclusionCargoPublico_moneda','otrosIngresosMensualesTotal_valor','otrosIngresosMensualesTotal_moneda','otrosIngresosAnualesTotal_valor','otrosIngresosAnualesTotal_moneda','otrosIngresosTotal_valor','otrosIngresosTotal_moneda','actividadIndustial_remuneracionTotal_valor','actividadIndustial_remuneracionTotal_moneda','actividadIndustial_actividades_remuneracion_valor','actividadIndustial_actividades_remuneracion_moneda','nombreRazonSocial','tipoNegocio','actividadFinanciera_remuneracionTotal_valor','actividadFinanciera_remuneracionTotal_moneda','actividadFinanciera_actividades_remuneracion_valor','actividadFinanciera_actividades_remuneracion_moneda','tipoInstrumento_clave','tipoInstrumento_valor','serviciosProfesionales_remuneracionTotal_valor','serviciosProfesionales_remuneracionTotal_moneda','serviciosProfesionales_servicios_remuneracion_valor','serviciosProfesionales_servicios_remuneracion_moneda','tipoServicio','enajenacionBienes_remuneracionTotal_valor','enajenacionBienes_remuneracionTotal_moneda','enajenacionBienes_bienes_remuneracion_valor','enajenacionBienes_bienes_remuneracion_moneda','tipoBienEnajenado','otrosIngresos_remuneracionTotal_valor','otrosIngresos_remuneracionTotal_moneda','otrosIngresos_ingresos_remuneracion_valor','otrosIngresos_ingresos_remuneracion_moneda','tipoingreso','ingresoMensualNetoDeclarante_valor','ingresoMensualNetoDeclarante_moneda','ingresoAnualNetoDeclarante_valor','ingresoAnualNetoDeclarante_moneda','ingresoConclusionNetoDeclarante_valor','ingresoConclusionNetoDeclarante_moneda','ingresoMensualNetoParejaDependiente_valor','ingresoMensualNetoParejaDependiente_moneda','ingresoAnualNetoParejaDependiente_valor','ingresoAnualNetoParejaDependiente_moneda','ingresoConclusionNetoParejaDependiente_valor','ingresoConclusionNetoParejaDependiente_moneda','totalIngresosMensualesNetos_valor','totalIngresosMensualesNetos_moneda','totalIngresosAnualesNetos_valor','totalIngresosAnualesNetos_moneda','totalIngresosConclusionNetos_valor','totalIngresosConclusionNetos_moneda','aclaracionesObservaciones'];

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

        $table->integer('remuneracionMensualCargoPublico_valor')->nullable()->default(null);
        $table->string('remuneracionMensualCargoPublico_moneda')->nullable()->default(null);

        $table->integer('remuneracionAnualCargoPublico_valor')->nullable()->default(null);
        $table->string('remuneracionAnualCargoPublico_moneda')->nullable()->default(null);

        $table->integer('remuneracionConclusionCargoPublicoo_valor')->nullable()->default(null);
        $table->string('remuneracionConclusionCargoPublico_moneda')->nullable()->default(null);




        $table->integer('otrosIngresosMensualesTotal_valor')->nullable()->default(null);
        $table->string('otrosIngresosMensualesTotal_moneda')->nullable()->default(null);

        $table->integer('otrosIngresosAnualesTotal_valor')->nullable()->default(null);
        $table->string('otrosIngresosAnualesTotal_moneda')->nullable()->default(null);

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
        $table->integer('enajenacionBienes_remuneracionTotal_moneda')->nullable()->default(null);

        $table->integer('enajenacionBienes_bienes_remuneracion_valor')->nullable()->default(null);
        $table->integer('enajenacionBienes_bienes_remuneracion_moneda')->nullable()->default(null);
        $table->integer('tipoBienEnajenado')->nullable()->default(null);





        $table->integer('otrosIngresos_remuneracionTotal_valor')->nullable()->default(null);
        $table->string('otrosIngresos_remuneracionTotal_moneda')->nullable()->default(null);

        $table->integer('otrosIngresos_ingresos_remuneracion_valor')->nullable()->default(null);
        $table->string('otrosIngresos_ingresos_remuneracion_moneda')->nullable()->default(null);
        $table->string('tipoingreso')->nullable()->default(null);




        $table->integer('ingresoMensualNetoDeclarante_valor')->nullable()->default(null);
        $table->string('ingresoMensualNetoDeclarante_moneda')->nullable()->default(null);

        $table->integer('ingresoAnualNetoDeclarante_valor')->nullable()->default(null);
        $table->string('ingresoAnualNetoDeclarante_moneda')->nullable()->default(null);

        $table->integer('ingresoConclusionNetoDeclarante_valor')->nullable()->default(null);
        $table->string('ingresoConclusionNetoDeclarante_moneda')->nullable()->default(null);




        $table->integer('ingresoMensualNetoParejaDependiente_valor')->nullable()->default(null);
        $table->string('ingresoMensualNetoParejaDependiente_moneda')->nullable()->default(null);

        $table->integer('ingresoAnualNetoParejaDependiente_valor')->nullable()->default(null);
        $table->string('ingresoAnualNetoParejaDependiente_moneda')->nullable()->default(null);

        $table->integer('ingresoConclusionNetoParejaDependiente_valor')->nullable()->default(null);
        $table->string('ingresoConclusionNetoParejaDependiente_moneda')->nullable()->default(null);





        $table->integer('totalIngresosMensualesNetos_valor')->nullable()->default(null);
        $table->string('totalIngresosMensualesNetos_moneda')->nullable()->default(null);

        $table->integer('totalIngresosAnualesNetos_valor')->nullable()->default(null);
        $table->string('totalIngresosAnualesNetos_moneda')->nullable()->default(null);

        $table->integer('totalIngresosConclusionNetos_valor')->nullable()->default(null);
        $table->string('totalIngresosConclusionNetos_moneda')->nullable()->default(null);



        $table->mediumText('aclaracionesObservaciones')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
