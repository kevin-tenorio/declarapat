<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;


class L21_domicilio_declarante extends Model
{
    use HasFactory;

    protected $table="L21_domicilio_declarante";

    protected $fillable = ['declaracion_id','pais','entidadFederativa_clave','municipioAlcaldia_clave','coloniaLocalidad','estadoProvincia','ciudadLocalidad','calle','numeroExterior','numeroInterior','codigoPostal','aclaracionesObservaciones'];

    protected $nullable = [];

    public $timestamps = false;

    /////////////////////////////////////////////////////////////////////////////////
  	/////////////////////// SETTERS
  	/////////////////////////////////////////////////////////////////////////////////
    public function setentidadFederativaClaveAttribute($clave)
    {
      $array = $this->catalogo->inegiEntidades($clave);

      $this->attributes['entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['entidadFederativa_valor'] = $array->Nom_Ent;
    }

    public function setmunicipioAlcaldiaClaveAttribute($clave)
    {
      $array = $this->catalogo->inegiAlcaldias($this->entidadFederativa_clave,$clave);

      $this->attributes['municipioAlcaldia_clave'] = $array->Cve_Mun;
      $this->attributes['municipioAlcaldia_valor'] = $array->Nom_Mun;
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
          $table->string('codigoPostal',13)->nullable()->default(null);
          $table->mediumText('aclaracionesObservaciones')->nullable()->default(null);
          $table->engine = 'InnoDB';
        });
      }//if schema table usuarios exist
    }


}
