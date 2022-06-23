<?php 
	
	// task_1
	print 'How are you?'."</br>";
	// print 'I'm fine.';
	print "I'm fine."."</br>";


	// task_2
	$bigMac = 7;
	$cola = 2.45;
	$fries = 1.75;

	$bigMacAmount = 2;
	$colaAmount = 3;
	$friesAmount = 2;

	function cost($bigMac, $bigMacAmount, $cola, $colaAmount, $fries, $friesAmount)
	{	
		// 24.85
		$total = (float)($bigMac * $bigMacAmount) + (float)($cola * $colaAmount) + (float)($fries * $friesAmount); 
		// 1.7395
		$sale = $total * 7 / 100;
		// 23.1105
		$cost = $total - $sale;
		return $cost; 
	}
	$cost = cost($bigMac, $bigMacAmount, $cola, $colaAmount, $fries, $friesAmount);
	echo $cost."</br>";

	// task_3
	$html = '<span class="{class}">fried fish</span><span class="{class}">fried chicken</span>';

	str_replace("{class}", "dinner", $html);

	// task_4
	print (2 + 4 * 10) / (9 - 2)."</br>";

 ?>


<!-- task_5 / 6 / 7 -->
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Exercise_01</title>
 </head>
 <body>
 	<style>
 	table, th, td {
 	  border:1px solid black;
 	}
 	</style>
 	<body>

 	<table style="width:100%">
 	  <tr>
 	    <th>City</th>
 	    <th>Population</th>
 	  </tr>

	 	<?php 

	 		$cityArr = [
	 				"Tbilisi" => 2000000,
	 				"Rustavi" => 1000000,
	 				"Kutaisi" => 999000,
	 				"Batumi" => 1400000,
	 				"Telavi" => 750000
	 		 	];

	 		$reverseSorted = arsort($cityArr);
	 		
	 		$cityArr['Tbilisi'] += 10985;
	 		$cityArr['Rustavi'] += 59999;
	 		$cityArr['Kutaisi'] += 4005;
	 		$cityArr['Batumi'] += 7210;
	 		$cityArr['Telavi'] += 5789;
 
	 		foreach ($cityArr as $city => $population) {

	 			echo "<tr>
	 					<td>$city</td>
	 					<td>$population</td>
	 				  </tr>";
	 		}

	 	 ?>
 
 	</table>
 	
 </body>
 </html>