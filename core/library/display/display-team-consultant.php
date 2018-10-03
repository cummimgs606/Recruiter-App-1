<?php

ini_set('display_errors', 'On');

class DisplayTeamConsultant{

	public static function asGallery($consultant, $menu = NULL){
		
		echo 	'<style>
					.custom-restricted {
						height: 460px;
						width: 90%;
						border: 1px solid gray;
						border-radius: 4px;
					}
					.image-small{
						height: 200px;
						width: 200px;
					}
					
					.flex-container  {
						padding: 0;
						margin: 0;
						list-style: none;
						display: -webkit-box;
						display: -moz-box;
						display: -ms-flexbox;
						display: -webkit-flex;
						display: flex;
						-webkit-flex-flow: row wrap;
					}
					
					.flex-item{
  						background: #EFEFEF;
						width: 200px;
						height: 370px;
						margin-top: 10px;
						padding:5px;
						margin-right:16px;
					}
				</style>';
		
	
			echo '<ul class="flex-container">';
					
						if(!empty($consultant)){
							
							foreach ($consultant as $currentRow){
								
								if($menu != NULL){
									$url = '?consultantID='.$currentRow["consultant_id"].'&menu='.$menu;
								}else{
									$url = '?consultantID='.$currentRow["consultant_id"];
								}
								
								echo '<li class="flex-item">
										<img class="image-small" src="'.PATH_ROOT.'consultant-images/'.$currentRow["consultant_image"].'?"/></p>	
										<a href="'.$url.'">'.$currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"].'</a></p>	
										'.$currentRow["consultant_job_title"].'</p>
										'.$currentRow["office_name"].'</p>
										<a href="mailto:'.$currentRow["consultant_email"].'">Email</a></p>
									
									</li>';
							}
			echo '</ul>';
						}
	}

	
	
	public static function asScrollList($consultant, $menu = NULL){
		
		echo 	'<style>
					.custom-restricted {
						height: 460px;
						width: 90%;
						border: 1px solid gray;
						border-radius: 4px;
					}
				</style>';
		
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">Consultant</a>
					<ul class="pure-menu-list">';
					
						if(!empty($consultant)){
							
							foreach ($consultant as $currentRow){
								
								if($menu != NULL){
									$url = '?consultantID='.$currentRow["consultant_id"].'&menu='.$menu;
								}else{
									$url = '?consultantID='.$currentRow["consultant_id"];
								}
								
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link">'.$currentRow["consultant_id"].' '.$currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"].'</a></li>';
							}
			
			echo '</ul>
			</div>';
		}
	}
}
?>

	
	
