<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
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
}
