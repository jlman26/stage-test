<?php

class CreateRoute
{
	public static function get($get) {
		// TODO: Geef het formulier weer om een nieuw item mee toe te voegen. (Vergeet niet op het formulier `method="post"` te zetten!)
		
		return 
		'<form method="post" action="index.php?action=item_create">
		<div class="form-group" mb-3>
		<label for="titel">Vul de titel in</label>
		<br>
		<input type="text" name="title" required>
		</div>
		
		<div class="form-group" mb-3>
		<label for="content">Vul de beschrijving in</label>
		<br>
		<input type="text" name="content" required> 
		</div>
		
		<div class="form-group" mb-3>
		<label for="status">Vul de status in</label>
		<br>
		<input type="text" name="status" required>
		</div>
		
		<input type="submit" value="Verzenden">
		</form>';
	
		}
	

	
		public static function post($get, $post) {
			session_start();
		
			$_SESSION['items'][] = [
				'title' => htmlspecialchars($post['title']),
				'content' =>  htmlspecialchars($post['content']),
				'status'=> htmlspecialchars($post['status'])
				
			];

		
			// Redirect the user to the index.php page
			header('Location: index.php');
			exit();
			// TODO: Sla het nieuwe item op en stuur de gebruiker terug naar het overzicht van alle items. Wist je dat je iemand kan doorsturen die de "Location" header, voor meer informatie bekijk de documentatie: https://www.php.net/manual/en/function.header.php?
		}


}
