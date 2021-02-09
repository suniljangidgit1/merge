<?php

if( !function_exists("calculateTotalHours") ){
	
	function calculateTotalHours($inTime="", $outTime="" ){

	 	$array1 = explode(':', $outTime);
		$array2 = explode(':', $inTime);

		$Hours 	= $array1[0] - $array2[0];

		$minutes = 0;
		$totalHours = 0;
        $totalminutes = 0;

		if($array1[1] >= $array2[1] ) {
			$minutes      = $array1[1] - $array2[1];
		} else {
			$minutes = ($array2[1] + 60) - $array1[1];
			$Hours--;
		} 

		$totalHours        = $totalHours + $Hours;
		$totalminutes      = $totalminutes + $minutes;

		if($totalminutes >= 60) {
			$remainder     = $totalminutes % 60;
			$quotient      = ($totalminutes - $remainder) / 60;
			$totalHours    = $totalHours + $quotient;
			$totalminutes  = $remainder;
		}     

		return array( 'hours' => $Hours, 'minutes' => $minutes, 'totalHours' => $totalHours, 'totalMinutes' => $totalminutes );

	}

}