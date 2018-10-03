<?php

class DisplayPracticeLinked{
	
		// CREATE COLUMN LENGTHS FOR COLUMNS
			
	static function columnsCreate($columns, $length){
					
			$columnsArray = [];
					
			$mod = $length % $columns;
			$columnLength = floor($length / $columns);
					
			for($j = 0; $j < $columns; $j++){
						
				if($j < $mod){
					$columnsArray[$j] = $columnLength+1;
				}else{
					$columnsArray[$j] = $columnLength;
				}
			}
			
			return $columnsArray;
		}
		
		// CREATE INDEXES FOR COLUMNS
			
		static function columnsIndex($columnList){

			$indexEnd = 0;
			$indexStart = 0;
				
			$map = [];
						
			for($i = 0; $i < count($columnList); $i++){
					
				if($i == 0){
						
					$indexStart = 1;	
						
				}else{
						
					$indexStart = $indexEnd+1;
				}
					
				$indexEnd = $indexEnd + $columnList[$i];
					
				$indexes = [];
				$indexes['start'] = $indexStart;
				$indexes['end'] = $indexEnd;
							
				$map[$i] = $indexes;
			}
				
			return $map;
		}
		
		// DRAW COULUMNS
			
		static function columnsDraw($indexArray, $genericList, $severList, $userList){
			
				
			for($i = 0; $i < count($indexArray); $i++){
					
				$start = $indexArray[$i]['start'];
				$end = $indexArray[$i]['end'];	
				echo '<div class="pure-u-1-3">';
					createButtons($start, $end, $genericList, $severList, $userList);
				echo '</div>';
			}
		}
	
}
?>

	
	
