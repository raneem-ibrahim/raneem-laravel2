<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class contact extends Model
{
    use HasFactory;
    // raneem
    use Notifiable;
    protected $fillable = ['name','email','phone','message'];
}
