<?php

namespace App;

abstract class Doner {

    public function make() {
        return $this
            ->layBread()
            ->addMainPart()
            ->addLettuce()
            ->addKeychup();
    }

    protected function layBread() {
        var_dump("ekmek hazırlandı...\n");
        return $this;
    }

    protected function addLettuce() {
        var_dump("salata eklendi...\n");
        return $this;
    }   

    protected function addKeychup() {
        var_dump("ketçap sıkıldı...\n");
        return $this;
    }

    protected abstract function addMainPart();
}