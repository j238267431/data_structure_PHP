<?php

$num = 8;
$myArray = [1,2,5,8,8,8,8,8,8,9,100];

$first = startIndex($myArray, $num);
$last = endIndex($myArray, $num);
$times = $last-$first;
$msg = "искомое число " . $num . " повторяется в массиве " . $times . " раз(а), с ключа " . $first . " по ключ " . $last;

if ($first - $last == 0){
	$msg = "искомое число " . $num . " не повторяется. Ключ = " . $first;
} elseif ($last - $first < 0){
	$msg = "искомого числа " . $num . " нет в массиве";
}

echo $msg;

function startIndex($myArray, $num)
{
	$start = 0;
	$end = count($myArray) - 1;

	while ($start <= $end) {

		$base = floor(($start + $end) / 2);

		if ($myArray[$base] < $num) {
			$start = $base + 1;
		} else {
			$end = $base - 1;
		}
	}
	return $start;
}

function endIndex($myArray, $num)
{
	$start = 0;
	$end = count($myArray) - 1;

	while ($start <= $end) {

		$base = floor(($start + $end) / 2);

		if ($myArray[$base] <= $num) {
			$start = $base + 1;
		} else {
			$end = $base - 1;
		}
	}
	return $end;
}