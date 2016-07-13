<?php namespace Laralist\Listmeta;

use Illuminate\Support\Facades\Facade as LSFacade;
class Facade extends LSFacade
{
    /**
     * Name of the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'meta';
    }
}