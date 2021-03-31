<?php


// namespace utils;


// use Exception;
// use ReflectionFunction;

trait OverloadTrait
{

    private static $funcList = [];

    function __call($name, $arguments)
    {
        call_user_func_array(static::$funcList[$name. count($arguments)], $arguments);
    }

    static function bindOverloadMethod($methodName, $func)
    {
        try
        {
            $formalParamsCount = (new ReflectionFunction($func))->getNumberOfParameters();
            static::$funcList[$methodName . $formalParamsCount] = function () use ($func, $methodName)
            {
                return call_user_func_array($func, func_get_args());
            };
        }
        catch(Exception $e)
        {
            print_r($e);
        }
    }

}
