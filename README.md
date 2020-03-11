# PHP Fundamentals III -- Mar 2020
## Homework
* For Weds 4 March
  * Configure Apache JMeter
  * Configure Jenkins CI
* For Fri 6 March
  * Lab: Built-in Web Server
* For Mon 9 March
  * Lab: New Functions (creating a new extension)
  * Lab: Install a PHP Extension
  * Lab: Custom PHP installation (try 7.4.4 https://github.com/php/php-src/tree/PHP-7.4.4)
  * Lab: Phing Labs (there are a couple of them!)
For Wed 11 March
  * Lab: Jenkins
  * Lab: Apache JMeter
  * Lab: Docker (all of them)
  * Lab: Apigility / Laminas API Tools
    * See: https://api-tools.getlaminas.org/

## TODO
* Locate test plan for database load testing
* Specs on our server

## Resources
* PHP 7.4: https://github.com/phpcl/phpcl_jumpstart_php_7_4/blob/master/ffi_c_function.php
* OOP Examples: https://github.com/dbierer/classic_php_examples/tree/master/oop
* Article on ArrayObject: https://continuous-learning.com/php-7-4-the-strange-case-of-arrayobject/
* Article on DirectoryIterator: https://continuous-learning.com/grabbing-a-filtered-directory-tree-using-php-iteration/
* Example of FilterIterator: https://github.com/dbierer/php-iii-jul-2018/blob/master/spl_stacked_iterators.php
* More examples from another class: https://github.com/dbierer/php-iii-jul-2018
* General PHP 7.0 examples: https://github.com/dbierer/php7_examples/tree/master/php_7_0
* General PHP 7.1 examples: https://github.com/dbierer/php7_examples/tree/master/php_7_1
* Docker File Examples:
  * https://github.com/docker-library/mongo/blob/bba1349012df392cc4679c3e2eca2c15f9f89720/4.2/Dockerfile
  * https://github.com/phpcl/phpcl_jumpstart_mongodb/blob/master/Dockerfile
  * Linux for PHP
* PubSub Example: https://github.com/dbierer/php7cookbook/blob/master/source/chapter11/chap_11_pub_sub_simple_example.php
* Find another example of DoublyLinkedList
  * See: https://github.com/dbierer/php7cookbook/blob/master/source/chapter10/chap_10_linked_double.php
  * See: https://github.com/dbierer/php7cookbook/blob/master/source/chapter10/chap_10_linked_list_include.php
* Find example of stacked iterators
  * See: https://github.com/dbierer/php7cookbook/blob/master/source/chapter03/chap_03_developing_functions_stacked_iterators.php

## Lab Notes
* ZF to Laminas Migration
  * See: https://docs.laminas.dev/migration/
* Apigility is now "Laminas API Tools"
  * See: https://api-tools.getlaminas.org/
* Docker
  * Excellent overview: https://docs.docker.com/get-started/
* Docker Compose
  * Quickstart tutorial on Docker Compose: https://docs.docker.com/compose/gettingstarted/
  * Don't install the pre-compiled binary: probably out of date
  * See: https://docs.docker.com/compose/install/#install-compose-on-linux-systems
* Have a look at the Lab Notes from the previous class if you experience problems
  * https://github.com/dbierer/php-iii-may-2019
* For the PHP Compile Lab:
  * https://www.php.net/manual/en/migration74.other-changes.php#migration74.other-changes.pkg-config
  * Replace `--enable-libxml=/usr` with `--with-libxml`
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
* http://localhost:8888/#/8/17: `Expressive` is now `Mezzio`; command to create skeleton has changed.  see: https://docs.mezzio.dev/mezzio/
```
composer create-project mezzio/mezzio-skeleton mezzio
```

## Class Discussion
* Example of "pure" Stratigility App: https://github.com/dbierer/strat_post
  * Here is the live site running this code: https://api.unlikelysource.com/
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

