<?php

namespace App;

class MeatDoner extends Doner{

    protected function addMainPart() {
        var_dump("et döner eklendi...\n");
        return $this;
    }   
}