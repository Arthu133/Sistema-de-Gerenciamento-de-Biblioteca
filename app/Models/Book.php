<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Book extends Model
{
    protected $fillable = ['title', 'publication_year', 'unique_identifier'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
    protected static function boot()
    {
    parent::boot();

    static::creating(function ($book) {
        if (empty($book->unique_identifier)) {
            $book->unique_identifier = (string) Str::uuid();
        }
    });
}

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
