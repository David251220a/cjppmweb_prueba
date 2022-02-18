<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ley2991 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ley_2991';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Ley2991Items::class, 'document_id')->orderByDesc('year')->orderByDesc('month');
    }
}
