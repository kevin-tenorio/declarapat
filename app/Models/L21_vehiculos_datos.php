<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_vehiculos_datos extends Model
{
  use HasFactory;

  protected $table="L21_vehiculos_datos";

  protected $fillable = ['declaracion_id','tipoOpearcion','tipoVehiculo_clave','tipoVehiculo_valor','titular_clave','titular_valor','tipoPersona','nombreRazonSocial','rfc','relacion_valor','relacion_clave,','marca','modelo','anio','numeroSerieRegistro','pais','entidadFederativa_clave','entidadFederativa_valor','formaAdquisicion_clave','formaAdquisicion_valor','formaPago','valorAdquision_valor','valorAdquision_moneda','fechaAdquision','motivoBaja_clave','motivoBaja_valor'];

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
        $table->enum('tipoOpearcion',['AGREGAR','MODIFICAR','SIN CAMBIO','BAJA'])->default('AGREGAR');

        $table->enum('tipoVehiculo_clave',['AUTOMOVIL/MOTOCICLETA','AERONAVE','BARCO/YATE','OTRO (ESPECIFIQUE)'])->default('AUTOMOVIL/MOTOCICLETA');
        $table->string('tipoVehiculo_valor')->nullable()->default(null);

        $table->enum('titular_clave',["DEC", "CYG", "CBN", "CVV", "DEN", "CTER"])->default("DEC");
        $table->string('titular_valor')->nullable()->default(null);

        $table->enum('tipoPersona',['FISICA','MORAL'])->default('FISICA');
        $table->string('nombreRazonSocial')->nullable()->default(null);
        $table->string('rfc',13)->nullable()->default(null);

        $table->string('relacion_valor')->nullable()->default(null);
        $table->string('relacion_clave')->nullable()->default(null);

        $table->string('marca')->nullable()->default(null);
        $table->string('modelo')->nullable()->default(null);
        $table->integer('anio')->nullable()->default(null);
        $table->string('numeroSerieRegistro')->nullable()->default(null);

        $table->string('pais')->nullable()->default(null);

        $table->string('entidadFederativa_clave')->nullable()->default(null);
        $table->string('entidadFederativa_valor')->nullable()->default(null);

        $table->enum('formaAdquisicion_clave',["CPV", "CSN", "DNC", "HRN", "PRM", "RST", "STC"])->default("CPV");
        $table->string('formaAdquisicion_valor')->nullable()->default(null);
        $table->enum('formaPago',["CRÉDITO","CONTADO","NO APLICA"])->default("CRÉDITO");

        $table->integer('valorAdquisicion_valor')->nullable()->default(null);
        $table->string('valorAdquisicion_moneda')->nullable()->default(null);
        $table->string('fechaAdquisicion')->nullable()->default(null);

        $table->enum('motivoBaja_clave',["VNT", "DNC", "SNT", "OTRO"])->default("VNT");
        $table->string('motivoBaja_valor')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
