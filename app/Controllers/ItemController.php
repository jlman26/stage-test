<?php

class ItemController
{
	public static function add(
		$title,
		$content,
		$status
	) {
		$item = [
			'title' => $title,
			'content' => $content,
			'status' => $status,
		];

		// TODO: Voeg het nieuwe item toe aan de sessie zodat deze door de getAll functie hieronder opgehaald kunnen worden.
		// Session::?

		Session::set('items', $item);
	}

	public static function getAll()
	{
		return array_reverse(
			Session::get('items')
		);
	}
}
