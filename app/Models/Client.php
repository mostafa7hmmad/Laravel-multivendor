<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $guarded=['id'];
    protected $fillable = ['name','email','phone','price'];

    public function cats(){

        return $this->belongsToMany(Cat::class);
    }
    use HasFactory;
}
