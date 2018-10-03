<?php

ini_set('display_errors', 'On');

class DisplayJob {
	
	public static function asTextList($job){

		if(!empty($job)){
			
			foreach ($job as $currentRow){
				
				echo "Job ID: ".$currentRow["job_id"]."</p>";
				echo "<h3>".$currentRow["job_title"]."</h3></P>";
				echo "Job Salary: ".$currentRow["job_salary"]."</p>";
				echo "Job Title: ".$currentRow["job_description"]."</p>"; 
				echo "Job Featured: ".$currentRow["job_featured"]."</p>";
				echo "Job Start: ".$currentRow["job_start_date"]."</p>";
				echo "Job Duration: ".$currentRow["job_duration"]."</p>"; 
				echo "Job Expiry Date: ".$currentRow["job_expiry_date"]."</p>"; 
				echo "Response Email: ".$currentRow["job_response_email"]."</p>"; 
				echo "External Reference: ".$currentRow["job_external_reference"]."</p>"; 
				echo "Job Location: ".$currentRow["job_location_text"]."</p>"; 
				echo "Job Postal Code: ".$currentRow["postal_code"]."</p>"; 
				echo "Job Type ID: ".$currentRow["job_type_id"]."</p>"; 
				echo "Job Type Name: ".$currentRow["job_type_name"]."</p>"; 
				echo "Consultant Name: ".$currentRow["consultant_name"]."</p>"; 
				echo "Brand ID: ".$currentRow["brand_id"]."</p>"; 
				echo "Brand Name: ".$currentRow["brand_name"]."</p>"; 
				echo "Consultant Phone Mobile: ".$currentRow["consultant_phone_mobile"]."</p>"; 
				echo "Phone Office: ".$currentRow["office_telephone"]."</p>"; 
				echo "Country ID: ".$currentRow["country_id"]."</p>"; 
			}
		}
	}
	
	
	public static function asScrollList($job, $menu = NULL){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">Jobs</a>
					<ul class="pure-menu-list">';
					
						if(!empty($job)){
							
							foreach ($job as $currentRow){
								
								//$url = '?jobID='.$currentRow["job_id"].'&menu='.$_POST['menu'];
								
								if($menu != NULL){
									$url = '?jobID='.$currentRow["job_id"].'&menu='.$menu;
								}else{
									$url = '?jobID='.$currentRow["job_id"];
								}
	
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link">'.$currentRow["job_id"].' '.$currentRow["job_title"].'</a></li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
}
?>

	
	
