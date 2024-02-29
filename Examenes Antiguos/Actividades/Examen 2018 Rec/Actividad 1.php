<?php 

//  Generar el CRUD básico de álbumes, canciones y artistas, teniendo en cuenta
// que se debe impedir borrar un álbum, una canción o un artista si ello provocara una
// violación de la integridad referencial

/*

    Migración para la tabla de álbumes (albums):

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('albums');
    }
}

    Migración para la tabla de canciones (songs):

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
}

    Migración para la tabla de artistas (artists):

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('artists');
    }
}

    Migraciones para las tablas pivot:

Por ejemplo, si deseas una relación muchos a muchos entre usuarios y artistas para representar qué artistas sigue un usuario, podrías tener una migración así:

php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistUserTable extends Migration
{
    public function up()
    {
        Schema::create('artist_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('artist_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->primary(['user_id', 'artist_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('artist_user');
    }

*/

// Modelo de Álbum (Album)


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title', 'artist_id']; 
    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}

// Modelo de Canción (Song)



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['title', 'album_id']; 

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}

// Modelo de Artista (Artist)


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name']; 

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}

// Con estas relaciones definidas en tus modelos, se puede acceder 
// fácilmente a las relaciones entre álbumes, canciones y artistas en  Laravel. 



// Obtener todas las canciones de un álbum
$album = Album::find(1);
$songs = $album->songs;

// Obtener el artista de un álbum
$artist = $album->artist;

// Obtener todos los álbumes de un artista
$artist = Artist::find(1);
$albums = $artist->albums;

// Obtener el álbum al que pertenece una canción
$song = Song::find(1);
$album = $song->album;