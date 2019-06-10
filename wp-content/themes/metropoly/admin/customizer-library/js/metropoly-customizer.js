jQuery(document).ready( function( $ ) {
			
			$('#customize-theme-controls > ul').append('<li id="accordion-section-metropoly-forums" class="accordion-section control-section control-section-forums" style="display: list-item;padding: 20px 10px 20px;background: #fff;"><a href="https://www.mageewp.com/forums/" target="_blank" class="">'+metropoly_params.btn_forum+'</a></li>');
			
		
								 
			if(metropoly_params.theme_options_version=='1'){
		   $('#customize-theme-controls > ul').prepend('<li id="accordion-section-importer" class="accordion-section control-section control-section-importer" style="display: list-item;padding: 20px 10px 0;background: #fff;"><a href="#" id="import-theme-options" class="button">'+metropoly_params.import_options+'</a><div class="import-status"></div><p>'+metropoly_params.transfer+'</p></li>');
		   $(document).on('click','#import-theme-options',function(){
				   $('#accordion-section-importer .import-status').text(metropoly_params.loading);									   
						$.ajax({type:"POST",dataType:"html",url:metropoly_params.ajaxurl,data:"action=metropoly_otpions_customize",
							success:function(data){
								  $('#accordion-section-importer .import-status').text(metropoly_params.complete);
								 location.reload() ;
								},error:function(){
									$('#accordion-section-importer .import-status').text(metropoly_params.error);		
									}});
                   });
			}
			
			
					
			
		   } );