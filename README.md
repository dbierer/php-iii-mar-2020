# PHP Fundamentals III -- Mar 2020
## Homework
* For Weds 4 March
  * Configure Apache JMeter
  * Configure Jenkins CI

## TODO
* Find example re: binding of $this in anon funcs in PHP 7.4

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

## Class Discussion
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

