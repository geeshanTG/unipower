<?php
namespace App\Helpers;
use Request;
use App\Models\MetaTag;

class HeaderHelper
{

    public static function activateMenu($subject)
    {
    	$routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('@', $controllerAction);

        return ($subject == $controller) ? 'active' : '';

    }
    

    public static function getMeta($page)
    {
        // dd($page);
    	$meta = MetaTag::where('status','Y')
                ->where('page_name', $page)
                ->where('is_delete', 0)
                ->first();

                // dd($meta);

        return $meta;
    }

}
