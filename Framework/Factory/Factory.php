<?php
namespace Framework\Factory;

class Factory
{

    private static $obj_instance_list;

    public static function getClassInstance(string $class_name)
    {
        if (! isset(self::$obj_instance_list[$class_name])) {
            $arguments = func_get_args();
            self::$obj_instance_list[$class_name] = call_user_func_array("self::createNewInstance", $arguments);
        }
        return self::$obj_instance_list[$class_name];
    }

    public static function createNewInstance(string $class_name)
    {
        if (! class_exists($class_name)) {}
        $ref = new \ReflectionClass($class_name);
        $arguments = func_get_args();
        unset($arguments[0]);
        return $arguments ? $ref->newInstanceArgs($arguments) : new $class_name();
    }
}