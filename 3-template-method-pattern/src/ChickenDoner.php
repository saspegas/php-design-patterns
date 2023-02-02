<?php

namespace App;

class ChickenDoner extends Doner {
    
    protected function addMainPart() {
        var_dump("tavuk döner eklendi...\n");
        return $this;
    }   
}