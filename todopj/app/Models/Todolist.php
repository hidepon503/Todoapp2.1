<?php

namespace App\Models;

use App\Http\Controllers\TaskController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $fillable = ['created_at', 'name'];

    public function users()
    {
        return $this->BelongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
