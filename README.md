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
For Fri 13 March
  * Lab: Stratigility
  * Lab: Expressive / Mezzio

## TODO
* Locate test plan for database load testing
* Specs on our server

## Class Discussion
* Design Patterns
  * MVC
    * Framework expanding original boundaries of MVC: https://lightmvcframework.net/
  * Strategy
    * https://github.com/laminas/laminas-view/tree/master/src/Strategy
    * https://github.com/laminas/laminas-mvc/blob/master/src/View/Http/RouteNotFoundStrategy.php
  * Decorator: https://github.com/laminas/laminas-validator/blob/master/src/NotEmpty.php
    * More than just PHP `empty()` function
    * Also does the following:
      * Returns TRUE (i.e. "Not Empty") if count of object properties is 0
      * Returns TRUE if `__toString()` is defined, and returns empty string
      * It then "manually" does everything that `empty()` does, but step-by-step
  * Data Mapper
    * Doctrine ORM: https://www.doctrine-project.org/projects/orm.html
    * Atlas ORM: http://atlasphp.io/cassini/orm/relationships.html
    * Propel ORM: http://propelorm.org/
  * Pub/Sub
    * https://github.com/dbierer/php7cookbook/blob/master/source/chapter11/chap_11_pub_sub_simple_example.php
  * Service Locator
    * Dependency Injection Overview: https://martinfowler.com/articles/injection.html
    * Aura DI: http://auraphp.com/framework/2.x/en/di/
    * PHP DI: http://php-di.org/
  * Adapter
    * `Laminas\Db\Adapter\Adapter` : https://docs.laminas.dev/laminas-db/adapter/
    * `Laminas\Log\Writer\*` : https://docs.laminas.dev/laminas-log/writers/
    * `Laminas\Cache\Storage\*` : https://docs.laminas.dev/laminas-cache/storage/adapter/
  * Singleton
    * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_singleton_getinstance_example.php
  * Domain
    * https://stackoverflow.com/questions/1222392/what-is-domain-driven-design-ddd/1222488#1222488
    * Free PDF: https://www.infoq.com/minibooks/domain-driven-design-quickly/
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

## Laminas Migration Errors
* Problem: getting `PHP Fatal error:  Undefined class constant 'PRE_COMMAND_RUN' in vendor/laminas/laminas-dependency-plugin/src/DependencyRewriterPlugin.php:63`
```
vagrant@php-training:~/php-iii-mar-2020/laminas_api_tools$ composer install
Cannot create cache directory /home/vagrant/.composer/cache/repo/https---packagist.org/, or directory is not writable. Proceeding without cache
Cannot create cache directory /home/vagrant/.composer/cache/files/, or directory is not writable. Proceeding without cache
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 95 installs, 0 updates, 0 removals
  - Installing laminas/laminas-dependency-plugin (1.0.3): Downloading (100%)
PHP Fatal error:  Uncaught Error: Undefined class constant 'PRE_COMMAND_RUN' in /home/vagrant/php-iii-mar-2020/laminas_api_tools/vendor/laminas/laminas-dependency-plugin/src/DependencyRewriterPlugin.php:63

vagrant@php-training:~/php-iii-mar-2020/apigility.migration.laminas$ php --version
PHP 7.4.3 (cli) (built: Feb 23 2020 07:24:28) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Xdebug v2.9.0, Copyright (c) 2002-2019, by Derick Rethans
    with Zend OPcache v7.4.3, Copyright (c), by Zend Technologies

composer --version
Composer version 1.6.2 2018-01-05 15:28:41
```
* Solution: was running outdated version of Composer.  Updated Composer to version 1.10.x.  Migration works OK now.
