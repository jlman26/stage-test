<?php

class Template
{
	/**
	 * Wrap the view in the website's template.
	 */
	public static function wrap(
		$view
	) {
		return '<!DOCTYPE>
			<html>
				<head>
					<title>Stage opdracht</title>
					<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.min.css">
				</head>
				<body>
					<div class="container py-5">
						' . $view . '
					</div>
					<script src="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/js/bootstrap.min.js">
				</body>
			</html>
		';
	}
}
