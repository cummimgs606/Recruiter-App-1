<?php

		// ---------------------------------------------------------------------------			
		// PAGINATOR : INIT
				 
		$paginator = new Paginator(); 
		
		// ---------------------------------------------------------------------------	
		// PAGINATOR : TOGGLE SHOW : SMALL, MEDIUM, LARGE
		
		$paginatorListLength = 3;
		
		if (isset($_GET['show'])){
			
			if($_GET['show'] == 'small'){
				$paginator->setShow('small');
				$paginator->start($rowTotal,$rowTotal);	
				$paginator->setLastUrl($_SERVER["REQUEST_URI"]);	
			}
				
			if($_GET['show'] == 'medium'){
				$paginator->setShow('medium');
				$paginator->start($rowTotal,$paginatorListLength );	
				$paginator->setLastUrl($_SERVER["REQUEST_URI"]);		
			}
				
			if($_GET['show'] == 'large'){
				$paginator->setShow('large');
				$paginator->start($rowTotal,1);	
			}
		}
		
		// ---------------------------------------------------------------------------	
		// PAGINATOR : SET PAGE
	
		if (isset($_GET['page'])){
			
			$paginator->setPage($_GET['page']); 	
		}
		
		// ---------------------------------------------------------------------------	
		// PAGINATOR : SET PAGE DEFUALT
		
		if (!isset($_GET['page']) && !isset($_GET['show']) ){
			$paginator->setShow('medium');
			$paginator->start($rowTotal,3);
			$paginator->setLastUrl($_SERVER["REQUEST_URI"]);	
		}
		
		$_SESSION['rowStart'] = $paginator->getZeroIndexStart();
		$_SESSION['rowAmount'] = $paginator->getRowAmount();
?>