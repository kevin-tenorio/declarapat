<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

use App\Models\catalogo;


class Declaracion extends Model
{
  use HasFactory;

  protected $table = 'declaraciones';

  protected $ini = 'Inicial';

  protected $mod = 'Modificación';

  protected $con = 'Conclusión';

  public $ley_actual = 'L21';

  protected $fillable = ['tipo'];

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// SETTERS
	/////////////////////////////////////////////////////////////////////////////////
  public function settipoAttribute($tipo){
		$this->attributes['tipo'] = $tipo;
		$this->attributes['rfc'] = \Auth::user()->rfc;
		$this->attributes['ley'] = $this->ley_actual;
	}

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// GETTERS
	/////////////////////////////////////////////////////////////////////////////////
  public function getcatalogoAttribute($catalogo){

    $catalogo = new catalogo;

    return $catalogo;
  }



  public function getdatosAttribute()
  {
    return $this->modelo::where('declaracion_id','=',$this->id)->first();
  }



  public function getfilasAttribute()
  {
    $submodelo = $this->modelo."_datos";

    return $submodelo::where('declaracion_id','=',$this->id)->get();
  }



  public function getformatosAttribute()
  {
    return Catalogo::formatos($this->ley);
  }



  public function getInicialAttribute()
  {
    if($this->tipo == $this->ini)
    {
      return true;
    }
    else
    {
      return false;
    }
  }



  public function getModificacionAttribute()
  {
    if($this->tipo == $this->mod)
    {
      return true;
    }
    else
    {
      return false;
    }
  }



  public function getConclusionAttribute()
  {
    if($this->tipo == $this->con)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// FUNCIONES
	/////////////////////////////////////////////////////////////////////////////////
  public function vista($slug = null)
  {
    if(is_null($slug))
    {
      $formato = declaracion_formato::where('declaracion_id','=',$this->id)->where('estatus','=',0)
                                                                           ->orderby('formato_id','ASC')
                                                                           ->first();
      if(is_null($formato))
      {
        return "../";
      }
    }
    else
    {
      $formato = declaracion_formato::where('formato_slug','=',$slug)->where('declaracion_id','=',$this->id)
                                                                     ->first();

    }

    return $formato->formato_slug;
  }



  public function crear_formatos()
  {
    $formatos = Catalogo::formatos($this->ley_actual);

    foreach($formatos as $formato)
    {
      declaracion_formato::create(['formato_id' => $formato->id, 'formato_slug' => $formato->slug,'declaracion_id' => $this->id]);
    }
  }

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
		{
			\Schema::create($this->table, function(Blueprint $table)
			{
        $table->increments('id');
        $table->string('rfc',10);
        $table->enum('tipo', [$this->ini,$this->mod,$this->con])->default($this->ini);
        $table->enum('estatus', ['Pendiente','Firmada'])->default('Pendiente');
        $table->string('ley',3)->default('L21');
        $table->timestamps();
				$table->engine = 'InnoDB';
			});
		}//if schema table usuarios exist
  }

}
