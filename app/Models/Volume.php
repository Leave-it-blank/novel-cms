<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Volume extends Model
{
    use AuthorizesRequests;
    use HasFactory;
    use SoftDeletes;

    protected $table = "volumes";
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'number', 'locked', 'book_id'];
    /**
     * @var mixed
     */
    private $id;

    public function Book()
    {

        return $this->belongsTo(Book::class, 'book_id');

    }

    public static function Admin_Get_Volume($id)
    {

        $book = Book::find($id);
        return Volume::where('book_id', $book->id);

    }
}
