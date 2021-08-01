<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelhascountry extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name','flag', 'code', 'country_id' , 'book_id', 'user_id'
    ];
    protected $table = 'model_has_country';

}
