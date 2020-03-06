# PHP Fundamentals III -- Mar 2020
## Homework
* For Weds 4 March
  * Configure Apache JMeter
  * Configure Jenkins CI
* For Fri 6 March
  * Lab: Built-in Web Server
## TODO
* Find example re: binding of $this in anon funcs in PHP 7.4

## Resources
* PHP 7.4: https://github.com/phpcl/phpcl_jumpstart_php_7_4/blob/master/ffi_c_function.php
* OOP Examples: https://github.com/dbierer/classic_php_examples/tree/master/oop
* Article on ArrayObject: https://continuous-learning.com/php-7-4-the-strange-case-of-arrayobject/
* Article on DirectoryIterator: https://continuous-learning.com/grabbing-a-filtered-directory-tree-using-php-iteration/
* Example of FilterIterator: https://github.com/dbierer/php-iii-jul-2018/blob/master/spl_stacked_iterators.php
* More examples from another class: https://github.com/dbierer/php-iii-jul-2018
* General PHP 7.0 examples: https://github.com/dbierer/php7_examples/tree/master/php_7_0
* General PHP 7.1 examples: https://github.com/dbierer/php7_examples/tree/master/php_7_1

## Lab Notes
* Have a look at the Lab Notes from the previous class if you experience problems
  * https://github.com/dbierer/php-iii-may-2019
* Lab: Jenkins Freestyle Prerequisites:
  * When you add your user to a group, you **must logout** and the login again before the change is recognized!
* Lab: Apache JMeter:
  * Read up on what the HTTP test can do: https://jmeter.apache.org/usermanual/component_reference.html#HTTP_Request

## Updates
* http://localhost:8888/#/1/13: ??? :
  * All references to _Zend Framework_ change to _Laminas_;
  * _Zend Framework_ becomes _Laminas MVC_
  * _Apigility_ becomes _Laminas API Tools_
  * _Zend Expressive_ becomes _Mezzio_
  * _Stratigility_ is included in _Laminas Enterprise Components_
* http://localhost:8888/#/2/32: IteratorAggregate Interface :
```
require __DIR__ . '/../../../vendor/autoload.php';
use src\ModPhpAdvanced\PredefinedInterfaces\IteratorAggregate\IteratorAggregateCustom;
$obj = new IteratorAggregateCustom(['Mark', 'Watney', 'Martian']);

// Iterate each returned ArrayIterator instance
foreach($obj->getIterator() as $key => $value) {
    echo " $key => $value " . PHP_EOL;
}
```
* http://localhost:8888/#/4/14: `STOUT` s/be `STDOUT`

## Class Discussion
* Prototype for custom stream wrapper: https://www.php.net/manual/en/class.streamwrapper.php
* How to create a PHAR file: https://github.com/phpcl/laminas_tools/blob/master/utils/create_phar.php
* RE: PHP 7.4: https://wiki.php.net/rfc/covariant-returns-and-contravariant-parameters
* RE: PHP 7.4 changes to Anon Functions and binding `$this`:
```
// this usage is deprecated in PHP 7.4
// See: https://wiki.php.net/rfc/deprecations_php_7_4#unbinding_this_from_non-static_closures
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Test { protected $name = 'Testy Tester'; }
class Fred { protected $name = 'Fred Flintstone'; }
$anon = new class() extends Test {
    public function getDump($obj = FALSE)
    {
        $func = function () { var_dump($this); };
        // deprecated:
        return ($obj !== FALSE) ? $func->bindTo($obj) : $func;
    }
};
echo $anon->getDump()() . "\n";
echo $anon->getDump(new Fred())() . "\n";
echo $anon->getDump(NULL)() . "\n";
```
* PHP RoadMap: https://wiki.php.net/rfc
* Discussion on problems with existing serialization: https://wiki.php.net/rfc/custom_object_serialization
* PHP 7.4 Update: https://www.php.net/manual/en/migration74.new-features.php
* DateTime
  * https://github.com/dbierer/classic_php_examples/tree/master/date_time
* Generators
```
namespace src\ModPhpAdvanced\GeneratorDelegation\SubGenYieldFromExp ;

class DimensionDelegator {
    protected $widths = [10, 30, 50];
    protected $lengths = [15, 25, 35];

    protected function getWidths() {
        yield from $this->widths;
    }

    protected function getLengths() {
        yield from $this->lengthsl
    }

    public function getDimensions() {
        yield from $this->getWidths();
        yield from $this->getLengths();
    }
}
```
* Anon Class
  * Example using anon class with FilterIterator
  * ???

