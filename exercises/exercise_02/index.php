<?php 
	
	 /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
       	$nums = array_merge($nums1, $nums2);
       	sort($nums);
       	$arraySize = sizeof($nums);
       	$lastIndex = $arraySize - 1;

       	if ($arraySize % 2 == 1) {
       		$median = $nums[$lastIndex / 2];
       	} else {
       		$firstElement = $nums[$lastIndex / 2];
       		$secondElement = $nums[($lastIndex + 1) / 2];
       		$median = ($firstElement + $secondElement) / 2;
       	}
        return $median;
    }
    $median1 = findMedianSortedArrays([1, 3], [2]);
    $median2 = findMedianSortedArrays([1, 2], [3, 4]);
    print_r($median1);
    echo "</br>";
    print_r($median2);

 ?>