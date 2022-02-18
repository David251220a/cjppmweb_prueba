<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affiliate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'affiliate';

    protected $guarded = [];

    public function address()
    {
        return $this->hasMany(AffiliateAddress::class, 'affiliate_id', 'id')->orderByDesc('id');
    }

    public function health()
    {
        return $this->hasMany(AffiliateHealth::class, 'affiliate_id', 'id')->orderByDesc('id');
    }

    public function job()
    {
        return $this->hasMany(AffiliateJob::class, 'affiliate_id', 'id')->orderByDesc('id');
    }

    public function reference()
    {
        return $this->hasMany(AffiliateReference::class, 'affiliate_id', 'id')->orderByDesc('id');
    }

    public function type()
    {
        return $this->hasOne(AffiliateType::class, 'id', 'type_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'username', 'document_number');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }
}
