<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'posicao',
        'abreviacao',
        'testamento_id'
    ];

    /**
     * Get the testamento that owns the Livros
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function testamento()
    {
        return $this->belongsTo(Testamento::class);
    }

    /**
     * Get all of the versiculo for the Livros
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versiculos()
    {
        return $this->hasMany(Versiculo::class);
    }
}
