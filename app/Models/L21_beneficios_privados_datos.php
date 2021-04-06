<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;


class L21_beneficios_privados_datos extends Model
{
  use HasFactory;

  protected $table="L21_beneficios_privados_datos";

  protected $fillable = ['declaracion_id','tipoOperacion_clave','tipoOperacion_valor','tipoOperacion','tipoBeneficio_clave','tipoBeneficio_valor','especifiqueTipo','beneficiario_clave','beneficiario_valor','especifiqueBeneficiario','otorgante_tipoPersona_clave','otorgante_tipoPersona_valor','otorgante_nombreRazonSocial','otorgante_rfc','formaRecepcion_clave','formaRecepcion_valor','especifiqueBeneficio','tipoPersona','nombreRazonSocial','rfc','formaRecepcion','montoMensualAproximado_valor','montoMensualAproximado_moneda','sector_clave','sector_valor','especifiqueSector'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function setformaRecepcionAttribute($nivel)
  {
    $array = $this->catalogo->formaRecepcion($nivel);

    $this->attributes['formaRecepcion_clave'] = $array->clave;
    $this->attributes['formaRecepcion_valor'] = $array->valor;
  }


  public function settipoBeneficioAttribute($nivel)
  {
    $array = $this->catalogo->tipoBeneficio($nivel);

    $this->attributes['tipoBeneficio_clave'] = $array->clave;
    $this->attributes['tipoBeneficio_valor'] = $array->valor;
  }


  public function setbeneficiarioAttribute($clave)
  {
    $array = $this->catalogo->beneficiarios($clave);

    $this->attributes['beneficiario_clave'] = $array->clave;
    $this->attributes['beneficiario_valor'] = $array->valor;
  }


  public function setmontoMensualAproximadoValorAttribute($monto)
  {
    $this->attributes['montoMensualAproximado_valor'] = filter_var($monto, FILTER_SANITIZE_NUMBER_INT);
  }


  public function setsectorAttribute($clave)
  {
    $array = $this->catalogo->sector($clave);

    $this->attributes['sector_clave'] = $array->clave;
    $this->attributes['sector_valor'] = $array->valor;
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
        $table->id();

        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');

        $table->enum('tipoOperacion_clave', Arr::pluck($this->catalogo->tipoOperacion(),'clave'))->default(Arr::pluck($this->catalogo->tipoOperacion(),'clave')[0]);
        $table->enum('tipoOperacion_valor', Arr::pluck($this->catalogo->tipoOperacion(),'valor'))->default(Arr::pluck($this->catalogo->tipoOperacion(),'valor')[0]);
        $table->string('tipoOperacion',100)->nullable()->default(null);

        $table->enum('tipoBeneficio_clave',Arr::pluck($this->catalogo->tipoBeneficio(),'clave'))->default(Arr::pluck($this->catalogo->tipoBeneficio(),'clave')[0]);
        $table->enum('tipoBeneficio_valor',Arr::pluck($this->catalogo->tipoBeneficio(),'valor'))->default(Arr::pluck($this->catalogo->tipoBeneficio(),'valor')[0]);
        $table->string('especifiqueTipo',100)->nullable()->default(null);

        $table->enum('beneficiario_clave',Arr::pluck($this->catalogo->beneficiarios(),'clave'))->default(Arr::pluck($this->catalogo->beneficiarios(),'clave')[0]);;
        $table->enum('beneficiario_valor',Arr::pluck($this->catalogo->beneficiarios(),'valor'))->default(Arr::pluck($this->catalogo->beneficiarios(),'valor')[0]);
        $table->string('especifiqueBeneficiario',100)->nullable()->default(null);

        $table->enum('otorgante_tipoPersona_clave',Arr::pluck($this->catalogo->tipoPersona(),'clave'))->default(Arr::pluck($this->catalogo->tipoPersona(),'clave')[0]);
        $table->enum('otorgante_tipoPersona_valor',Arr::pluck($this->catalogo->tipoPersona(),'valor'))->default(Arr::pluck($this->catalogo->tipoPersona(),'valor')[0]);
        $table->string('otorgante_nombreRazonSocial',100)->nullable()->default(null);
        $table->string('otorgante_rfc',100)->nullable()->default(null);
        $table->enum('formaRecepcion_clave',Arr::pluck($this->catalogo->formaRecepcion(),'clave'))->default(Arr::pluck($this->catalogo->formaRecepcion(),'clave')[1]);
        $table->enum('formaRecepcion_valor',Arr::pluck($this->catalogo->formaRecepcion(),'valor'))->default(Arr::pluck($this->catalogo->formaRecepcion(),'valor')[1]);
        $table->string('especifiqueBeneficio',100)->nullable()->default(null);

        $table->string('tipoPersona',13)->nullable()->default(null);
        $table->string('nombreRazonSocial',13)->nullable()->default(null);
        $table->string('rfc',13)->nullable()->default(null);
        $table->string('formaRecepcion',13)->nullable()->default(null);

        $table->float('montoMensualAproximado_valor',20)->default(null);
        $table->string('montoMensualAproximado_moneda',3)->default('MXN');

        $table->enum('sector_clave',Arr::pluck($this->catalogo->sector(),'clave'))->default(Arr::pluck($this->catalogo->sector(),'clave')[0]);
        $table->enum('sector_valor',Arr::pluck($this->catalogo->sector(),'valor'))->default(Arr::pluck($this->catalogo->sector(),'valor')[0]);
        $table->string('especifiqueSector',100)->nullable()->default(null);


        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
