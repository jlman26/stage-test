<?php

// Load all required files.
include_once('.' . DIRECTORY_SEPARATOR . 'Services' . DIRECTORY_SEPARATOR . 'Loader.php');
Loader::loadFilesIn('Services');
Loader::loadFilesIn('Controllers');
Loader::loadFilesIn('Views');
Loader::loadFilesIn('Routes');

// Add all routes.
Router::add('item_create', CreateRoute::class);
Router::add(null, IndexRoute::class);

// Navigate using router.
Router::navigate();
