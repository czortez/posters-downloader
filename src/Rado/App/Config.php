<?php

declare(strict_types=1);

namespace Rado\App;

/**
 * Klasa odpowiedzialna za dostarczenie konfiguracji do aplikacji.
 */
class Config
{
    /**
     * Plik z logami.
     *
     * @var string
     */
    private $logFile = 'logs/filmoteka.log';

    /**
     * Adres URL do plakatów filmów.
     *
     * @var string
     */
	private $postersUrl = 'https://cytaty.eu/img/sda/posters/';

	/**
	 * Adres URL do ujec z filmow.
	 *
	 * @var string
	 */
	private $shotsUrl = 'https://cytaty.eu/img/sda/shots/';

	/**
	 * Tabilca z tytułami filmów.
	 *
	 * @var string[]
	 */
	private $titles = [
		'Piraci z Karaibow',
		'Ring',
		'Blade Runner 2049',
		'Thor',
		'Get Out',
		'Star Wars Last Jedi',
		'Okja',
		'London',
		'Tarzan',
		'The Founder',
		'Kapitan Ameryka Civil War',
		'Spectre',
	];

	/**
	 * Pobranie nazwy pliku z logami.
	 *
	 * @return string
	 */
	public function getLogFile(): string
	{
		return $this->logFile;
	}

	/**
	 * Pobranie adresu URL do plakatów filmow.
	 *
	 * @return string
	 */
	public function getPostersUrl(): string
	{
		return $this->postersUrl;
	}

	/**
	 * Pobranie adresu URL do ujec z filmow.
	 *
	 * @return string
	 */
	public function getShotsUrl(): string
	{
		return $this->shotsUrl;
	}

	/**
	 * Pobranie tablicy z tytulami filmow.
	 *
	 * @return string[]
	 */
    public function getTitles(): array
    {
        return $this->titles;
	}

	/**
	 * Pomocnicza metoda zwracająca URL na podstawie typu.
	 *
	 * @param string $type typ listy, do której zostanie zwrócony adres URL
	 *
	 * @return string
	 */
	public function getUrl(string $type): string
	{
		if ($type === 'posters') {
			return $this->getPostersUrl();
		}

		return $this->getShotsUrl();
	}
}

