<?php

class ItemView
{
	public static function many($items) {
		$view = '<div class="items">';
		foreach ($items as $item) {
			$view .= static::one($item);
		}
		$view .= '</div>';

		return $view;
	}

	public static function one($item) {
		// TODO: Geef een item weer, zorg dat hier de titel, omschrijving en status getoond worden.
		$title = htmlspecialchars($item['title']);
		$content = htmlspecialchars($item['content']);
		$status = htmlspecialchars($item['status']);

		return "
            <div class='item card mb-3'>
                <div class='card-body'>
                    <h2 class='card-title'>{$title}</h2>
                    <p class='card-text'>{$content}</p>
                    <p class='card-text'><small class='text-muted'>Status: {$status}</small></p>
                </div>
            </div>
		";
		
	}

}


