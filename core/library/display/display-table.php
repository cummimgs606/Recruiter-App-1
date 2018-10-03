<?php


ini_set('display_errors', 'On');

class DisplayTable {
	
	private static $query;
	private static $result;

	public static function show($query){

		echo("</p>*** DisplayTable::show()</p>");
		
	
		if($query->rowCount() < 0){
			
			echo "------------------------------------------------------------</br>";
			echo "ROW COUNT 0 </br>";
			echo "------------------------------------------------------------</br>";
			
		} else { 
		
			echo "------------------------------------------------------------</br>";
			echo "ROW COUNT ". $query->rowCount()."</br>";
			echo "------------------------------------------------------------</br>";
		
		
			$cols = $query->columnCount() - 1;
			$col = 0;
			
			$rows = $query->rowCount()-1;
			$row = 0;
			
			echo '<table class="pure-table pure-table-bordered pure-table-striped">'; 
				
				echo '<thead>';
				
				echo '<tr>';
				
				foreach(range(0, $cols) as $col){
					
					$meta = $query->getColumnMeta($col);
	
					echo '<th>' . $meta['name'] . '</th>';
				}

				echo '</tr>';
				
				echo '</thead>';
				
				echo '<tbody>';
				
				foreach ($query as $currentRow){
					
					echo '<tr>';
					
					foreach ($currentRow as $currentCol){
						
						echo '<td>';
						echo substr($currentCol, 0, 100); 
						echo '</td>';
					}
					
					echo '</tr>';
				}
				
				echo '</tbody>';
	
			echo '</table>';
				
		}
	}
}
?>

	
	
