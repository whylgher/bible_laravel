<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    /**
     * Get all of the versoes for the Idioma
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versoes()
    {
        return $this->hasMany(Versao::class);
    }
}
