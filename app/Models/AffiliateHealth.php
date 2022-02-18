<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateHealth extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'affiliate_health';

    protected $guarded = [];
}
