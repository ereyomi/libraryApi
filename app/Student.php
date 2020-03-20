<?php

namespace App;

use App\Book;

// use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    //
    public function books()
    {
    	return $this->hasMany(Book::class);
    }
}
