<?php namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Schema\Blueprint;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
  use HasFactory, HasApiTokens, Notifiable;

  protected $table = 'users';

  protected $fillable = ['name','email','password',];

  protected $hidden = ['password','remember_token',];

  protected $casts = ['email_verified_at' => 'datetime',];

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// SETTERS
	/////////////////////////////////////////////////////////////////////////////////
  public function setPasswordAttribute($string){
		$this->attributes['password'] = bcrypt($string);
	}

  /////////////////////////////////////////////////////////////////////////////////
	/////////////////////// CREO TABLA CONFIG
	/////////////////////////////////////////////////////////////////////////////////
  public function Tabla(){

    if(!\Schema::hasTable($this->table))
		{
      \Schema::create($this->table, function (Blueprint $table) {
        $table->id();
				$table->string('rfc',10)->unique();
				$table->string('homoclave',3);
        $table->string('nombre',25);
        $table->string('apellido_paterno',25)->nullable();
				$table->string('apellido_materno',25)->nullable();
        $table->enum('rol',['administrador','declarante'])->default('declarante');
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
      });

      \Schema::create('password_resets', function (Blueprint $table) {
        $table->string('email')->index();
        $table->string('token');
        $table->timestamp('created_at')->nullable();
      });
		}//if schema table usuarios exist
  }

  /**
   * Get all of the access tokens for the user.
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function tokens()
  {
      return $this->hasMany(Token::class, 'user_id')->orderBy('created_at', 'desc');
  }

}
