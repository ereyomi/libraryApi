<?php

namespace App;

use App\Book;

class Librarian extends User
{
    //
    public function books()
    {
    	return $this->hasMany(Book::class);
    }
}
