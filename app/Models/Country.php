<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Country extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'country';
    protected $fillable = [
        'name','flag', 'code', 'country_id'
    ];
//    public function books(): \Illuminate\Database\Eloquent\Relations\HasMany
//    {
//
//        return $this->hasMany(Book::class, 'book_id');
//    }
//    public static function isnotstring($country){
//
//        if(gettype($country) == "object"){
//            return true;
//        }else {
//            return false;
//        }
//    }
    public static function getcountry()
    {
        return Country::all();
    }

}
