<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Request;

class languageMiddleware
{
	
	public static $languages = ['en', 'ru'];
	
	public static function getLocale()
	{
		$uri = Request::path(); //получаем URI 

		$segmentsURI = explode('/',$uri);
		
		if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], self::$languages)) {
		    return App::setLocale($segmentsURI[0]);
		}
		
		return null;
	}

	public function handle($request, Closure $next)
	{
		return $next($request);
	}
}
