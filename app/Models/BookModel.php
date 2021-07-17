<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $returnType = 'array';

    protected $allowedFields = ['judul', 'slug', 'penulis', 'sampul', 'isi'];
    protected $useTimestamps = true;

    public function addView($slug){
        $this->where('slug', $slug)->increment('views', 1);
    }
}