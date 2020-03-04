<?php
class Test
{
	public static function getCall(callable $callback)
	{
		return $callback();
	}
}
class Whatever
{
	public function test()
	{
		return 'WHATEVER';
	}
}
$test[] = function () { return 'ANON FUNC'; };
$test[] = new class () { public function __invoke() { return 'ANON CLASS'; }};
$test[] = [new Whatever(), 'test'];

foreach ($test as $callback) {
	echo Test::getCall($callback) . "\n";
}
