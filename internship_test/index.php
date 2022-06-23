<?php 
	
	class calculateVegetable {
		/*
		*	Properties
		*/
		static $revenueServicePerc = 20;
		public $name;
		public $chargedPrice;
		public $sellingPrice;
		public $quantity;

		//	Initialize Object with given values
		function __construct($chargedPrice, $sellingPrice, $quantity = 1, $name = 'vegetable') {
			$this->chargedPrice = $chargedPrice;
			$this->sellingPrice = $sellingPrice;
			$this->quantity = $quantity;
			$this->name = $name;
		}
		/*
		*	Profit for Revenue Service
		*/
		public function revenueServiceProfit() {

			// Revenue (total amount of income)
			$rev = (float)$this->quantity * (float)$this->sellingPrice;

			return $rev;
		}
		/*
		* 	Full cost for given vegetable
		*/
		public function fullCost() {

			// Cost for Buying Goods (vegetable)
			$cost = (float)$this->quantity * (float)$this->chargedPrice;

			// Revenue Service Cost (20% of revenue)
			$rev = $this->revenueServiceProfit();
			$revCost = $rev * $this::$revenueServicePerc / 100;

			$fullCost = $cost + $revCost;

			return $fullCost;
		}
		/*
		*	Pure profit from given vegetable
		*/
		public function profit()
		{	
			
			$rev = $this->revenueServiceProfit();
			$fullCost = $this->fullCost();

			// Pure profit
			$profit = $rev - $fullCost;

			return $profit;
		}

		public function init() {

			$vegName = $this->name;
			$vegQuantity = $this->quantity;

			$vegRevenue = $this->revenueServiceProfit();
			$vegCost = $this->fullCost();
			$vegProfit = $this->profit();

			return [$vegName, $vegQuantity, $vegRevenue, $vegCost, $vegProfit];
		}

	}

	$Carrot = new calculateVegetable(0.6, 1.2, 15, 'Carrot');
	$Betroot = new calculateVegetable(1, 2, 20, 'Betroot');
	$Potatoes = new calculateVegetable(.75, 1.2, 50, 'Potatoes');
	$Cabbage = new calculateVegetable(.95, 1.5, 50, 'Cabbage');

	$vegetables = [$Carrot, $Betroot, $Potatoes, $Cabbage];

 ?>


<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Unilab Internship</title>
</head>
<body>
	<h1>Unilab Internship</h1>
	<?php

		foreach ($vegetables as $vegetable) {
			[$vegName, $vegQuantity, $vegRevenue, $vegCost, $vegProfit] = $vegetable->init();

			echo "(vegetable) $vegName </br> 
			  (quantity) $vegQuantity </br>
			  (revenue) $vegRevenue </br>
			  (full cost) $vegCost </br> 
			  (pure profit) $vegProfit </br><br>";
		}


	 ?>
</body>
</html>