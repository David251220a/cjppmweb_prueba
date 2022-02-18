<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ley5189Items extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ley_5189_items';

    protected $guarded = [];

    public function document()
    {
        return $this->BelongsTo(Ley5189::class, 'document_id');
    }
}
