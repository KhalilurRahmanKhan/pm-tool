<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = ['name','code','initiated_for','description','start_date','end_date','duration','project_owner','remarks','attachment'];


}
