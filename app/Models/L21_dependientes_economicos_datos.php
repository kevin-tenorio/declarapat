<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;



class L21_dependientes_economicos_datos extends Model
{
  use HasFactory;

  protected $table="L21_dependientes_economicos_datos";

  protected $fillable = ['declaracion_id','tipoOperacion','nombre','primerApellido','segundoApellido','fechaNacimiento','rfc','parentesco','extranjero','curp','habitaDomicilioDeclarante','lugarDondeReside','pais','entidadFederativa_clave','municipioAlcaldia_clave','coloniaLocalidad','estadoProvincia','ciudadLocalidad','calle','numeroExterior','numeroInterior','codigoPostal','actividadLaboral','nivelOrdenGobierno','ambitoPublico','nombreEntePublico','areaAdscripcion','empleoCargoComision','funcionPrincipal','monto_mensual_valor','monto_mensual_moneda','fechaIngreso','nombreEmpresaSociedadAsociacion','empleoCargo','proveedorContratistaGobierno','sector','rfc_empresa','fechaIngreso','salario','salario_moneda'];

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
        $table->string('nombre')->nullable()->default(null);
        $table->string('primerApellido')->nullable()->default(null);
        $table->string('segundoApellido')->nullable()->default(null);
        $table->date('fechaNacimiento')->nullable()->default(null);
        $table->string('rfc')->nullable()->default(null);
        $table->string('parentescoRelacion_clave')->nullable()->default(null);
        $table->string('parentescoRelacion_valor')->nullable()->default(null);
        $table->boolean('extranjero')->default(0);
        $table->string('curp')->nullable()->default(null);
        $table->boolean('habitaDomicilioDeclarante')->default(0);
        $table->enum('lugarDondeReside',["MÉXICO","EXTRANJERO","SE DESCONOCE"])->default("MÉXICO");
        $table->string('calle')->nullable()->default(null);
        $table->string('numeroExterior')->nullable()->default(null);
        $table->string('numeroInterior')->nullable()->default(null);
        $table->string('coloniaLocalidad')->nullable()->default(null);
        $table->string('municipioAlcaldia_clave')->nullable()->default(null);
        $table->string('municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('entidadFederativa_clave')->nullable()->default(null);
        $table->string('entidadFederativa_valor')->nullable()->default(null);
        $table->string('codigoPostal')->nullable()->default(null);
        $table->string('ciudadLocalidad')->nullable()->default(null);
        $table->string('estadoProvincia')->nullable()->default(null);
        $table->string('pais')->nullable()->default(null);
        $table->enum('actividadLaboral_clave',["PUB", "PRI", "OTRO", "NING"])->default("PUB");
        $table->string('actividadLaboral_valor')->nullable()->default(null);
        $table->enum('nivelOrdenGobierno',["FEDERAL", "ESTATAL", "MUNICIPAL/ALCALDÍA"])->default("MUNICIPAL/ALCALDÍA");
        $table->enum('ambitoPublico',["EJECUTIVO", "LEGISLATIVO", "JUDICIAL", "ÓRGANO AUTÓNOMO"])->default("ÓRGANO AUTÓNOMO");
        $table->string('nombreEntePublico')->nullable()->default(null);
        $table->string('areaAdscripcion')->nullable()->default(null);
        $table->string('empleoCargoComision')->nullable()->default(null);
        #$table->string('actividadLaboralSectorPrivadoOtro_rfc')->nullable()->default(null);
        $table->string('funcionPrincipal')->nullable()->default(null);
        $table->float('salarioMensualNeto_valor')->nullable()->default(null);
        $table->string('salarioMensualNeto_moneda')->nullable()->default(null);
        $table->date('fechaIngresoEmpleo')->nullable()->default(null);
        $table->string('nombreEmpresaSociedadAsociacion')->nullable()->default(null);
        $table->string('rfc_empresa')->nullable()->default(null);
        $table->string('empleoCargo')->nullable()->default(null);
        $table->boolean('proveedorContratistaGobierno')->default(0);
        $table->enum('sector_clave',["AGRI","MIN","EELECT","CONS","INDMANU","CMAYOR","CMENOR","TRANS","MEDIOM","SERVFIN","SERVINM","SERVPROF","SERVCORP","SERVS","SERVESPAR","SERVALOJ","OTRO"])->default("AGRI");
        $table->string('sector_valor')->nullable()->default(null);
        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
