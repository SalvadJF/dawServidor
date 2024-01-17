<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Articulo extends Model
{
    use HasFactory;

    const MIME_IMAGEN = 'png';

    private function imagen_url_relativa()
    {
        return '/uploads/' . $this->imagen;
    }

    private function mini_url_relativa()
    {
        return '/uploads/' . $this->mini;
    }

    protected $fillable =['denominacion', 'precio', 'categoria_id', 'iva_id', 'descripcion', 'stock'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function iva(): BelongsTo
    {
        return $this->belongsTo(Iva::class);
    }

    public function getPrecioIiAttribute()
    {
        return $this->precio * (1 + $this->iva->por / 100);
    }

    public function deseadoPorUsuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function facturas(): BelongsToMany
    {
        return $this->belongsToMany(Factura::class)->withPivot('cantidad');
    }

    public function getImagenAttribute()
    {
        return $this->id . '.' . self::MIME_IMAGEN;
    }

    public function getMiniAttribute()
    {
        return $this->id . '_mini.' . self::MIME_IMAGEN;
    }

    public function getImagenUrlAttribute()
    {
        return Storage::url(mb_substr($this->imagen_url_relativa(), 1));
    }

    public function getMiniUrlAttribute()
    {
        return Storage::url(mb_substr($this->mini_url_relativa(), 1));
    }

    public function existeImagen()
    {
        return Storage::disk('public')->exists($this->imagen_url_relativa());
    }

    public function existeMini()
    {
        return Storage::disk('public')->exists($this->mini_url_relativa());
    }

}
