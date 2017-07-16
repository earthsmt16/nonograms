<?php

class NonogramSolver
{
	protected $_widthCon;

	protected $_heightCon;

	protected $_solutionGrid;

	function __construct($widthCon, $heightCon)
	{
		if(!$this->calculateGridSize($widthCon, $heightCon))
		{
			throw new Exception('Inconsistent conditions for height and width conditions');
		}
		$this->_widthCon = $widthCon;
		$this->_heightCon = $heightCon;
		$this->setUpSolutionGrid();
		$this->modPrint('Conditions for nonogram set in NonogramSolver');
	}

	public function calculateNonogramSolution()
	{
		$symInfo = $this->checkSymmetriesForHeightAndWidth();
		print_r($this->_solutionGrid);
	}

	private function setUpSolutionGrid()
	{
		$this->_solutionGrid = array();
		$index = 0;
		while($index < $this->_size)
		{
			$this->_solutionGrid[$index] = array();
			$index++;
		}
	}

	private function calculateGridSize($widthCon, $heightCon)
	{
		$rtn = count($widthCon) == count($heightCon) ? true : false;
		if($rtn)
		{
			$this->_size = count($widthCon);
		}
		return $rtn;
	}
	
	private function modPrint($line)
	{
		print_r($line.PHP_EOL);
	}

	private function checkSymmetriesForHeightAndWidth()
	{
		$rtnSymHeight = $this->checkSymmetries($this->_heightCon);
		$rtnSymWidth  = $this->checkSymmetries($this->_widthCon);
		return array('heightSym' => $rtnSymHeight, 'widthSym' => $rtnSymWidth);
	}

	private function checkSymmetries($con)
	{
		//Assume there is symmetry unless otherwise stated.
		$rtn = true;
		$halfSize = $this->_size/2;
		$limit = ((int) $halfSize) - 1;
		for($index=0; $index <= $limit ; $index++)
		{
			$rtn = ($con[$index] == $con[($this->_size)-$index-1]) ? true : false;
			if(!$rtn)
			{
				break;
			}
		}
		if($rtn)
		{
			$this->_solutionGrid[$index] = ((int) ($halfSize) != $halfSize) ? array_fill(0, $this->_size, 1) : $this->_solutionGrid[$index];
		}
		return $rtn;
	}
}
