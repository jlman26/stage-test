<?php

class ItemController
{
	public static function add(
		$id,
		$title,
		$content,
		$status
	) {
		$item = [
			'id' => uniqid(),
			'title' => $title,
			'content' => $content,
			'status' => $status,
		];

		// DONE: Voeg het nieuwe item toe aan de sessie zodat deze door de getAll functie hieronder opgehaald kunnen worden.
		// Session::?

		Session::set('items', $item);
		
	}
	
	public static function getAll()
	{
		$items = Session::get('items');
	
		if ($items === null) {
			// Handle the case where items are null
			
		}
	
		return array_reverse($items);
		
	}
}