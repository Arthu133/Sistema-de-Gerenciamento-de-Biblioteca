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
    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->unique_identifier = $model->unique_identifier ?? (string) \Illuminate\Support\Str::uuid();
    });
}

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
