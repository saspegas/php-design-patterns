<?php

namespace App;

class Kindle implements InterfaceEReader {
    public function turnOn()
    {
        var_dump('cihaz açılıyor...');
    }

    public function pressPageButton()
    {
        var_dump('cihaz üzerinde sonraki sayfaya geçiliyor...');
    }
}