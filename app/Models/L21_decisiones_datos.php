<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_decisiones_datos extends Model
{
  use HasFactory;

  protected $table="L21_decisiones_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','tipoRelacion','tipoInstitucion_clave','tipoInstitucion_valor','nombreInstitucion','rfc','puestoRol','fechaInicioParticipacion','recibeRemuneracion','montoMensual_valor','montoMensual_moneda','entidadFederativa_clave','entidadFederativa_valor','pais'];

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

        $table->enum('tipoInstitucion_clave',["OSC","OB","PP","GS","OTRO"])->default('OTRO');
        $table->string('tipoInstitucion_valor',100)->nullable()->default(null);

        $table->string('nombreInstitucion',100)->nullable()->default(null);
        $table->string('rfc',12)->nullable()->default(null);
        $table->string('puestoRol',100)->nullable()->default(null);
        $table->date('fechaInicioParticipacion','Y-m-d')->default(null);
        $table->boolean('recibeRemuneracion')->default(false);

        $table->float('montoMensual_valor',20)->unsigned()->default(null);
        $table->string('montoMensual_moneda',3)->default('MXN');

        $table->string('entidadFederativa_clave',3)->nullable()->default(null);
        $table->string('entidadFederativa_valor',3)->nullable()->default(null);

        $table->string('pais',2)->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
