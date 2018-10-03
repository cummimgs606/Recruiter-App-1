<?php 

		// ---------------------------------------------------------------------------	
		// DISPLAY : MODIFY SHOW-ALL, SHOW-SOME, BACK, APPLY BUTONS
		
		if($paginator->getShow() == 'small'){
			$paginationShow = '<a class="pure-button" href="'.$_SERVER["PHP_SELF"].'?show=medium">'.BUTTON_SHOW.' '.$paginatorListLength.'</a>';
		}
		
		if($paginator->getShow() == 'medium'){
			$paginationShow = '<a class="pure-button" href="'.$_SERVER["PHP_SELF"].'?show=small">'.BUTTON_SHOW_ALL.'</a>';
		}
		
		
		
		if($paginator->getShow() == 'large'){
			
			$buttonBack  = '<a class="pure-button" href="'.$paginator->getLastUrl().'">'.BUTTON_BACK.'</a>';
			//$buttonApply = '<a class="pure-button" href="'.PATH_LOCALISED.'/index-search-apply.php?jobID='.Jobs::getDetail(0,"job_id").'">'.BUTTON_APPLY.'</a>';
			$buttonApply = '<a class="pure-button" href="'.PATH_LOCALISED.'/index.php?header-menu=Job%20Apply&jobID='.Jobs::getDetail(0,"job_id").'">'.BUTTON_APPLY.'</a>';
			
			$paginationShow = $buttonBack.' '.$buttonApply;
		}	
		// ---------------------------------------------------------------------------	
		// DISPLAY : MODIFY PAGINATOR DATA ACCORDING TO JOB RESULTS
		
		if($paginator->getRowTotal() == 0){
			
			$paginationDisplay = '<a class="pure-button pure-button-disabled">'.PAGE_NO_RESULT.'</a>';
			$paginatorPrev = '';
			$paginatorNext = '';
			$paginationShow = '';
			
		}else{
			
			$paginatorPrev = '<a class="pure-button" href="'.$_SERVER["PHP_SELF"].'?show='.$paginator->getShow().'&page='.$paginator->getPrevPage().'">'.BUTTON_PREV.'</a>';
			$paginatorNext = '<a class="pure-button" href="'.$_SERVER["PHP_SELF"].'?show='.$paginator->getShow().'&page='.$paginator->getNextPage().'">'.BUTTON_NEXT.'</a>';
			
			if($paginator->getShow() == 'small'){
				
				$paginationDisplay = '<a class="pure-button pure-button-disabled">'.PAGE_JOBS.' '.$paginator->getOneIndexStart().' - '.$paginator->getOneIndexEnd().' '.PAGE_OF.' '.$paginator->getRowTotal().'</a>';
				$paginatorPrev = '<div class="pure-button pure-button-disabled">'.BUTTON_PREV.'</div>';
				$paginatorNext = '<div class="pure-button pure-button-disabled">'.BUTTON_NEXT.'</div>';
			}
			
			if($paginator->getShow() == 'medium'){
				
				$paginationDisplay = '<a class="pure-button pure-button-disabled">'.PAGE_JOBS.' '.$paginator->getOneIndexStart().' - '.$paginator->getOneIndexEnd().' '.PAGE_OF.' '.$paginator->getRowTotal().'</a>';
			}
			
			if($paginator->getShow() == 'large'){
				
				$paginationDisplay = '<a class="pure-button pure-button-disabled">'.PAGE_JOB.' '.$paginator->getOneIndexStart().' '.PAGE_OF.' '.$paginator->getRowTotal().'</a>';
			}	
		}

		// ---------------------------------------------------------------------------	
		// DISPLAY : WRITE PAGINATOR MENU	
				
		print '
		<div class="pure-g" style="background:#CCCCCC;padding:5px">
			<div class="pure-u-1-2" >'
			
				.$paginationDisplay.
				
			'</div>

			<div class="pure-u-1-2">
				
				'.$paginationShow.'
				'.$paginatorPrev.' 
				'.$paginatorNext.'
				
			</div>
		</div>';
								 
		// ---------------------------------------------------------------------------	
		// DISPLAY : WRITE JOBS DATA ACCORDING TO SHOW-ALL, SHOW-SOME, SHOW-DETAILS	

		if($paginator->getShow() == 'small'){
			
			DisplayJobsSmall::showList(Jobs::getAll(),true, BUTTON_MORE, $paginator);
		}
		
		if($paginator->getShow() == 'medium'){

			DisplayJobsMedium::showList(Jobs::getAll(), true, BUTTON_MORE, $paginator);
		}
		
		if($paginator->getShow() == 'large'){

			DisplayJobsLarge::showList(Jobs::getAll(), true, BUTTON_APPLY, $paginator);
		}
		
		// ---------------------------------------------------------------------------	
		// DISPLAY : WRITE PAGINATOR MENU
				
		print '
		<div class="pure-g" style="background:#CCCCCC;padding:5px">
			<div class="pure-u-1-2" >'
			
				.$paginationDisplay.
				
			'</div>

			<div class="pure-u-1-2">
				
				'.$paginationShow.'
				'.$paginatorPrev.' 
				'.$paginatorNext.'
				
			</div>
		</div>';
?>