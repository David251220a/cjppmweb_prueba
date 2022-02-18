<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ley5189 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ley_5189';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Ley5189Items::class, 'document_id')->orderByDesc('year')->orderByDesc('month');
    }
}
