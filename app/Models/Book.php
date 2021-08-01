<?php /** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Livewire\WithPagination;
use phpDocumentor\Reflection\DocBlock\Description;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed title
 */
class Book extends Model implements HasMedia,  Searchable
{
    use InteractsWithMedia;
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    use Notifiable;
    protected $table = "books";
    protected $hidden = [
        'deleted_at',
    ];
    protected $fillable = [
        'title', 'description', 'author', 'artist', 'thumbnail', 'url', 'slug', 'title_slug', 'is_novel', 'mature', 'locked', 'hidden'
    ];
    protected $dates = [ 'deleted_at' ];
    public function sluggable(): array
    {
        return ['title_slug' => ['source' => 'title']];
    }

    public function Country()
    {
        return $this->hasOne(Modelhascountry::class, 'book_id');
    }
    public function Country_delete(Book $book)
    {
         $temp = Modelhascountry::where('book_id', $book->id)->first();
         $temp->delete();
         return true;
    }
    public function Country_Details(Book $book) // taking the book model
    {
        return Modelhascountry::query()->where('book_id', $book->id)->first();
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.library', $this->title_slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title_slug,
            $url
        );
    }
    public function Volumes(){

        return $this->hasMany(Volume::class, 'book_id');
    }

    public function admin_get_url(Book $book)
    {
        return route('');

    }

    public function book()
    {
        return Book::all();
    }

    //reader accessing data

    public static function getbooks(){
        return Book::get();
    }
    public static function getcomics(){
        return Book::where('is_novel', 0)->take(6)
            ->get();
    }
    public static function getnovels(){
        return Book::where('is_novel', 1)->take(6)
            ->get();
    }
    //reader data query ends

}
