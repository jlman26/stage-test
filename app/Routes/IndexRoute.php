<?php

class IndexRoute
{
	public static function get()
	{
		// Get all items from the controller.
		$items = ItemController::getAll();
		// Render all items out to a view.
		$view = ItemView::many($items);
		$view = '
			<h1>Todo lijst</h1>
			' . $view . '
			<a class="btn btn-primary" href="index.php?action=item_create">Taak toevoegen</a>
		';
		return $view;
	}

	
	
}


