<?php

namespace App;

use App\College;
use App\Student;
use App\Librarian;
use\Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public $table = 'books';
    
    const AVAILABLE = 1, 
    NOT_AVAILABLE = 0;

    protected $fillable = [
    	'name',
        'user_id',
    	'description',
    	'isbn',
        'college_id',
    	'status',
    	'cover',
        'rating',
    ];

    public function isAvailble()
    {
    	return $this->status == Book::AVAILABLE;
    }

    public static function generateIsbn()
    {
        return mt_rand(1000000000000000, 9999999999999999);
    }

    //relationships
    public function College()
    {
        return $this->belongsTo(College::class);
    }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }

    public function librarian()
    {
        return $this->belongsTo(Librarian::class);
    }
}
