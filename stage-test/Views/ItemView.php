<?php

class ItemView
{
	public static function many(
		$items
	) {
		$view = '<div class="items">';
		foreach ($items as $item) {
			$view .= static::one($item);
		}
		$view .= '</div>';

		return $view;
	}

	public static function one(
		$item
	) {
		// TODO: Geef een item weer, zorg dat hier de titel, omschrijving en status getoond worden.
		return '
			<div class="item">
				<h2>Hier komt de inhoud van een item!</h2>
			</div>
		';
	}
}
