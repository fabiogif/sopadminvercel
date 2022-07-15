<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccurrenceImagens extends Model
{
    protected $fillable = ['occurrence_id', 'url'];
    use HasFactory;

}
