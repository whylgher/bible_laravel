<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    use HasFactory;

    protected $table = 'versoes';

    protected $fillable = [
        'nome',
        'abreviacao',
        'idioma_id',
    ];

    /**
     * Get the idioma that owns the Versao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idioma()
    {
        return $this->belongsTo(Idioma::class);
    }

    /**
     * Get all of the livros for the Versao
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
