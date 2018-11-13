<?php

/** * Função para gerar números aleatórios
 * * @author Paulo Freitas <paulofreitas dot web at gmail dot com>
 * @copyright Copyright © 2006, Paulo Freitas
 * @license http://creativecommo...by-nc-sa/2.0/br Commons Creative
 * @version 20060312
 * @param int $qnt quantidade de números que deseja gerar
 * @param int $min número mínimo que deseja gerar
 * @param int $max número máximo que deseja gerar
 * @param bool $repeat false se os números gerados podem repetir
 * @param bool $sort true se os números gerados devem ser ordenados
 * @param integer $sort_order critério de ordenação, sendo 0 para ordenação ascendente e 1 para ordenação descendente
 * @return array|string números gerados ou mensagem de erro caso ocorra */

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
	return 'A faixa de valores entre $min e $max deve ser igual ou superior à ' .
'quantidade de números requisitados'; }}


	// Após declará-la:

	?>