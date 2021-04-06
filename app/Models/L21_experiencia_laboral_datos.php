<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_experiencia_laboral_datos extends Model
{
  use HasFactory;

  protected $table="L21_experiencia_laboral_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','ambitoSector_clave','especifiqueAmbito','nivelOrdenGobierno','ambitoPublico ','nombreEntePublico','areaAdscripcion','empleoCargoComision','funcionPrincipal','fechaIngreso','fechaEgreso','pais','nombreEmpresaSociedadAsociacion','rfc','area','puesto','sector','especifiqueSector'];

  protected $nullable = [];

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
        $table->enum('tipoOperacion',["AGREGAR","MODIFICAR","SIN CAMBIO","BAJA"])->default("AGREGAR");
        $table->string('ambitoSector_clave')->nullable()->default(null);
        $table->string('ambitoSector_valor')->nullable()->default(null);
        $table->string('especifiqueAmbito')->nullable()->default(null);
        $table->enum('nivelOrdenGobierno',["FEDERAL", "ESTATAL", "MUNICIPAL/ALCALDÍA"])->default("MUNICIPAL/ALCALDÍA");
        $table->enum('ambitoPublico',["EJECUTIVO", "LEGISLATIVO", "JUDICIAL", "ÓRGANO AUTÓNOMO"])->default("ÓRGANO AUTÓNOMO");
        $table->string('nombreEntePublico')->nullable()->default(null);
        $table->string('areaAdscripcion')->nullable()->default(null);
        $table->string('empleoCargoComision')->nullable()->default(null);
        $table->string('funcionPrincipal')->nullable()->default(null);
        $table->date('fechaIngreso')->nullable()->default(null);
        $table->date('fechaEgreso')->nullable()->default(null);
        $table->enum('ubicacion',["MX", "EX"])->default("MX");
        $table->string('nombreEmpresaSociedadAsociacion')->nullable()->default(null);
        $table->string('rfc')->nullable()->default(null);
        $table->string('area')->nullable()->default(null);
        $table->string('puesto')->nullable()->default(null);
        $table->enum('sector_clave',["AGRI","MIN","EELECT","CONS","INDMANU","CMAYOR","CMENOR","TRANS","MEDIOM","SERVFIN","SERVINM","SERVPROF","SERVCORP","SERVS","SERVESPAR","SERVALOJ","OTRO"])->default("AGRI");
        $table->string('sector_valor')->nullable()->default(null);
        $table->string('especifiqueSector')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
