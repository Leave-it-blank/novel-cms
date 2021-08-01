<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "chapters";
    protected $dates = ['deleted_at'];
    protected $fillable= ['name', 'number', 'locked', 'volume_id'];
    /**
     * @var mixed
     */


    public function Volume(){

        return $this->belongsTo(Volume::class, 'volume_id');

    }

    public static function Admin_Get_Chapter($id)
    {
        $volume = Volume::find($id);  // safer
        return Chapter::where('volume_id', $volume->id);
    }
}
