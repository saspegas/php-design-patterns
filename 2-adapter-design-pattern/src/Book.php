<?php

namespace App;

class Book implements InterfaceBook {

    public function open()
    {
        var_dump("karton kitap kapağı açılıyor...");
    }

    public function turnPage()
    {
        var_dump('karton kitap sayfası çevriliyor...');
    }

}