<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $table = 'rayons';
    protected $guarded = ['id'];

    public function students()
    {
        return $this->hasMany(Student::class, 'rayon_id', 'id');
    }

    public function scopeByName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function getFormattedNameAttribute()
    {
        return strtoupper($this->name);
    }
}
