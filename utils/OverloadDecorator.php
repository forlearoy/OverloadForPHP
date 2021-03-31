<?php


// namespace utils;

// use ReflectionFunction;

class OverloadDecorator
{
    private $_origin;

    public function __construct($origin)
    {
        $this->_origin = $origin;
    }

    function __call($name, $arguments)
    {
        call_user_func_array($this->_origin->$name, $arguments);
    }

    function bindOverloadMethod($methodName, $func)
    {
        $originObject = clone $this->_origin;
        $this->_origin->$methodName = function () use ($func, $originObject, $methodName)
        {
            $formalParamsCount = (new ReflectionFunction($func))->getNumberOfParameters();
            $actualParamsCount = func_num_args();
            if($formalParamsCount === $actualParamsCount)
                return call_user_func_array($func, func_get_args());

            return $originObject->$methodName;
        };
    }

}
