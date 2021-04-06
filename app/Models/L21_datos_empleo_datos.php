<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_datos_empleo_datos  extends Model
{
  use HasFactory;

  protected $table="L21_datos_empleo_datos";

  protected $fillable = ['declaracion_id,','nombreEntePublico','nivelOrdenGobierno','ambitoPublico','areaAdscripción','empleoCargoComision','nivelEmpleoCargoComision','funcionPrincipal','fechaTomaPosesion','contratadoPorHonorarios','telefono','extension','cuentaConOtroCargoPublico'];

  protected $nullable = [];

  public $timestamps=false;

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
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->string('tipoOperacion')->default("AGREGAR");
        $table->string('nombreEntePublico')->nullable()->default(null);
        $table->string('nivelOrdenGobierno')->nullable()->default(null);
        $table->string('ambitoPublico')->nullable()->default(null);
        $table->string('areaAdscripcion')->nullable()->default(null);
        $table->string('empleoCargoComision')->nullable()->default(null);
        $table->string('nivelEmpleoCargoComision')->nullable()->default(null);
        $table->string('funcionPrincipal')->nullable()->default(null);
        $table->string('fechaTomaPosesion')->nullable()->default(null);
        $table->string('contratadoPorHonorarios')->nullable()->default(null);
        $table->string('telefonoOficina_telefono',10)->nullable()->default(null);
        $table->string('telefonoOficina_extension',5)->nullable()->default(null);

        $table->string('pais',2)->nullable()->default(null);
        $table->string('entidadFederativa_clave',2)->nullable()->default(null);
        $table->string('entidadFederativa_valor')->nullable()->default(null);
        $table->string('municipioAlcaldia_clave',4)->nullable()->default(null);
        $table->string('municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('coloniaLocalidad')->nullable()->default(null);
        $table->string('estadoProvincia')->nullable()->default(null);
        $table->string('ciudadLocalidad')->nullable()->default(null);
        $table->string('calle')->nullable()->default(null);
        $table->string('numeroExterior',6)->nullable()->default(null);
        $table->string('numeroInterior',6)->nullable()->default(null);
        $table->string('codigoPostal',6)->nullable()->default(null);

        $table->boolean('cuentaConOtroCargoPublico')->default(false);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
