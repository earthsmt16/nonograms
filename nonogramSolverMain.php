<?php

include('./nonogramSolver.php');

try
{
	$widthCon = array(2, 1, 1);
	$heightCon = array(1, 2, 1);
	$nonogramSolver = new NonogramSolver($widthCon, $heightCon);
	$nonogramSolver->calculateNonogramSolution();
}
catch (Exception $e)
{
	print($e->getMessage().PHP_EOL);
}
