<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_adeudos_pasivos_datos extends Model
{
  use HasFactory;

  protected $table="L21_adeudos_pasivos_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','titular_clave'];

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

        $table->string('tipoOperacion')->default("AGREGAR");

        $table->string('titular_clave')->default(null);
        $table->string('titular_valor')->nullable()->default(null);

        $table->string('tipoAdeudo_clave')->nullable()->default(null);
        $table->string('tipoAdeudo_valor',20)->nullable()->default(null);

        $table->string('numeroCuentaContrato',20)->nullable()->default(null);
        $table->date('fechaAdquisicion')->default(null);

        $table->float('monto_valor',10)->nullable()->default(null);
        $table->string('monto_moneda',3)->nullable()->default(null);

        $table->float('saldoInsolutoSituacionActual_valor',10)->nullable()->default(null);
        $table->string('saldoInsolutoSituacionActual_moneda',3)->nullable()->default(null);

        //*TERMINA DATOS ADEUDO*//

        $table->float('saldoInsolutoDiciembreAnterior_valor',10)->nullable()->default(null);
        $table->string('saldoInsolutoDiciembreAnterior_moneda',3)->nullable()->default(null);

        $table->float('saldoInsolutoFechaConclusion_valor',10)->nullable()->default(null);
        $table->string('saldoInsolutoFechaConclusion_moneda',3)->nullable()->default(null);

        $table->enum('tipoPersona',['FÍSICA','MORAL'])->default('FÍSICA');
        $table->string('nombreRazonSocial',100)->nullable()->default(null);
        $table->string('nombreInstitucion',100)->nullable()->default(null);
        $table->string('rfc',13)->nullable()->default(null);

        $table->string('pais',2)->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
