<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;




class L21_apoyos_publicos_datos extends Model
{
  use HasFactory;

  protected $table="L21_apoyos_publicos_datos";

  protected $fillable = ['declaracion_id','tipoOpearcion','beneficiarioPrograma_clave','beneficiarioPrograma_valor','nombrePrograma','institucionOtorgante','nivelOrdenGobierno','tipoApoyo_clave','tipoApoyo_valor','formaRecepcion','montoApoyoMensual_valor','montoApoyoMensual_moneda','especifiqueApoyo'];

  protected $nullable = [];

  protected $guarded = ['id'];

  public $timestamps = false;

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

        $table->enum('tipoOpearcion',['AGREGAR','MODIFICAR','SIN CAMBIO','BAJA'])->default('AGREGAR');

        $table->enum('beneficiarioPrograma_clave',["ABUELO(A)"])->default('ABUELO(A)');
        $table->string('beneficiarioPrograma_valor',100)->nullable()->default(null);

        $table->string('nombrePrograma',100)->nullable()->default(null);
        $table->string('institucionOtorgante',100)->nullable()->default(null);
        $table->enum('nivelOrdenGobierno',["FEDERAL","ESTATAL","MUNICIPIO_ALCADÍA"])->default('FEDERAL');

        $table->enum('tipoApoyo_clave',["OBRA"])->default('OBRA');
        $table->string('tipoApoyo_valor',100)->nullable()->default(null);

        $table->enum('formaRecepcion',["MONETARIO","ESPECIE"])->default('MONETARIO');


        $table->float('montoApoyoMensual_valor',20)->unsigned()->default(null);
        $table->string('montoApoyoMensual_moneda',3)->default('MXN');

        $table->string('especifiqueApoyo',400)->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
