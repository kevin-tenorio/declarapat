<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Arr;

class L21_datos_pareja extends Model
{
  use HasFactory;

  protected $table="L21_datos_pareja";

  protected $fillable = ['declaracion_id','ninguno','tipoOperacion','nombres','primerApellido','segundoApellido','fechaNacimiento','rfc','relacionConDeclarante','ciudadanoExtranjero','curp','esDependienteEconomico','habitaDomicilioDeclarante','lugardondereside','calle','numeroExterior','numeroInterior','coloniaLocalidad','municipioAlcaldia_clave','municipioAlcaldia_valor','entidadFederativa_clave','entidadFederativa_valor','ciudadLocalidad','estadoProvincia','pais','codigoPostal','actividadLaboral_clave','actividadLaboral_valor','nivelOrdenGobierno','ambitoPublico','nombreEntePublico','areaAdscripción','empleoCargoComision','funcionPrincipal','salarioMensualNeto_valor','salarioMensualNeto_moneda','fechaIngreso','nombreEmpresaSociedadAsociacion','empleoCargoComision','actividadLaboral_rfc','fechaIngreso','sector_clave','sector_valor','salarioMensualNeto_valor','salarioMensualNeto_moneda','proveedorContratistaGobierno','aclaracionesObservaciones'];

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
        $table->boolean('ninguno')->default(false);
        $table->enum('tipoOperacion', Arr::pluck($this->catalogo->tipoOperacion(),'valor'))->default(Arr::pluck($this->catalogo->tipooperacion(),'valor')[0]);
        $table->string('nombres',70)->nullable()->default(null);
        $table->string('primerApellido',30)->nullable()->default(null);
        $table->string('segundoApellido',30)->nullable()->default(null);
        $table->date('fechaNacimiento')->nullable()->default(null);
        $table->string('rfc',13)->nullable()->default(null);
        $table->enum('relacionConDeclarante', Arr::pluck($this->catalogo->relacioncondeclarante(),'valor'))->default(Arr::pluck($this->catalogo->relacioncondeclarante(),'valor')[0]);
        $table->boolean("ciudadanoExtranjero")->default(false);
        $table->string('curp',18)->nullable()->default(null);
        $table->boolean("esDependienteEconomico")->default(false);
        $table->boolean("habitaDomicilioDeclarante")->default(false);
        $table->enum('lugarDondeReside', Arr::pluck($this->catalogo->lugardondereside(),'valor'))->default(Arr::pluck($this->catalogo->lugardondereside(),'valor')[0]);

        $table->string('pais',2)->nullable()->default(null);
        $table->string('entidadFederativa_clave',2)->nullable()->default(null);
        $table->string('entidadFederativa_valor')->nullable()->default(null);
        $table->string('municipioAlcaldia_clave',4)->nullable()->default(null);
        $table->string('municipioAlcaldia_valor')->nullable()->default(null);
        $table->string('coloniaLocalidad')->nullable()->default(null);
        $table->string('estadoProvincia')->nullable()->default(null);
        $table->string('ciudadLocalidad')->nullable()->default(null);
        $table->string('calle')->nullable()->default(null);
        $table->string('numeroExterior',6)->nullable()->default(null);
        $table->string('numeroInterior',6)->nullable()->default(null);
        $table->string('codigoPostal',13)->nullable()->default(null);

        $table->string('actividadLaboral_clave')->nullable()->default(null);
        $table->string('actividadLaboral_valor')->nullable()->default(null);

        $table->string('nombreEntePublico')->nullable()->default(null);
        $table->string('nivelOrdenGobierno')->nullable()->default(null);
        $table->string('ambitoPublico')->nullable()->default(null);
        $table->string('areaAdscripcion')->nullable()->default(null);
        $table->string('empleoCargoComision')->nullable()->default(null);
        $table->string('funcionPrincipal')->nullable()->default(null);

        $table->string('salarioMensualNeto_valor',2)->nullable()->default(null);
        $table->string('salarioMensualNeto_moneda')->nullable()->default(null);
        $table->string('fechaIngreso')->nullable()->default(null);

        $table->string('nombreEmpresaSociedadAsociacion')->nullable()->default(null);
        $table->string('actividadLaboral_rfc')->nullable()->default(null);

        $table->string('sector_clave')->nullable()->default(null);
        $table->string('sector_valor')->nullable()->default(null);

        $table->string('proveedorContratistaGobierno')->nullable()->default(null);

        $table->string('aclaracionesObservaciones')->nullable()->default(null);

        $table->engine = 'InnoDB';
      });
    }//if schema table usuarios exist
  }

}
