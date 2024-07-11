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
		// DONE: Geef een item weer, zorg dat hier de titel, omschrijving en status getoond worden.
		$title = htmlspecialchars($item['title']);
		$content = htmlspecialchars($item['content']);
		$status = htmlspecialchars($item['status']);
		$id = $item['id']; 

        return "
		<form method='post' action='index.php?action=item_delete'>
        <div class='item card mb-3' data-id='{$id}'>
            <div class='card-body'>
                <button type='submit' class='close' aria-label='Close'>X</button>
                <h2 class='card-title'>{$title}</h2>
                <p class='card-text'>{$content}</p>
                <p class='card-text'><small class='text-muted'>Status: {$status}</small></p>
				<p class='card-text'><small class='text-muted'>IDs: {$id}</small></p>
                <input type='hidden' name='id' value='{$id}'>
            </div>
        </div>
		</form>
    ";
	}
	public static function delete($id) {
		// Iterate over the session items array to find the item with the matching ID

		foreach ($_SESSION['items'] as $key => $item) {
			if ($item['id'] === $id) {
				
				// Delete the item with the matching ID
				unset($_SESSION['items'][$key]);
				
				// Redirect to index.php after deletion
				
				header('Location: index.php');
				exit; // Ensure script execution stops after the redirect
			}
		}
		
		echo "Item with ID $id not found in the session array.";
	}
}
	

	


	



