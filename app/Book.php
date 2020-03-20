<?php

namespace App;

use App\College;
use App\Student;
use App\Librarian;

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
