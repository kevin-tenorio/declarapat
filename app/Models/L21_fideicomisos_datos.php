<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;


class L21_fideicomisos_datos extends Model
{
  use HasFactory;

  protected $table="L21_fideicomisos_datos";

  protected $fillable = ['declaracion_id','tipoOperacion_clave','tipoOperacion_valor','rfcFideicomiso','tipoFideicomiso_clave','tipoFideicomiso_valor','extranjero_clave','extranjero_valor','tipoRelacion_clave','tipoRelacion_valor','tipoParticipacion_clave','tipoParticipacion_valor','sector_clave','sector_valor','especifiqueSector','fideicomitente_tipoPersona_clave','fideicomitente_tipoPersona_valor','fideicomitente_nombreRazonSocial','fideicomitente_rfc','fiduciario_nombreRazonSocial','fiduciario_rfc','fideicomisario_tipoPersona_clave','fideicomisario_tipoPersona_valor','fideicomisario_nombreRazonSocial','fideicomisario_rfc','tipoOperacion','tipoRelacion','tipoFideicomiso','TipoParticipacion','tipoPersona','nombreRazonSocial','rfc','extranjero'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function settipoOperacionAttribute($clave)
  {
    $array = $this->catalogo->tipoOperacion($clave);

    $this->attributes['tipoOperacion_clave'] = $array->clave;
    $this->attributes['tipoOperacion_valor'] = $array->valor;
  }


  public function settipoFideicomisoAttribute($clave)
  {
    $array = $this->catalogo->tipoFideicomiso($clave);

    $this->attributes['tipoFideicomiso_clave'] = $array->clave;
    $this->attributes['tipoFideicomiso_valor'] = $array->valor;
  }


  public function setextranjeroAttribute($clave)
  {
    $array = $this->catalogo->extranjero($clave);

    $this->attributes['extranjero_clave'] = $array->clave;
    $this->attributes['extranjero_valor'] = $array->valor;
  }


  public function settipoRelacionAttribute($clave)
  {
    $array = $this->catalogo->tipoRelacion($clave);

    $this->attributes['tipoRelacion_clave'] = $array->clave;
    $this->attributes['tipoRelacion_valor'] = $array->valor;
  }


  public function settipoParticipacionAttribute($clave)
  {
    $array = $this->catalogo->tipoParticipacionFideicomiso($clave);

    $this->attributes['tipoParticipacion_clave'] = $array->clave;
    $this->attributes['tipoParticipacion_valor'] = $array->valor;
  }


  public function setfideicomitenteTipoPersonaAttribute($clave)
  {
    $array = $this->catalogo->tipoPersona($clave);

    $this->attributes['fideicomitente_tipoPersona_clave'] = $array->clave;
    $this->attributes['fideicomitente_tipoPersona_valor'] = $array->valor;
  }


  public function setfideicomisarioTipoPersonaAttribute($clave)
  {
    $array = $this->catalogo->tipoPersona($clave);

    $this->attributes['fideicomisario_tipoPersona_clave'] = $array->clave;
    $this->attributes['fideicomisario_tipoPersona_valor'] = $array->valor;
  }


  public function setsectorAttribute($sector)
  {
    $array = $this->catalogo->sector($sector);

    $this->attributes['sector_clave'] = $array->clave;
    $this->attributes['sector_valor'] = $array->valor;
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
        $table->enum('tipoOperacion_clave', Arr::pluck($this->catalogo->tipoOperacion(),'clave'))->default(Arr::pluck($this->catalogo->tipoOperacion(),'clave')[0]);
        $table->enum('tipoOperacion_valor', Arr::pluck($this->catalogo->tipoOperacion(),'valor'))->default(Arr::pluck($this->catalogo->tipoOperacion(),'valor')[0]);

        $table->string('rfcFideicomiso',13)->nullable()->default(null);
        $table->enum('tipoFideicomiso_clave', Arr::pluck($this->catalogo->tipoFideicomiso(),'clave'))->default(Arr::pluck($this->catalogo->tipoFideicomiso(),'clave')[0]);
        $table->enum('tipoFideicomiso_valor', Arr::pluck($this->catalogo->tipoFideicomiso(),'valor'))->default(Arr::pluck($this->catalogo->tipoFideicomiso(),'valor')[0]);
        $table->enum('extranjero_clave',Arr::pluck($this->catalogo->extranjero(),'clave'))->default(Arr::pluck($this->catalogo->extranjero(),'clave')[0]);
        $table->enum('extranjero_valor',Arr::pluck($this->catalogo->extranjero(),'valor'))->default(Arr::pluck($this->catalogo->extranjero(),'valor')[0]);
        $table->enum('tipoRelacion_clave', Arr::pluck($this->catalogo->tipoRelacion(),'clave'))->default(Arr::pluck($this->catalogo->tipoRelacion(),'clave')[0]);
        $table->enum('tipoRelacion_valor', Arr::pluck($this->catalogo->tipoRelacion(),'valor'))->default(Arr::pluck($this->catalogo->tipoRelacion(),'valor')[0]);
        $table->enum('tipoParticipacion_clave', Arr::pluck($this->catalogo->tipoParticipacionFideicomiso(),'clave'))->default(Arr::pluck($this->catalogo->tipoParticipacionFideicomiso(),'clave')[0]);
        $table->enum('tipoParticipacion_valor', Arr::pluck($this->catalogo->tipoParticipacionFideicomiso(),'valor'))->default(Arr::pluck($this->catalogo->tipoParticipacionFideicomiso(),'valor')[0]);
        $table->enum('sector_clave',Arr::pluck($this->catalogo->sector(),'clave'))->default(Arr::pluck($this->catalogo->sector(),'clave')[8]);
        $table->enum('sector_valor',Arr::pluck($this->catalogo->sector(),'valor'))->default(Arr::pluck($this->catalogo->sector(),'valor')[8]);
        $table->string('especifiqueSector',100)->nullable()->default(null);

        $table->enum('fideicomitente_tipoPersona_clave',Arr::pluck($this->catalogo->tipoPersona(),'clave'))->default(Arr::pluck($this->catalogo->tipoPersona(),'clave')[0]);
        $table->enum('fideicomitente_tipoPersona_valor',Arr::pluck($this->catalogo->tipoPersona(),'valor'))->default(Arr::pluck($this->catalogo->tipoPersona(),'valor')[0]);
        $table->string('fideicomitente_nombreRazonSocial',100)->nullable()->default(null);
        $table->string('fideicomitente_rfc',13)->nullable()->default(null);

        $table->string('fiduciario_nombreRazonSocial',100)->nullable()->default(null);
        $table->string('fiduciario_rfc',13)->nullable()->default(null);

        $table->enum('fideicomisario_tipoPersona_clave',Arr::pluck($this->catalogo->tipoPersona(),'clave'))->default(Arr::pluck($this->catalogo->tipoPersona(),'clave')[0]);
        $table->enum('fideicomisario_tipoPersona_valor',Arr::pluck($this->catalogo->tipoPersona(),'valor'))->default(Arr::pluck($this->catalogo->tipoPersona(),'valor')[0]);

        $table->string('fideicomisario_nombreRazonSocial',100)->nullable()->default(null);
        $table->string('fideicomisario_rfc',13)->nullable()->default(null);

        $table->string('tipoOperacion',13)->nullable()->default(null);
        $table->string('tipoRelacion',13)->nullable()->default(null);
        $table->string('tipoFideicomiso',13)->nullable()->default(null);
        $table->string('TipoParticipacion',13)->nullable()->default(null);
        $table->string('tipoPersona',13)->nullable()->default(null);
        $table->string('nombreRazonSocial',13)->nullable()->default(null);
        $table->string('rfc',13)->nullable()->default(null);
        $table->string('extranjero',13)->nullable()->default(null);


        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
