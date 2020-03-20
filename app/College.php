<?php

namespace App;

use App\Book;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    public function books()
    {
    	return $this->hasMany(Book::class);
    }
}
