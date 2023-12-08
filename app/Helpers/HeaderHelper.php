<?php


namespace App\Helpers;
use Request;
use App\Models\MetaTag;

class HeaderHelper
{

    public static function getMeta($page)
    {
        // dd($page);
    	$meta = MetaTag::where('status','Y')
                ->where('page_name', $page)
                ->first();

                // dd($meta);

        return $meta;
    }

}
