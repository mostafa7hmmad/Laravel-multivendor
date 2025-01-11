<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = [
        'name','img'
    ];
    protected $guarded = [
        'id', // for example, to protect the id attribute
          ];
    public function subcats(){

        return $this->hasMany(Subcat::class);
    }
    public function clients(){

        return $this->hasMany(Client::class);
    }

    use HasFactory;
}
