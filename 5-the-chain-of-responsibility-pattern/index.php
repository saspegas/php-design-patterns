<?php

abstract class HomeChecker {
    
    protected $successor;
    
    public abstract function check(HomeStatus $homeStatus);

    public function succeedWith(HomeChecker $checker) {
        $this->successor = $checker;
    }

    public function next(HomeStatus $homeStatus) {
        if ($this->successor)
        {
            $this->successor->check($homeStatus);            
        }
    }
}

class Lights extends HomeChecker {
    public function check(HomeStatus $homeStatus)
    {
        if (! $homeStatus->lightsOff) {
            throw new Exception('Işıklar açık, çıkamazsınız!');
        }

        $this->next($homeStatus);
    }
}

class Alarm extends HomeChecker {
    public function check(HomeStatus $homeStatus)
    {
        if (! $homeStatus->alarmanOn) {
            throw new Exception('Alarm açık değil, çıkamazsınız!');
        }

        $this->next($homeStatus);
    }
}

class Door extends HomeChecker {
    public function check(HomeStatus $homeStatus)
    {
        if (! $homeStatus->doorLocked) {
            throw new Exception('Kapı kilitli değil, çıkamazsınız!');
        }
    }
}

// evin durumu gösteren sınıf. evdeki cihazlardan gelen bilgi olabilir, veritabanında olabilir.
// örnek olduğu için kendimiz elle giriyoruz (hard code)
// true ve false değerlerini değiştirerek test edebilirsiniz.
class HomeStatus {
    public $lightsOff = true;
    public $alarmanOn = true;
    public $doorLocked = true;
}

// nesneleri oluşturuyoruz
$lights = new Lights();
$alarm = new Alarm();
$door = new Door();


// nesneleri sıraya göre bağlıyoruz
$lights->succeedWith($alarm);
$alarm->succeedWith($door);

// ilk nesne ile başlatıyoruz
$lights->check(new HomeStatus());

// kontroller geçerse bu satıra ulaşacak
echo "Hata vermedi... Çıkabilirsiniz...";