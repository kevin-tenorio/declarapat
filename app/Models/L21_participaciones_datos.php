<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_participaciones_datos extends Model
{
  use HasFactory;

  protected $table="L21_participaciones_datos";

  protected $fillable = ['declaracion_id','tipoRelacion','nombreEmpresaSociedadAsociacion','rfc','porcentajeParticipacion','tipoParticipacion_clave','tipoParticipacion_valor','recibeRemuneracion','montoMensual_valor','montoMensual_moneda','pais','entidadFederativa_clave','entidadFederativa_valor','sector_clave','sector_valor'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

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

        $table->enum('tipoOperacion',['AGREGAR','MODIFICAR','SIN CAMBIO','BAJA'])->default('AGREGAR');
        $table->enum('tipoRelacion',["DECLARANTE","PAREJA","DEPENDIENTE ECONOMICO"])->default('DECLARANTE');
        $table->string('nombreEmpresaSociedadAsociacion',100)->nullable()->default(null);
        $table->string('rfc',13)->nullable()->default(null);
        $table->integer('porcentajeParticipacion')->unsigned()->default(null);

        $table->string('tipoParticipacion_clave')->nullable()->default(null);
        $table->string('tipoParticipacion_valor')->nullable()->default(null);

        $table->boolean('recibeRemuneracion')->default(false);

        $table->float('montoMensual_valor',20)->unsigned()->default(null);
        $table->string('montoMensual_moneda',3)->default(null);

        $table->string('pais',2)->nullable()->default(null);
        $table->string('entidadFederativa_clave',3)->nullable()->default(null);
        $table->string('entidadFederativa_valor',3)->nullable()->default(null);

        $table->enum('sector',["AGRI","MIN","EELECT","CONS","INDMANU","CMAYOR","CMENOR","TRANS","MEDIOM","SERVFIN","SERVINM","SERVPROF","SERVCORP","SERVS","SERVESPAR","SERVALOJ","OTRO"])->default('OTRO');

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
