<?php

namespace App\Models;

use App\Http\Controllers\PracticeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;
    protected $fillable = ['created_at','name'];
}
