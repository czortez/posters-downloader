<?php

declare(strict_types=1);

namespace Rado\App;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

/**
 * Klasa odpowiedzialna za logowanie do plikow tekstowych.
 */
class Logger
{
	/**
	 * Obiekt konfiguracji aplikacji.
	 *
	 * @var \Rado\Config
	 */
	private $config;
	private $monolog;


    /**
     * Metoda ustawia konfigurację.
     *
     * @param Rado\App\Config $config obiekt konfiguracji
     *
     * @return Rado\Logger
     */
    public function setConfig(Config $config): Logger
    {
			$this->config = $config;
			$this->monolog = new MonologLogger("Filmoteka");
			$this->monolog->pushHandler(new StreamHandler($this->config->getLogFile(),MonologLogger::DEBUG));

            return $this;
    }

	/**
	 * Metoda zapisujaca wiadomosc do logow.
	 *
	 * @param string $message tresc wiadomosci do zapisania
	 */
	public function saveLog(string $message): void
	{
		$this->monolog->debug($message);
	}
}
