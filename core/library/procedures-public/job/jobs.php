<?php


class Jobs extends Job{
	
	private static $jobs;
	
	public static function store($query){

		self::$jobs = $query->fetchAll();
	}
	
	public static function getDetail($index, $detail){
		
		
		if(!empty(self::$jobs) ){
			
			if($index >=0 || $index <= count(self::$jobs)){
				
				return self::$jobs[$index][$detail];
			}
		}
			
	}
	
	public static function getAll(){
		
		return self::$jobs;
	}
}
?>









	
