

<?php 

Migraciones:

// create_distribuidoras_table.php:

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribuidorasTable extends Migration
{
    public function up()
    {
        Schema::create('distribuidoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distribuidoras');
    }
}

// create_desarrolladoras_table.php:

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesarrolladorasTable extends Migration
{
    public function up()
    {
        Schema::create('desarrolladoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('distribuidora_id')->constrained('distribuidoras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desarrolladoras');
    }
}

// create_videojuegos_table.php:

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideojuegosTable extends Migration
{
    public function up()
    {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('anyo');
            $table->foreignId('desarrolladora_id')->constrained('desarrolladoras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('videojuegos');
    }
}

// create_posesiones_table.php:

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoseionesTable extends Migration
{
    public function up()
    {
        Schema::create('posesiones', function (Blueprint $table) {
            $table->foreignId('videojuego_id')->constrained('videojuegos')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->primary(['videojuego_id', 'user_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poseiones');
    }
}

// Modelos:
// Distribuidora.php:

php

use Illuminate\Database\Eloquent\Model;

class Distribuidora extends Model
{
    protected $fillable = ['nombre'];

    public function desarrolladoras()
    {
        return $this->hasMany(Desarrolladora::class);
    }
}

// Desarrolladora.php:

php

use Illuminate\Database\Eloquent\Model;

class Desarrolladora extends Model
{
    protected $fillable = ['nombre', 'distribuidora_id'];

    public function distribuidora()
    {
        return $this->belongsTo(Distribuidora::class);
    }

    public function videojuegos()
    {
        return $this->hasMany(Videojuego::class);
    }
}

// Videojuego.php:

php

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    protected $fillable = ['titulo', 'anyo', 'desarrolladora_id'];

    public function desarrolladora()
    {
        return $this->belongsTo(Desarrolladora::class);
    }

    public function posesiones()
    {
        return $this->hasMany(Posecion::class);
    }
}

// Posesion.php:

php

use Illuminate\Database\Eloquent\Model;

class Poseion extends Model
{
    protected $table = 'poseiones';
    protected $primaryKey = ['videojuego_id', 'user_id'];
    public $incrementing = false;
    protected $fillable = ['videojuego_id', 'user_id'];

    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}