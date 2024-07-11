<?php
session_start();

class DeleteRoute {
    public static function post() {
        // Get the item ID from the request.
        $id = $_POST['id'] ?? '';

        // Call the delete method in ItemView with the item ID
        ItemView::delete($id);
        
    }
}


?>
