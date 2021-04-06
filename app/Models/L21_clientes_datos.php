<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;


class L21_clientes_datos extends Model
{
  use HasFactory;

  protected $table="L21_clientes_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','realizaActividadLucrativa','tipoRelacion_clave','tipoRelacion_valor','tipoRelacion','empresa_nombreEmpresaServicio','empresa_rfc','clientePrincipal_tipoPersona_clave','clientePrincipal_tipoPersona_valor','clientePrincipal_nombreRazonSocial','clientePrincipal_rfc','tipoPersona','nombreRazonSocial','rfc','sector_clave','sector_valor','especifiqueSector','montoAproximadoGanancia_valor','montoAproximadoGanancia_moneda','pais','ubicacion_pais_clave','ubicacion_pais_valor','ubicacion_entidadFederativa_clave','ubicacion_entidadFederativa_valor','entidadFederativa_clave','entidadFederativa_valor'];

  protected $nullable = ['ubicacion_entidadFederativa','ubicacion_pais'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////// SETTERS
  /////////////////////////////////////////////////////////////////////////////////
  public function settipoRelacionAttribute($clave)
  {
    $array = $this->catalogo->tipoRelacion($clave);

    $this->attributes['tipoRelacion_clave'] = $array->clave;
    $this->attributes['tipoRelacion_valor'] = $array->valor;
  }


  public function setmontoAproximadoGananciaValorAttribute($monto)
  {
    $this->attributes['montoAproximadoGanancia_valor'] = filter_var($monto, FILTER_SANITIZE_NUMBER_INT);
  }


  public function setclientePrincipalTipoPersonaAttribute($clave)
  {
    $array = $this->catalogo->tipoPersona($clave);

    $this->attributes['clientePrincipal_tipoPersona_clave'] = $array->clave;
    $this->attributes['clientePrincipal_tipoPersona_valor'] = $array->valor;
  }


  public function setsectorAttribute($sector)
  {
    $array = $this->catalogo->sector($sector);

    $this->attributes['sector_clave'] = $array->clave;
    $this->attributes['sector_valor'] = $array->valor;
  }


  public function setubicacionPaisAttribute($clave)
  {
    $array = $this->catalogo->extranjero($clave);

    $this->attributes['ubicacion_pais_clave'] = $array->clave;
    $this->attributes['ubicacion_pais_valor'] = $array->valor;
  }


  public function setubicacionEntidadfederativaAttribute($clave)
  {
    $array = $this->catalogo->inegiEntidades($clave);

    if(isset($array->Cve_Ent) and isset($array->Nom_Ent))
    {
      $this->attributes['ubicacion_entidadFederativa_clave'] = $array->Cve_Ent;
      $this->attributes['ubicacion_entidadFederativa_valor'] = $array->Nom_Ent;
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
        $table->id();

        $table->integer('declaracion_id')->unsigned();
        $table->foreign('declaracion_id')->references('id')->on('declaraciones')->onDelete('cascade');
        $table->string('tipoOperacion',100)->nullable()->default(null);
        $table->string('realizaActividadLucrativa',100)->nullable()->default(null);

        $table->enum('tipoRelacion_clave', Arr::pluck($this->catalogo->tipoRelacion(),'clave'))->default(Arr::pluck($this->catalogo->tipoRelacion(),'clave')[0]);
        $table->enum('tipoRelacion_valor', Arr::pluck($this->catalogo->tipoRelacion(),'valor'))->default(Arr::pluck($this->catalogo->tipoRelacion(),'valor')[0]);
        $table->string('tipoRelacion',100)->nullable()->default(null);

        $table->string('empresa_nombreEmpresaServicio',100)->nullable()->default(null);
        $table->string('empresa_rfc',13)->nullable()->default(null);

        $table->enum('clientePrincipal_tipoPersona_clave',Arr::pluck($this->catalogo->tipoPersona(),'clave'))->default(Arr::pluck($this->catalogo->tipoPersona(),'clave')[0]);
        $table->enum('clientePrincipal_tipoPersona_valor',Arr::pluck($this->catalogo->tipoPersona(),'valor'))->default(Arr::pluck($this->catalogo->tipoPersona(),'clave')[0]);
        $table->string('clientePrincipal_nombreRazonSocial',100)->nullable()->default(null);
        $table->string('clientePrincipal_rfc',13)->nullable()->default(null);
        $table->string('tipoPersona',100)->nullable()->default(null);
        $table->string('nombreRazonSocial',100)->nullable()->default(null);
        $table->string('rfc',100)->nullable()->default(null);

        $table->enum('sector_clave',Arr::pluck($this->catalogo->sector(),'clave'))->default(Arr::pluck($this->catalogo->sector(),'clave')[8]);
        $table->enum('sector_valor',Arr::pluck($this->catalogo->sector(),'valor'))->default(Arr::pluck($this->catalogo->sector(),'valor')[8]);
        $table->string('especifiqueSector',100)->nullable()->default(null);

        $table->float('montoAproximadoGanancia_valor',20)->unsigned()->default(null);
        $table->string('montoAproximadoGanancia_moneda',3)->default(Arr::pluck($this->catalogo->tipoMoneda(),'clave')[0]);

        $table->string('pais',100)->nullable()->default(null);
        $table->enum('ubicacion_pais_clave',Arr::pluck($this->catalogo->extranjero(),'clave'))->nullable()->default(Arr::pluck($this->catalogo->extranjero(),'clave')['1']);
        $table->enum('ubicacion_pais_valor',Arr::pluck($this->catalogo->extranjero(),'valor'))->nullable()->default(Arr::pluck($this->catalogo->extranjero(),'valor')['1']);

        $table->enum('ubicacion_entidadFederativa_clave',Arr::pluck($this->catalogo->inegiEntidades(),'Cve_Ent'))->nullable()->default(null);
        $table->enum('ubicacion_entidadFederativa_valor',Arr::pluck($this->catalogo->inegiEntidades(),'Nom_Ent'))->nullable()->default(null);
        $table->string('entidadFederativa_clave',100)->nullable()->default(null);
        $table->string('entidadFederativa_valor',100)->nullable()->default(null);


        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
