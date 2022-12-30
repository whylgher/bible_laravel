<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    // public $timeStamps = false;


    /**
     * Get all of the livros for the Testamento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function livros()
    {
        return $this->hasMany(Livro::class);
    }

}
