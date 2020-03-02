<?php
declare(strict_types=1);
function test(int $a, int $b, ?int $c, string $d, float $e = 0)
{
	$output = $d . "\n";
	$output .= $a + $b + $c;
	return $output;
}

echo test(1,2,NULL,'ADD');
