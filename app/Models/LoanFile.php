<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'loan_files';

    protected $guarded = [];
}
