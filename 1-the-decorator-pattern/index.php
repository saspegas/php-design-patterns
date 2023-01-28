<?php

interface CarService {
    public function getCost();
}

class BasicInspection implements CarService {
    public function getCost()
    {
       return 300;
    }
}

class OilChange implements CarService {
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    } 

    public function getCost()
    {
        return 250 + $this->carService->getCost();
    }
}

class TireRotation {
    protected $carService;

    function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost() {
        return 100 + $this->carService->getCost();
    }
}


echo (new BasicInspection())->getCost();
echo PHP_EOL;

echo (new OilChange(new BasicInspection))->getCost();
echo PHP_EOL;

echo (new TireRotation(new OilChange(new BasicInspection)))->getCost();
echo PHP_EOL;

echo (new TireRotation(new BasicInspection))->getCost();
echo PHP_EOL;








