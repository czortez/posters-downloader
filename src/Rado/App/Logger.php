<?php

declare(strict_types=1);

namespace Rado\App;

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

            return $this;
    }

	/**
	 * Metoda zapisujaca wiadomosc do logow.
	 *
	 * @param string $message tresc wiadomosci do zapisania
	 */
	public function saveLog(string $message): void
	{
		$dateTime = new \DateTime('now');
		$messageToLog = $dateTime->format('Y-m-d H:i:s');
		$messageToLog .= " {$message}";
		$messageToLog .= PHP_EOL;

		file_put_contents($this->config->getLogFile(), $messageToLog, FILE_APPEND);
	}
}
