<?php

namespace App\Models;

use App\Models\Versao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'posicao',
        'abreviacao',
        'testamento_id',
        'versao_id',
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

    /**
     * Get the versao that owns the Versao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function versao()
    {
        return $this->belongsTo(Versao::class);
    }
}
