<?php

namespace NonPublicAccess;

/**
 * Utilities for accessing protected and private methods by reflection.
 */
trait NonPublicAccessTrait {

  /**
   * Get accessible method from protected method.
   *
   * @param string $className
   *   Name of class in which method is defined.
   * @param string $methodName
   *   Name of method.
   *
   * @return ReflectionMethod
   *   Method within reflection class.
   */
  protected static function getNonPublicMethod(string $className, string $methodName) {
    $class = new \ReflectionClass($className);
    $method = $class->getMethod($methodName);
    $method->setAccessible(TRUE);
    return $method;
  }

  /**
   * Invoke protected method as a reflection method.
   *
   * @param string $className
   *   Name of class in which method is defined.
   * @param string $methodName
   *   Name of method.
   * @param array|null $params
   *   (optional) Parameters passed to the method.
   *
   * @return mixed
   *   Result of the invoked method.
   */
  public function invokeNonPublicMethod(string $className, string $methodName, ...$params) {
    $method = static::getNonPublicMethod($className, $methodName);
    $object = new $className();
    return $method->invoke($object, ...$params);
  }

}
