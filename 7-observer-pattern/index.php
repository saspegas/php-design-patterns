<?php 

interface Subject {
    public function attach($observable);
    public function detach($observer);
    public function notify();
}

interface Observer {
    public function handle();
}

class Login implements Subject {

    protected $observers = [];

	public function attach($observable) {

        if (is_array($observable)) {
            foreach ($observable as $observer) {
                if (! $observer instanceof Observer) {
                    throw new Exception;
                }
                $this->attach($observer);
            }

            return;
        }

        $this->observers[] = $observable;

        return $this;
	}

	public function detach($index) {
        unset($this->observers[$index]);
	}
	
	public function notify() {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
	}
}

class LogHandler implements Observer {
	public function handle() {
        var_dump('log handler calisti...');
	}
}

class EmailNotifier implements Observer {
	public function handle() {
        var_dump('email notifier calisti...');
	}
}

$login = new Login();

$observer1 = new LogHandler();
$observer2 = new EmailNotifier();

// tek tek ekleme yapabiliriz.
// $login->attach($observer1)->attach($observer2);

// veya direkt array gönderebiliriz.
$login->attach([
    $observer1,
    $observer2,
]);

$login->notify();