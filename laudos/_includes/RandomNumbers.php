<?php

/** * Fun��o para gerar n�meros aleat�rios
 * * @author Paulo Freitas <paulofreitas dot web at gmail dot com>
 * @copyright Copyright � 2006, Paulo Freitas
 * @license http://creativecommo...by-nc-sa/2.0/br Commons Creative
 * @version 20060312
 * @param int $qnt quantidade de n�meros que deseja gerar
 * @param int $min n�mero m�nimo que deseja gerar
 * @param int $max n�mero m�ximo que deseja gerar
 * @param bool $repeat false se os n�meros gerados podem repetir
 * @param bool $sort true se os n�meros gerados devem ser ordenados
 * @param integer $sort_order crit�rio de ordena��o, sendo 0 para ordena��o ascendente e 1 para ordena��o descendente
 * @return array|string n�meros gerados ou mensagem de erro caso ocorra */

function getRandomNumbers($qnt, $min, $max, $repeat = false, $sort = true,

$sort_order = 0){ if ((($max - $min) + 1) >= $qnt) {
	$numbers = array();

	while (count($numbers) < $qnt) {
		$number = mt_rand($min, $max);
		if ($repeat) {
			$numbers[] = $number;
		} elseif (!in_array($number, $numbers)) {
			$numbers[] = $number;
		}
	}
	if ($sort) {
		switch ($sort_order) {
			case 0:
				sort($numbers);
				break;
			case 1:
				rsort($numbers);
				break;
		}
	}
	return $numbers;
} else {
	return 'A faixa de valores entre $min e $max deve ser igual ou superior � ' .
'quantidade de n�meros requisitados'; }}


	// Ap�s declar�-la:

	?>