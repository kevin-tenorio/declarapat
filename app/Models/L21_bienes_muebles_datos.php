<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_bienes_muebles_datos extends Model
{
  use HasFactory;

  protected $table="L21_bienes_muebles_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','titular_clave','titular_valor','tipoBien_clave','tipoBien_valor','tipoPersona','nombreRazonSocial','rfc','relacion_clave','relacion_valor','descripcionGeneralBien','formaAdquisicion_clave','formaAdquisicion_valor','formaPago','valorAdquisicion_valor','valorAdquisicion_moneda','fechaAdquisicion','motivoBaja_clave','motivoBaja_clave'];

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

        $table->enum('titular_clave',["DEC", "CYG", "CBN", "CVV", "DEN", "CTER"])->default("CAP");
        $table->string('titular_valor')->nullable()->default(null);

        $table->string('tipoBien_clave')->nullable()->default(null);
        $table->string('tipoBien_valor')->nullable()->default(null);

        $table->enum('tipoPersona',["FÍSICA","MORAL"])->default("FÍSICA");
        $table->string('nombreRazonSocial')->nullable()->default(null);
        $table->string('rfc')->nullable()->default(null);

        $table->string('relacion_clave')->nullable()->default(null);
        $table->string('relacion_valor')->nullable()->default(null);

        $table->string('descripcionGeneralBien')->nullable()->default(null);

        $table->enum('formaAdquisicion_clave',["CPV", "CSN", "DNC", "HRN", "PRM", "RST", "STC"])->default("CPV");
        $table->string('formaAdquisicion_valor')->nullable()->default(null);

        $table->enum('formaPago',["CRÉDITO","CONTADO","NO APLICA"])->default("CRÉDITO");

        $table->ineterger('valorAdquisicion_valor')->nullable()->default(null);
        $table->string('valorAdquisicion_moneda')->nullable()->default(null);

        $table->string('fechaAdquisicion')->nullable()->default(null);

        $table->enum('motivoBaja_clave',["VNT", "DNC", "SNT", "OTRO"])->default("VNT");
        $table->string('motivoBaja_valor')->nullable()->default(null);


        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
