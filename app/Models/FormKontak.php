<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormKontak extends Model
{
    use HasFactory;

    protected $table    = 'form_kontaks';
    protected $fillable = ['nama', 'email', 'no_telepon', 'pesan'];
}
