<?php

require 'vendor/autoload.php';

use App\Book;
use App\InterfaceBook;
use App\Kindle;
use App\KindleAdapter;

class Person {
    public function read(InterfaceBook $book)
    {
        $book->open();
        $book->turnPage();
    }
}


//$book = new Book;
$book = new KindleAdapter(new Kindle);

$person = new Person();
$person->read($book);