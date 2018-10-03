<?php

ini_set('display_errors', 'On');

class DisplayBio {
	
	
public static function asText($bio){

		if(!empty($bio)){
			
			foreach ($bio as $currentRow){
				
				echo 'BIO </p>';
				
				
				echo '<b>Bio Title: </b>'.$currentRow["bio_title"]."</P>"; 
				echo '<b>Bio Strapline: </b>'.$currentRow["bio_strapline"]."</P>"; 
				echo '<b>Bio Expertise: </b>'.$currentRow["bio_expertise"]."</P>"; 
				echo '<b>Bio About</b>: '.$currentRow["bio_about"]."</P>"; 
				echo '<b>Bio ID</b>: '.$currentRow["bio_id"]."</P>"; 
								
				/*
				['bio_id'] 
				['consultant_id'] 
				['language_id'] 
				['team_id'] 
				['brand_id'] 
				['bio_title'] 
				['bio_strapline'] 
				['bio_expertise'] 
				['bio_about'] 
				['bio_added'] 
				['bio_deleted'] 
				['bio_id'] 
				['id']
				*/
			}
		}
	}
	
}
?>

	
	
