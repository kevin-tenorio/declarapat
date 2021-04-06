<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_cuentas_bancarias_datos extends Model
{
  use HasFactory;

  protected $table="L21_cuentas_bancarias_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','tipoInversion_clave','tipoInversion_valor','subtipoinversion_clave','subtipoinversion_valor','titular_clave','titular_valor','tipoPersona','nombreRazonSocial','rfc','numeroCuentaContrato','pais','institucionRazonSocial','rfc','saldoSituacionActual_valor','saldoSituacionActual_moneda','saldoDiciembreAnterior_valor','saldoDiciembreAnterior_moneda'];

  protected $nullable = [];

  protected $guarded = ['id'];

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

        $table->string('tipoInversion_clave')->nullable()->default(null);
        $table->string('tipoInversion_valor')->nullable()->default(null);

        $table->string('subTipoInversion_clave')->nullable()->default(null);
        $table->string('subTipoInversion_valor')->nullable()->default(null);

        $table->enum('titular_clave',["DEC", "CYG", "CBN", "CVV", "DEN", "CTER"])->default("DEC");
        $table->string('titular_valor')->nullable()->default(null);

        $table->enum('tipoPersona',["FÍSICA","MORAL"])->default("FÍSICA");
        $table->string('nombreRazonSocial')->nullable()->default(null);
        $table->string('rfc')->nullable()->default(null);
        $table->string('numeroCuentaContrato')->nullable()->default(null);

        $table->enum('pais',["MX", "EXT"])->default("MX");
        $table->string('institucionRazonSocial')->nullable()->default(null);

        $table->integer('saldoSituacionActual_valor')->nullable()->default(null);
        $table->string('saldoSituacionActual_moneda')->nullable()->default(null);

        $table->integer('saldoDiciembreAnterior_valor')->nullable()->default(null);
        $table->string('saldoDiciembreAnterior_moneda')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
