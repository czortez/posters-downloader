<?php

declare(strict_types=1);

namespace Rado\App;

use Rado\Tool\Helper;
use Rado\FileDownloader;

/**
 * Klasa odpowiedzialna za start i obsluge aplikacji.
 */
class Kernel
{
    /**
     * Konfiguracja aplikacji.
     *
     * @var Rado\App\Config
     */
    private $config;

    /**
     * Obiekt z metodami pomocniczymi.
     *
     * @var Rado\Tool\Helper
     */
    private $helper;

    /**
     * Instancja loggera.
     *
     * @var Rado\App\Logger
     */
    private $logger;

    /**
     * Metoda odpowiada za konfigurację aplikcji.
     */
    public function configure(): void
    {
        $this->helper = new Helper();
        $this->config = new Config();
        $this->logger = new Logger();
        $this->logger->setConfig($this->config);
    }

    /**
     * Stworzenie głównego obiektu aplikacji.
     *
     * @return Rado\FileDownloader
     */
	public function createFileDownloader(): FileDownloader
	{
        $fileDownloader = new FileDownloader();
        $fileDownloader
            ->setLogger($this->logger)
            ->setConfig($this->config)
            ->setHelper($this->helper)
        ;

		return $fileDownloader;
	}

    /**
     * Metoda uruchomieniowa aplikacji.
     *
     * @param string[] $types tablica typów zdjęć, które zostaną pobrane
     */
	public function run(array $types): void
	{
		$this->configure();
		$fileDownloader = $this->createFileDownloader();
	
        foreach ($types as $type) {
            $fileDownloader->downloadFiles($this->config->getTitles(), $type);
        }	
	}
}
