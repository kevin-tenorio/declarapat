<?php namespace App\Models;


class catalogo
{

	public function actividadlaboral()
	{
		$array = \DB::connection('catalogos')->table('actividadlaboral')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}


	public function ambitopublico()
	{
		$array = \DB::connection('catalogos')->table('ambitopublico')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function ambitosector()
	{
		$array = \DB::connection('catalogos')->table('ambitosector')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function beneficiarios($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('beneficiarios')
																					 ->orderby('lista', 'ASC')
																					 ->orderby('valor', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('beneficiarios')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function documentoobtenido()
	{
		$array = \DB::connection('catalogos')->table('documentoobtenido')
																				->orderby('lista', 'ASC')
																				->get();
		return $array;
	}



	public function estatus()
	{
		$array = \DB::connection('catalogos')->table('estatus')
																				 ->orderby('lista', 'ASC')
																				 ->get();
		return $array;
	}



	public function existe_formato($ley,$formato)
	{
		$array = \DB::connection('catalogos')->table('formatos')
																				 ->where('slug','=',$formato)
																				 ->where('ley','=',$ley)
																				 ->first();
		return $array;
	}



	public function extranjero($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('extranjero')
																					 ->orderby('valor','ASC')
																					 ->get()->toArray();

		}
		else
		{
			$array = \DB::connection('catalogos')->table('extranjero')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function formaadquisicion()
	{
		$array = \DB::connection('catalogos')->table('formaadquisicion')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function formapago()
	{
		$array = \DB::connection('catalogos')->table('formapago')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function formarecepcion($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('formarecepcion')
																					 ->orderby('valor', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('formarecepcion')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public static function formatos($ley)
	{
		$array = \DB::connection('catalogos')->table('formatos')
																				 ->where('ley',$ley)
																				 ->get();
		return $array;
	}



	public function lugardondereside()
	{
		$array = \DB::connection('catalogos')->table('lugardondereside')
		 									 ->orderby('valor', 'ASC')
		 									 ->get();
		return $array;
	}



	public function motivobaja()
	{
		$array = \DB::connection('catalogos')->table('motivobaja')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function nivel($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('nivel')
																					 ->orderby('lista', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('nivel')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function nivelOrdenGobierno()
	{
		$array = \DB::connection('catalogos')->table('nivelordengobierno')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function parentescorelacion()
	{
		$array = \DB::connection('catalogos')->table('parentescorelacion')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public static function regimenmatrimonial($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('regimenmatrimonial')
																					 ->orderby('valor', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('regimenmatrimonial')
																					 ->where('clave', '=', $clave)
																					 ->first();
		}

		return $array;
	}



	public function relacioncondeclarante()
	{
		$array = \DB::connection('catalogos')->table('relacioncondeclarante')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function sector($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('sector')
																					 ->orderby('lista', 'ASC')
																					 ->orderby('valor', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('sector')
																					 ->where('clave','=', $clave)
																					 ->first();
		}

		return $array;
	}



	public static function estadocivil($clave = null)
	{
		if (is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('estadocivil')
																					 ->orderby('valor', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('estadocivil')
																					 ->where('clave', '=', $clave)
																					 ->first();
		}

		return $array;
	}



	public function subtipoinversion()
	{
		$array = \DB::connection('catalogos')->table('subtipoinversion')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		 return $array;
	}



	public function tipoAdeudo($clave = null)
	{
	    if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipoadeudo')
												 								->orderby('clave','ASC')
	     										 								->get()->toArray();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipoadeudo')         ->where('clave','=',$clave)
																				->first();
		}
	return $array;
	}



	public function tipoApoyo()
	{
		$array = \DB::connection('catalogos')->table('tipoapoyo')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function tipoBeneficio($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipobeneficio')
																					 ->orderby('lista', 'ASC')
																					 ->orderby('valor', 'ASC')
																					 ->get();

		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipobeneficio')
																					 ->where('clave', '=', $clave)
																					 ->first();
		}

		return $array;
	}



	public function tipobienbienesmueble()
	{
		$array = \DB::connection('catalogos')->table('tipobienbienesmueble')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function tipobienenajenacionbienes()
	{
		$array = \DB::connection('catalogos')->table('tipobienenajenacionbienes')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function tipofideicomiso($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipofideicomiso')
																					 ->orderby('valor', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipofideicomiso')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function tipoinmueble($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipoinmueble')
																					 ->orderby('valor','ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipoinmueble')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function tipoinstitucion()
	{
		$array = \DB::connection('catalogos')->table('tipoinstitucion')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function tipoinstrumento()
	{
		$array = \DB::connection('catalogos')->table('tipoinstrumentoo')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function tipoinversion()
	{
		$array = \DB::connection('catalogos')->table('tipoinversion')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}


	public function tipoMoneda($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipomoneda')
																					 ->orderby('lista', 'ASC')
																					 ->orderby('valor', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipomoneda')
																					 ->where('clave','=', $clave)
																					 ->first();
		}

		return $array;
	}



	public function tipoMoneda_2($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipomoneda_2')
																					 ->orderby('ISO4217', 'ASC')
																					 ->orderby('ISO4217', 'ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipomoneda_2')
																					 ->where('clave','=', $clave)
																					 ->first();
		}

		return $array;
	}



	public function tipoOperacion($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipooperacion')
																					 ->orderby('valor','ASC')
																					 ->get()->toArray();

		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipooperacion')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function tipoParticipacion($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipoparticipacion')
												 ->orderby('valor','ASC')
	     										 ->get()->toArray();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipoparticipacion')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function tipoparticipacionfideicomiso($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipoparticipacionfideicomiso')
																					 ->orderby('valor','ASC')
																					 ->get()->toArray();

		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipoparticipacionfideicomiso')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function tipopersona($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipopersona')
																					 ->orderby('valor','ASC')
																					 ->get()->toArray();

		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipopersona')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function tiporelacion($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tiporelacion')
																					 ->orderby('valor','ASC')
																					 ->get()->toArray();

		}
		else
		{
			$array = \DB::connection('catalogos')->table('tiporelacion')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function tiporepresentacion()
	{
		$array = \DB::connection('catalogos')->table('tiporepresentacion')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function tipoVehiculo($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('tipovehiculo')
																					 ->orderby('valor','ASC')
																					 ->get();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('tipovehiculo')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}



	public function titulares()
	{
		$array = \DB::connection('catalogos')->table('titulares')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function unidadmedida()
	{
		$array = \DB::connection('catalogos')->table('unidadmedida')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function valorconforme()
	{
		$array = \DB::connection('catalogos')->table('valorconforme')
																				 ->orderby('valor', 'ASC')
																				 ->get();
		return $array;
	}



	public function inegiEntidades($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('inegi')
																					 ->select('Cve_Ent','Nom_Ent')
																					 ->distinct('Cve_Ent')
																					 ->orderby('Nom_Ent', 'ASC')
																					 ->get();

		}
		else
		{
			$array = \DB::connection('catalogos')->table('inegi')
																					 ->select('Cve_Ent','Nom_Ent')
																					 ->distinct('Cve_Ent')
																					 ->where('Cve_Ent','=',$clave)
																					 ->orderby('Nom_Ent', 'ASC')
																					 ->first();
		}

		return $array;
	}



	public function inegiAlcaldias($entidad_id,$alcaldia_id = null)
	{
		if(is_null($entidad_id))
		{
			$array = [];
		}
		else
		{
			if(is_numeric($entidad_id))
			{
				if(is_numeric($alcaldia_id))
				{
					$array = \DB::connection('catalogos')->table('inegi')
																						 	 ->select('Cve_Mun','Nom_Mun')
																						   ->where('Cve_Ent','=',$entidad_id)
																						   ->where('Cve_Mun','=',$alcaldia_id)
																						   ->orderby('Nom_Mun', 'ASC')
																						   ->first();
				}
				else
				{
					$array = \DB::connection('catalogos')->table('inegi')
																						 	 ->select('Cve_Mun','Nom_Mun')
																						   ->where('Cve_Ent','=',$entidad_id)
																						   ->distinct('Cve_Mun')
																						   ->orderby('Nom_Mun', 'ASC')
																						   ->get();
				}
			}
		}//else

		return $array;
	}



	public function inegiLocalidades($entidad_id,$alcaldia_id)
	{
		$array = \DB::connection('catalogos')->table('inegi')
																				 ->select('Nom_Loc','CP')
																				 ->where('Cve_Ent','=',$entidad_id)
																				 ->where('Cve_Mun','=',$alcaldia_id)
																				 ->distinct('Nom_Loc')
																				 ->orderby('Nom_Loc','ASC')
																				 ->get();
  	return $array;
	}



	public function inegiCP($entidad_id,$alcaldia_id,$localidad)
	{
		$array = \DB::connection('catalogos')->table('inegi')
																				 ->select('CP')
																				 ->where('Cve_Ent','=',$entidad_id)
																				 ->where('Cve_Mun','=',$alcaldia_id)
																				 ->where('Nom_Loc','=',$localidad)
																				 ->get();
	 	return $array;
	}



	public function divisas()
	{
		$array = \DB::connection('catalogos')->table('ISO4217')
																				 ->orderby('divisa', 'ASC')
																				 ->get();
		return $array;
	}



	public function paises($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('paises')
																					 ->orderby('ESPANOL','ASC')
																					 ->get()
																					 ->toArray();
		}
		elseif($clave == 'default')
		{
			$array = \DB::connection('catalogos')->table('paises')
																					 ->where('default','=',true)
																					 ->first();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('paises')
																					 ->where('ISO2','=',$clave)
																					 ->first();
		}

		return $array;
	}


	public function titularBien($clave = null)
	{
		if(is_null($clave))
		{
			$array = \DB::connection('catalogos')->table('titularbien')
												 								->orderby('clave','ASC')
	     										 								->get()->toArray();
		}
		else
		{
			$array = \DB::connection('catalogos')->table('titularbien')
																					 ->where('clave','=',$clave)
																					 ->first();
		}

		return $array;
	}

}
