<?php

class Session
{
	/**
	 * Ensure a session exists, if not create it.
	 */
	private static function _ensureSession()
	{
		if (session_id() === '') {
			session_start();

			// Populate items on first load.
			if (
				!array_key_exists('PHPSESSID', $_COOKIE)
				|| empty($_COOKIE['PHPSESSID'])
			) {
				static::push('items', [
					'id' => uniqid(),
					'title' => 'Stage opdracht',
					'content' => 'Opdracht voor NC-Websites afronden zodat ik een geweldige stage zal hebben!',
					'status' => 'doing',
				]);
			}
		}
	}

	/**
	 * Get the data at the given path.
	 */
	private static function &_traversePath(
		&$sessionReference,
		$pathSegments
	) {
		foreach ($pathSegments as $segment) {
			if (!array_key_exists($segment, $sessionReference)) {
				$sessionReference[$segment] = [];
			}
			$sessionReference = &$sessionReference[$segment];
		}
		return $sessionReference;
	}

	/**
	 * Check whether the data at the path in the session is empty or not.
	 */
	public static function empty(
		$path
	) {
		static::_ensureSession();

		$pathSegments = explode('.', $path);
		$sessionReference = &static::_traversePath(
			$_SESSION,
			array_slice($pathSegments, 0, -1),
		);
		$lastSegment = end($pathSegments);

		if (array_key_exists($lastSegment, $sessionReference)) {
			unset($sessionReference[$lastSegment]);
			return true;
		}

		return false;
	}

	/**
	 * Check whether the data at the path in the session exists or not.
	 */
	public static function has(
		$path
	) {
		static::_ensureSession();

		$pathSegments = explode('.', $path);
		$sessionReference = &$_SESSION;
		foreach ($pathSegments as $segment) {
			if (!array_key_exists($segment, $sessionReference)) {
				return false;
			}
			$sessionReference = &$sessionReference[$segment];
		}

		return true;
	}

	/**
	 * Get the data at the path in the session.
	 */
	public static function get(
		$path
	) {
		static::_ensureSession();

		$pathArray = explode('.', $path);
		$sessionReference = &$_SESSION;

		foreach ($pathArray as $segment) {
			if (!array_key_exists($segment, $sessionReference)) {
				return null;
			}
			$sessionReference = &$sessionReference[$segment];
		}

		return $sessionReference;
	}

	/**
	 * Set the data at the path in the session.
	 */
	public static function set(
		$path,
		$value
	) {
		static::_ensureSession();

		$pathSegments = explode('.', $path);
		$sessionReference = &static::_traversePath(
			$_SESSION,
			array_slice($pathSegments, 0, -1),
		);
		$lastSegment = end($pathSegments);

		$sessionReference[$lastSegment] = $value;
	}

	/**
	 * Append an item to the data at the path in the session.
	 */
	public static function push(
		$path,
		$value
	) {
		static::_ensureSession();

		$pathSegments = explode('.', $path);
		$sessionReference = &static::_traversePath(
			$_SESSION,
			$pathSegments,
		);

		if (!is_array($sessionReference)) {
			if (empty($sessionReference)) {
				$sessionReference = [];
			} else {
				$sessionReference = [
					$sessionReference,
				];
			}
		}

		array_push($sessionReference, $value);
		static::set($path, $sessionReference);
	}

	/**
	 * Get and remove the last item at the path in the session.
	 */
	public static function pop(
		$path
	) {
		static::_ensureSession();

		$pathSegments = explode('.', $path);
		$sessionReference = &static::_traversePath(
			$_SESSION,
			$pathSegments,
		);

		if (
			is_array($sessionReference)
			&& !empty($sessionReference)
		) {
			return array_pop($sessionReference);
		}

		return null;
	}

	/**
	 * Prepend an item to the data at the path in the session.
	 */
	public static function unshift(
		$path,
		$value
	) {
		$pathSegments = explode('.', $path);
		$sessionReference = &static::_traversePath(
			$_SESSION,
			$pathSegments,
		);

		if (!is_array($sessionReference)) {
			if (empty($sessionReference)) {
				$sessionReference = [];
			} else {
				$sessionReference = [
					$sessionReference,
				];
			}
		}

		array_unshift($sessionReference, $value);
		static::set($path, $sessionReference);
	}

	/**
	 * Get and remove the first item at the path in the session.
	 */
	public static function shift(
		$path
	) {
		$pathSegments = explode('.', $path);
		$sessionReference = &static::_traversePath(
			$_SESSION,
			$pathSegments,
		);

		if (
			is_array($sessionReference)
			&& !empty($sessionReference)
		) {
			return array_shift($sessionReference);
		}

		return null;
	}
}
