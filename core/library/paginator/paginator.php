<?php

ini_set('display_errors', 'On');

class Paginator{
	
	public  $rowTotal;
	public  $rowMax;
	
	private  $indexZeroStart = 0;
	private  $indexZeroEnd;
	
	private  $indexOneStart;
	private  $indexOneEnd;
	
	public function __construct() {

		if(!isset($_SESSION['pageCur'])){
			$_SESSION['pageMin'] = 1;
			$_SESSION['pageMax'] = 1;
			$_SESSION['pageCur'] = 1;
			$_SESSION['rowMax'] = 1;
			$_SESSION['rowTot'] = 1;
			$_SESSION['show'] = 'small';
			$_SESSION["lastURL"] = '';
		}
	}
	
	// --------------------------------------------------------
	
	public function setLastUrl($url){
		$_SESSION["lastURL"] = $url;
	}
	
	public function getLastUrl(){
		return $_SESSION["lastURL"];
	}
	
	// --------------------------------------------------------
	
	public function getNextPage(){
		
		$page = $_SESSION['pageCur']  + 1;
		
		if($page >  $_SESSION['pageMax']){
			 $page =  $_SESSION['pageMax'];
		}
		
		return $page; 
	}
	
	public function getPrevPage(){
		
		$page = $_SESSION['pageCur']  - 1;
		
		if($page < $_SESSION['pageMin']){
			$page = $_SESSION['pageMin'];
		}
		
		return $page;
	}
	
	
	public function setPage($page){
		
		$_SESSION['pageCur'] = $page;
		
		$this->computePageNumbers();
	}
	
	// --------------------------------------------------------

	public function setShow($show){
		
		if($show == 'small' || $show == 'medium' || $show == 'large'){
			
			$_SESSION['show'] = $show;
			$this->computePageNumbers();
		}
	}
	
	public function getShow(){
		
		return $_SESSION['show'];
	}

	// --------------------------------------------------------
	 
	public function start($rowsTotal, $rowsMax){

		$_SESSION['pageMax'] = ceil ($rowsTotal / $rowsMax) ;	
		$_SESSION['pageMin'] = 1 ;
		$_SESSION['pageCur'] = 1;
		$_SESSION['rowMax'] = $rowsMax;
		$_SESSION['rowTot'] = $rowsTotal;
		
		$this->computePageNumbers();
	}
	
	
	private function computePageNumbers(){

		$this->indexZeroStart = ($_SESSION['pageCur'] -1) * $_SESSION['rowMax'];
		
		if($_SESSION['pageCur'] == $_SESSION['pageMax']){
			$this->indexZeroEnd =  $_SESSION['rowTot'] -1;
		}else{
			$this->indexZeroEnd 	= ($_SESSION['pageCur'] * $_SESSION['rowMax']) -1;
		}
		
		$this->indexOneStart = $this->indexZeroStart + 1;
		$this->indexOneEnd = $this->indexZeroEnd +1;
		$this->rowTotal = $_SESSION['rowTot'];
	} 
	
	// --------------------------------------------------------	
	
	public function getZeroIndexStart(){
		return $this->indexZeroStart;
	}
	
	public function getZeroIndexEnd(){
		return $this->indexZeroEnd;
	}

	public function getOneIndexStart(){
		return $this->indexOneStart;
	}
	
	public function getOneIndexEnd(){
		return $this->indexOneEnd;
	}	
	
	public function getRowTotal(){
		return $this->rowTotal;
	}
		
	// --------------------------------------------------------	
		
	public function getRowAmount(){

		if($_SESSION['pageCur'] == $_SESSION['pageMax']){
				
			$ammount =  $_SESSION['rowTot'] % $_SESSION['rowMax'];
				
			if($ammount == 0){
				$ammount = $_SESSION['rowMax']; 
			}
				
			return  $ammount;
				
		}else{
				
			return $_SESSION['rowMax'];
		}
	}
}
?>

	
	
