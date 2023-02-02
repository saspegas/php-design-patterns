<?php

use App\ChickenDoner;
use App\MeatDoner;

require 'vendor/autoload.php';

(new ChickenDoner())->make();
(new MeatDoner())->make();