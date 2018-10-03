	$(document).ready(function(e) {
		
			$("button[name='submit']").on("click", function (e) {
				
					e.preventDefault();
					e.returnValue = false;
					
				var button  					= $(this);	
				var form  					= button.closest('form');
				
  					form.name 				= form.attr("name");
					form.action				= form.attr("action");
					form.submitPostValue	= button.attr("value");
					
					
					console.log(form.name);
					console.log(form.action);
					console.log(form.submitPostValue);
					
			
				var dialogue 				=  {};
					dialogue.title			= "Delete Record!";
					dialogue.message		= "<h5>This will permanently delete the record from the database are you sure?<h5>";
				
					confirmDialog(dialogue , form);
				
			});
			
			// DIALOGE BOX
	
			function confirmDialog(dialogue , form) {
				
				var confirmdialog = $("<div></div>").appendTo("body")
					.html("<div><h6>" + dialogue.message + "</h6></div>")
					.dialog({
						modal: true,
						title: dialogue.title,
						zIndex: 10000,
						autoOpen: false,
						width: "auto",
						resizable: false,
						buttons: {
							Yes: function () {
								
								submitAjax(	form.submitPostValue, form);	
								$(this).dialog("close");
							},
							No: function () {
								
								submitAjax(	"do-not-" + form.submitPostValue, form);	
								$(this).dialog("close");
							}
						},
						close: function () {
							$(this).remove();
						}
					});
		
				return confirmdialog.dialog("open");
			}
			
			// POST DATA
			
			function submitAjax(submitPostValue, form){
			
				var serialised = $(form.name).serialize() + "&submit=" + submitPostValue;
				
				$.ajax({type: "POST",
						url: form.action	,
						data: serialised,
						dataType: "html",
						success: function(html){
							console.log(html);
							location.reload();
						}
				});	
			}
		});