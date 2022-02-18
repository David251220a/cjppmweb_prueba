<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'affiliate_type';

    protected $guarded = [];
}
