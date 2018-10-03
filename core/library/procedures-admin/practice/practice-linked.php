<?php

class PracticeLinked{
	
	private $result;
	
	public function PracticeLinked($query){
		
		 $this->result = $query->fetchAll();
	}
	
	public function getDetail($index, $detail){
		
		if(!empty($this->result) ){
			
			if($index >=0 || $index <= count( $this->result)){

				return $this->result[$index][$detail];
			}
		}
			
	}
	
	public function getAll(){
		return  $this->result;
	}
	
	public function getAsArray(){
		
		$arrayA = [];
		
		foreach ($this->result as $currentRow){
			
			$arrayB = [];
			$arrayB['id'] = $currentRow['practice_id'];
			$arrayB['name'] = $currentRow['practice_name'];
			$arrayA[] = $arrayB;
		} 
		
		usort($arrayA, function($element1, $element2) {
    		return strcmp($element1['name'], $element2['name']);
		});
		
		return 	$arrayA;
	}
}
?>