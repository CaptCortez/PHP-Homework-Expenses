<?php
	
	function get_groups() {
		$groupsArray = array();
		
		if(file_exists('includes/data/productcategories.txt')) {
			$product_categories = file_get_contents('includes/data/productcategories.txt');
			$groupsArray = explode('!', $product_categories);
			return $groupsArray;
		}
		else {
			return $groupsArray;
		}
	}
	
	function put_expenses($name, $sum, $type, $target) {
		
		if(file_exists($target)) {
			$date = date("m.d.y");
			$content = $date.'?'.$name.'?'.$sum.'?'.$type."\n";
			file_put_contents($target, $content, FILE_APPEND);
			echo "<p>The item <span style=\"font-weight: bold;\">" . $name . "</span> has been added SUCCESSFULLY!</p>";
		}
	}
	
	
	function validate($name, $sum) {
	
		$name_len = mb_strlen($name);
		$validSum = (float)$sum;
		$are_details_valid = false;
		
		if(($validSum && $validSum > 0) && ($name_len > 3)) {
			$are_details_valid = true;
		}
		
		return $are_details_valid;
	}
	
?>