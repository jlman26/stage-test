<?php

class Loader
{
	/**
	 * Include all files in the directory and sub directories.
	 */
	public static function loadFilesIn($path)
	{
		self::_loadFilesInRecursive($path);
	}

	private static function _loadFilesInRecursive(
		$path
	) {
		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle))) {
				$subPath = $path . DIRECTORY_SEPARATOR . $file;
				if (
					is_dir($subPath)
					&& $file !== '.'
					&& $file !== '..'
				) {
					self::_loadFilesInRecursive($subPath);
				} elseif (strstr($file, '.php') !== false) {
					include_once($subPath);
				}
			}
			closedir($handle);
		} else {
			die('Unable to read directory: ' . $path);
		}
	}
}
