<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_datos_curriculares_datos extends Model
{
  use HasFactory;

  protected $table = "L21_datos_curriculares_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','nivel_clave','institucionEducativa_nombre','institucionEducativa_ubicacion','carreraAreaConocimiento','estatus','documentoObtenido','fechaObtencion'];

  protected $nullable = [];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setnivelClaveAttribute($nivel)
  {
    $array = $this->catalogo->nivel($nivel);

    $this->attributes['nivel_clave'] = $array->clave;
    $this->attributes['nivel_valor'] = $array->valor;
  }

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// GETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function getcatalogoAttribute($catalogo){

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
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->string('tipoOperacion')->nullable()->default(null);
        $table->string('nivel_clave',3)->nullable()->default(null);
        $table->string('nivel_valor')->nullable()->default(null);
        $table->string('institucionEducativa_nombre')->nullable()->default(null);
        $table->string('institucionEducativa_ubicacion')->nullable()->default(null);
        $table->string('carreraAreaConocimiento',50)->nullable()->default(null);
        $table->string('estatus')->nullable()->default(null);
        $table->string('documentoObtenido',50)->nullable()->default(null);
        $table->date('fechaObtencion')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
