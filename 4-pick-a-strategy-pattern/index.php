<?php

interface Logger {
    public function log($data);
}

class DatabaseLogger implements Logger {
    public function log($data) {
        echo "log database'ye kayıt edildi... data: $data";
    }
}

class FileLogger implements Logger {
    public function log($data) {
        echo "log file'ye kayıt edildi... data: $data";
    }
}

class WebServiceLogger implements Logger {
    public function log($data) {
        echo "log web service'e kayıt edildi... data: $data";
    }
}

// application
class App {
    public function log($data, Logger $logger = null) {
        $logger = $logger ?: new FileLogger();
        $logger->log($data);
    }
}

$app = new App();

$app->log(' 5 şubat ' , new WebServiceLogger); // webservice logger ile 5 şubat yazar...
$app->log(' 4 şubat '); // logger göndermedik, varsayılan olarak file logger ile 4 şubat yazar...