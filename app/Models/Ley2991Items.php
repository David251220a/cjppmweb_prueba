<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ley2991Items extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ley_2991_items';

    protected $guarded = [];

    public function document()
    {
        return $this->BelongsTo(Ley2991::class, 'document_id');
    }
}
