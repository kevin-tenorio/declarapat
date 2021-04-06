<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;


class L21_datos_generales extends Model
{
  use HasFactory;

  protected $table = "L21_datos_generales";

  protected $fillable = ['declaracion_id','nombres','primerApellido','segundoApellido','curp','rfc_rfc','rfc_homoClave','correoElectronico_personal','correoElectronico_institucional','telefono_casa','telefono_casa_lada','telefono_celularPersonal','telefono_celularPersonal_lada','situacionPersonalEstadoCivil_clave','regimenMatrimonial_clave','especifiqueRegimen','paisNacimiento','nacionalidad','aclaracionesObservaciones'];

  protected $nullable = [];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setsituacionPersonalEstadoCivilClaveAttribute($clave)
  {
    $array = $this->catalogo->estadoCivil($clave);

    $this->attributes['situacionPersonalEstadoCivil_clave'] = $array->clave;
    $this->attributes['situacionPersonalEstadoCivil_valor'] = $array->valor;
  }

  public function setregimenMatrimonialClaveAttribute($clave)
  {
    if($this->situacionPersonalEstadoCivil_clave == "CAS")
    {
      $array = $this->catalogo->regimenMatrimonial($clave);

      $this->attributes['regimenMatrimonial_clave'] = $array->clave;
      $this->attributes['regimenMatrimonial_valor'] = $array->valor;
    }
    else
    {
      $this->attributes['regimenMatrimonial_clave'] = null;
      $this->attributes['regimenMatrimonial_valor'] = null;
      $this->attributes['especifiqueRegimen'] = null;
    }
  }

  public function setespecifiqueRegimenAttribute($valor)
  {
    if($this->regimenMatrimonial_clave == "OTR")
    {
      $this->attributes['especifiqueRegimen'] = $valor;
    }
    else
    {
      $this->attributes['especifiqueRegimen'] = null;
    }
  }

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

        $table->string('nombres')->nullable()->default(null);
        $table->string('primerApellido')->nullable()->default(null);
        $table->string('segundoApellido')->nullable()->default(null);
        $table->string('curp',18)->nullable()->default(null);
        $table->string('rfc_rfc',10)->nullable()->default(null);
        $table->string('rfc_homoClave',3)->nullable()->default(null);
        $table->string('correoElectronico_institucional',75)->nullable()->default(null);
        $table->string('correoElectronico_personal',75)->nullable()->default(null);
        $table->string('telefono_casa_lada',5)->nullable()->default(null);
        $table->string('telefono_casa',10)->nullable()->default(null);
        $table->string('telefono_celularPersonal_lada',5)->nullable()->default(null);
        $table->string('telefono_celularPersonal',10)->nullable()->default(null);

        $table->string('situacionPersonalEstadoCivil_clave')->nullable()->default(null);
        $table->string('situacionPersonalEstadoCivil_valor')->nullable()->default(null);

        $table->string('regimenMatrimonial_clave')->nullable()->default(null);
        $table->string('regimenMatrimonial_valor')->nullable()->default(null);
        $table->string('especifiqueRegimen')->nullable()->default(null);

        $table->string('paisNacimiento',2)->nullable()->default($this->catalogo->paises('default')->ISO2);
        $table->string('nacionalidad',2)->nullable()->default($this->catalogo->paises('default')->ISO2);

        $table->string('aclaracionesObservaciones')->nullable()->default(null);
				$table->engine = 'InnoDB';
			});
		}//if schema table usuarios exist
  }

}
