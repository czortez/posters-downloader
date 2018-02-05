<?php

/**
 * Prosta aplikacja mająca na celu przedstawienie możliwości programowania
 * obiektowego przy wsparciu composera jako rozwiązania oferującego autoloader.
 */

// zwróć uwagę na to, że deklaracja trybu strict znajduje się w każdym pliku
declare(strict_types=1);

// poniższa linia ładuje plik autoloadera, który odpowiada za używanie
// klas w skonfigurowany w pliku composer.json sposób
require __DIR__ . '/vendor/autoload.php';

// niniejszy plik index.php jest plikiem uruchomieniowym, tworzymy tutaj
// obiekt główny całej aplikacji i wskazujemy, jakie elementy będziemy pobierali
$app = new \Rado\App\Kernel();
$app->run(['posters', 'shots']);
