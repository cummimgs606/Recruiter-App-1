	$(document).ready(function(e) {

			$("form").on("click", function (e) {
			
				var form 				= $(this);
  					form.name 			= form.attr("name");
					form.action			= form.attr("action");
					form.submitValue	= form.find("input[name='submit']").val();

				var dialogue 			=  {};
					dialogue.title		= "Delete Record!";
					dialogue.message	= "This will permanently delete the record from the database are you sure?";
				
				e.preventDefault();
				e.returnValue = false;
				
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
								
								submitAjax(	form.submitValue	, form);	
								$(this).dialog("close");
							},
							No: function () {
								
								submitAjax(	"", 	form);	
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
			
			function submitAjax(submitValue, form){
			
				var serialised = $(form.name).serialize() + "&submit=" + submitValue;
				
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