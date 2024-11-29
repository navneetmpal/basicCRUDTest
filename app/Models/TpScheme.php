<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TpScheme extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['tp', 'code', 'tp_scheme_no', 'scheme_date'];
}
