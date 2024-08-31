<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'publication_year', 'unique_identifier'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
