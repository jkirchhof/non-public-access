# NonPublicAccess

A tiny utility library for accessing protected and private methods by reflection.

Primary use case is intended to be unit testing of protected/private methods.  Most other uses are bad ideas.

## Usage

Currently, the library is a single trait.  `use` it in a test class, and call with something like this:
```
public function testSomeMethod() {
  $result = self::invokeNonPublicMethod('\Namespace\Classname', 'someMethod');
  $this->assertEquals($result, "intended value");
}
```

## Requirements

PHP 7.0+

