<?php
declare(strict_types=1);
class Test
{
	protected float $a;
	protected float $b;
	public function set(string $key, float $value)
	{
		$this->$key = $value;
	}
	public function addThis()
	{
		$this->a = 'The result is: ' . ($this->a + $this->b);
		return $this->a;
	}
}
$test = new Test();
$test->set('a', '1.1');
$test->set('b', 2.2);
echo $test->addThis();
var_dump($test);
