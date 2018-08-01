<?php
/**
 * @param string $a
 * @param string $b
 * @return bool false
 * @return string
 */
function sumBigNumbers($a, $b) {
	// получаем строки в обратном порядке
	$a = strrev((string)$a);
	$b = strrev((string)$b);
	// если есть нечисловые символы, выходим
	if ($a != sprintf("%u", $a)) {
		return false;
	}
	if ($b != sprintf("%u", $b)) {
		return false;
	}
	// определяем максимальную длину строки
	$length = max(strlen($a), strlen($b));
	$result = array();
	for ($i=0; $i<$length; $i++) {
		$result[$i] += $a[$i] + $b[$i]; // поразрядное сложение
		if ($result[$i] > 9) { // если результат более одного разряда, переносим 
			$result[$i + 1] +=  floor($result[$i] / 10);
			$result[$i] = $result[$i] % 10;
		}
	}
	return strrev(implode($result));
}
