<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'loan_request';

    protected $guarded = [];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliate_id');
    }

    public function status()
    {
        return $this->belongsTo(LoanStatus::class, 'status_id');
    }

    public function logs()
    {
        return $this->hasMany(LoanLog::class, 'loan_id')->orderByDesc('created_at');
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function files()
    {
        return $this->hasMany(LoanFile::class, 'loan_id');
    }
}
