<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_bienes_inmuebles_datos extends Model
{
  use HasFactory;

  protected $table="L21_bienes_inmuebles";

  protected $fillable = ['declaracion_id','tipoOperacion','tipoInmueble_clave','tipoInmueble_valor','titular_clave','titular_valor','porcentajePropiedad','superficieTerreno_valor','superficieTerreno_unidad','superficieConstruccion_valor','superficieConstruccion_unidad','tipoPersona','nombreRazonSocial','rfc','relacion_clave','relacion_valor','formaAdquisicion_clave','formaAdquisicion_valor','formaPago','valorAdquisicion_valor','valorAdquisicion_moneda','fechaAdquisicion','datoIdentificacion','valorConformeA','calle','numeroExterior','numeroInterior','coloniaLocalidad','municipioAlcaldia_clave','municipioAlcaldia_valor','entidadFederativa_clave','entidadFederativa_valor','codigoPostal','ciudadLocalidad','estadoProvincia','pais','motivoBaja_clave','motivoBaja_valor'];

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
        $table->boolean('ninguno')->default(0);
        $table->enum('tipoOperacion',["AGREGAR","MODIFICAR","SIN CAMBIO","BAJA"])->default("AGREGAR");

        $table->enum('tipoInmueble_clave',["CASA", "DPTO", "EDIF", "LOCC", "BODG", "PALC", "RACH", "TERR", "OTRO"])->default("CASA");
        $table->string('tipoInmueble_valor')->nullable()->default(null);
        $table->enum('titular_clave',["DEC", "CYG", "CBN", "CVV", "DEN", "CTER"])->default("CAP");
        $table->string('titular_valor')->nullable()->default(null);
        $table->ineterger('porcentajePropiedad')->nullable()->default(null);

        $table->ineterger('superficieTerreno_valor')->nullable()->default(null);
        $table->enum('superficieTerreno_unidad',["Metro cuadrado", "Decámetro cuadrado", "Hectárea", "Kilómetro cuadrado"])->default("Metro cuadrado");

        $table->ineterger('superficieConstruccion_valor')->nullable()->default(null);
        $table->enum('superficieConstruccion_unidad',["Metro cuadrado", "Decámetro cuadrado", "Hectárea", "Kilómetro cuadrado"])->default("Metro cuadrado");

        $table->string('tipoPersona')->nullable()->default(null);
        $table->string('nombreRazonSocial')->nullable()->default(null);
        $table->string('rfc')->nullable()->default(null);

        $table->string('relacion_clave')->nullable()->default(null);
        $table->string('relacion_valor')->nullable()->default(null);

        $table->enum('formaAdquisicion_clave',["CPV", "CSN", "DNC", "HRN", "PRM", "RST", "STC"])->default("CPV");
        $table->string('formaAdquisicion_valor')->nullable()->default(null);
        $table->enum('formaPago',["CRÉDITO","CONTADO","NO APLICA"])->default("CRÉDITO");

        $table->ineterger('valorAdquisicion_valor')->nullable()->default(null);
        $table->string('valorAdquisicion_moneda')->nullable()->default(null);
        $table->string('fechaAdquisicion')->nullable()->default(null);
        $table->date('datoIdentificacion')->nullable()->default(null);
        $table->enum('valorConformeA',["ESCRITURA PÚBLICA","SENTENCIA","CONTRATO"])->default("ESCRITURA PÚBLICA");

        $table->string('pais')->nullable()->default(null);
        $table->string('entidadFederativa_clave')->nullable()->default(null);
        $table->string('entidadFederativa_valor')->nullable()->default(null);
        $table->string('municipioAlcaldia_clave')->nullable()->default(null);
        $table->string('municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('coloniaLocalidad')->nullable()->default(null);
        $table->string('estadoProvincia')->nullable()->default(null);
        $table->string('ciudadLocalidad')->nullable()->default(null);
        $table->string('calle')->nullable()->default(null);
        $table->string('numeroExterior')->nullable()->default(null);
        $table->string('numeroInterior')->nullable()->default(null);
        $table->string('codigoPostal')->nullable()->default(null);

        $table->enum('motivoBaja_clave',["VNT", "DNC", "SNT", "OTRO"])->default("VNT");
        $table->string('motivoBaja_valor')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
