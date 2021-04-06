<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_prestamos_terceros_datos extends Model
{
  use HasFactory;

  protected $table="L21_prestamos_terceros_datos";

  protected $fillable = ['declaracion_id','tipoInmueble_clave','especifiqueOtro','pais','entidadFederativa_clave','municipioAlcaldia_clave','coloniaLocalidad','ciudadLocalidad','estadoProvincia','calle','numeroExterior','numeroInterior','codigoPostal','tipo_clave','marca','modelo','anio','numeroSerieRegistro','lugarRegistro_pais','lugarRegistro_entidadFederativa_clave','tipoDuenoTitular','nombreTitular','rfc','relacionConTitular'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function settipoInmuebleClaveAttribute($clave)
  {
    if(!is_null($clave))
    {
      $array = $this->catalogo->tipoInmueble($clave);

      $this->attributes['tipoInmueble_clave'] = $array->clave;
      $this->attributes['tipoInmueble_valor'] = $array->valor;
    }
  }

  public function settipoClaveAttribute($clave)
  {
    if(!is_null($clave))
    {
      $array = $this->catalogo->tipoVehiculo($clave);

      $this->attributes['tipo_clave'] = $array->clave;
      $this->attributes['tipo_valor'] = $array->valor;
    }
  }

  public function setpaisAttribute($clave)
  {
    $array = $this->catalogo->paises($clave);

    $this->attributes['pais'] = $array->ISO2;
    $this->attributes['pais_valor'] = $array->ESPANOL;
  }

  public function setlugarRegistroPaisAttribute($clave)
  {
    $array = $this->catalogo->paises($clave);

    $this->attributes['lugarRegistro_pais'] = $array->ISO2;
    $this->attributes['lugarRegistro_pais_valor'] = $array->ESPANOL;
  }

  public function setentidadFederativaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiEntidades($clave);

    $this->attributes['lugarRegistro_entidadFederativa_clave'] = $array->Cve_Ent;
    $this->attributes['lugarRegistro_entidadFederativa_valor'] = $array->Nom_Ent;
  }

  public function setlugarRegistroEntidadFederativaClaveAttribute($clave)
  {
    $array = $this->catalogo->inegiEntidades($clave);

    $this->attributes['entidadFederativa_clave'] = $array->Cve_Ent;
    $this->attributes['entidadFederativa_valor'] = $array->Nom_Ent;
  }

  public function setmunicipioAlcaldiaClaveAttribute($clave)
  {
    if(!is_null($clave))
    {
      $array = $this->catalogo->inegiAlcaldias($this->entidadFederativa_clave,$clave);

      $this->attributes['municipioAlcaldia_clave'] = $array->Cve_Mun;
      $this->attributes['municipioAlcaldia_valor'] = $array->Nom_Mun;
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
        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->string('tipoOperacion',10)->default('AGREGAR');

        $table->string('tipoInmueble_clave',6)->nullable()->default(null);
        $table->string('tipoInmueble_valor')->nullable()->default(null);

        $table->string('especifiqueOtro')->nullable()->default(null);

        $table->string('pais',2)->nullable()->default(null);
        $table->string('pais_valor')->nullable()->default(null);

        $table->string('entidadFederativa_clave',2)->nullable()->default(null);
        $table->string('entidadFederativa_valor')->nullable()->default(null);

        $table->string('municipioAlcaldia_clave',4)->nullable()->default(null);
        $table->string('municipioAlcaldia_valor')->nullable()->default(null);

        $table->string('calle')->nullable()->default(null);
        $table->string('numeroExterior',5)->nullable()->default(null);
        $table->string('numeroInterior',5)->nullable()->default(null);
        $table->string('coloniaLocalidad')->nullable()->default(null);

        $table->string('codigoPostal',7)->nullable()->default(null);
        $table->string('ciudadLocalidad')->nullable()->default(null);
        $table->string('estadoProvincia')->nullable()->default(null);

        $table->string('tipo_clave',7)->nullable()->default(null);
        $table->string('tipo_valor')->nullable()->default(null);
        $table->string('marca',50)->nullable()->default(null);
        $table->string('modelo',50)->nullable()->default(null);
        $table->string('anio',4)->nullable()->default(null);
        $table->string('numeroSerieRegistro',50)->nullable()->default(null);
        $table->string('lugarRegistro_pais',2)->nullable()->default(null);
        $table->string('lugarRegistro_pais_valor')->nullable()->default(null);
        $table->string('lugarRegistro_entidadFederativa_clave',2)->nullable()->default(null);
        $table->string('lugarRegistro_entidadFederativa_valor')->nullable()->default(null);

        $table->string('tipoDuenoTitular')->nullable()->default(null);
        $table->string('nombreTitular')->nullable()->default(null);
        $table->string('rfc',13)->nullable()->default(null);
        $table->string('relacionConTitular',50)->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
