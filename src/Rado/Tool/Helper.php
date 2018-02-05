<?php

declare(strict_types=1);

namespace Rado\Tool;

/**
 * Klasa odpowiedzialna za pomocnicze metody, na ktore nie zdecydowalismy sie zrobic osobnych klas.
 */
class Helper
{
	/**
	 * Metoda znajduje w kodzie HTML nazwy plikow, ktore w tym kodzie koncza sie na .jpg.
	 *
	 * @param string $html kod HTML
	 *
	 * @return array
	 */
	public function extractFileNamesFromHtml(string $html): array
	{
		$matches = [];
		preg_match_all('/href="([0-9]+)\.jpg"/', $html, $matches);

		return $matches[1];
	}

	/**
	 * Metoda konwertuje tytul na adres URL przyjazny wyszukiwarkom i czlowiekowi.
	 *
	 * @param string $title tytuł filmu
	 *
	 * @return string
	 */
	public function convertTitleToUrl(string $title): string
	{
		return str_ireplace([' ', ':'], ['-', ''], mb_strtolower($title));
	}
}
