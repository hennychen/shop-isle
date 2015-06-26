/********************************************
*** General Repeater ***
*********************************************/
function parallax_one_refresh_general_control_values(){
	jQuery(".parallax_one_general_control_repeater").each(function(){
        var values = [];
        var th = jQuery(this);
        th.find(".parallax_one_general_control_repeater_container").each(function(){
            var icon_value = jQuery(this).find('select').val();
            var text = jQuery(this).find(".parallax_one_text_control").val();
            var link = jQuery(this).find(".parallax_one_link_control").val();
            var image_url = jQuery(this).find(".custom_media_url").val();
            if(icon_value != '' || text !='' || image_url!='' ){
                values.push({
                    "icon_value" : icon_value,
                    "text" : text,
                    "link" : link,
                    "image_url" : image_url
                });
            }

        });

        th.find('.parallax_one_repeater_colector').val(JSON.stringify(values));
        th.find('.parallax_one_repeater_colector').trigger('change');
    });
}


jQuery(document).ready(function(){
    
    jQuery('#customize-theme-controls').on('click','.parallax-customize-control-title',function(){
        jQuery(this).next().slideToggle();
    });
    function media_upload(button_class) {
	
		jQuery('body').on('click', button_class, function(e) {
			var button_id ='#'+jQuery(this).attr('id');
			var display_field = jQuery(this).parent().children('input:text');
			var _custom_media = true;

			wp.media.editor.send.attachment = function(props, attachment){
				if ( _custom_media  ) {
					if(typeof display_field != 'undefined'){
						switch(props.size){
							case 'full':
								display_field.val(attachment.sizes.full.url);
								display_field.trigger('change');
								break;
							case 'medium':
								display_field.val(attachment.sizes.medium.url);
								display_field.trigger('change');
								break;
							case 'thumbnail':
								display_field.val(attachment.sizes.thumbnail.url);
								display_field.trigger('change');
								break;
							case 'parallax_one_team':
								display_field.val(attachment.sizes.parallax_one_team.url);
								display_field.trigger('change');
								break
							case 'parallax_one_services':
								display_field.val(attachment.sizes.parallax_one_services.url);
								display_field.trigger('change');
								break
							case 'parallax_one_customers':
								display_field.val(attachment.sizes.parallax_one_customers.url);
								display_field.trigger('change');
								break;
							default:
								display_field.val(attachment.url);
								display_field.trigger('change');
						}
					}
					_custom_media = false;
				} else {
					return wp.media.editor.send.attachment( button_id, [props, attachment] );
				}
			}
			wp.media.editor.open(button_class);
			return false;
		});
	}
	
    media_upload('.custom_media_button_parallax_one');
    jQuery(".custom_media_url").live('change',function(){
        parallax_one_refresh_general_control_values();
        return false;
    });
    

	jQuery("#customize-theme-controls").on('change', '.parallax_one_icon_control',function(){
		parallax_one_refresh_general_control_values();
		return false; 
	});

	jQuery(".parallax_one_general_control_new_field").on("click",function(){
	 
		var th = jQuery(this).parent();
		if(typeof th != 'undefined') {
			
            var field = th.find(".parallax_one_general_control_repeater_container:first").clone();
            if(typeof field != 'undefined'){
                field.find(".parallax_one_general_control_remove_field").show();
                field.find("select").val('');
                field.find(".parallax_one_text_control").val('');
                field.find(".parallax_one_link_control").val('');
                field.find(".custom_media_url").val('');
                th.find(".parallax_one_general_control_repeater_container:first").parent().append(field);
                parallax_one_refresh_general_control_values();
            }
			
		}
		return false;
	 });
	 
	jQuery("#customize-theme-controls").on("click", ".parallax_one_general_control_remove_field",function(){
		if( typeof	jQuery(this).parent() != 'undefined'){
			jQuery(this).parent().parent().remove();
			parallax_one_refresh_general_control_values();
		}
		return false;
	});

	jQuery("#customize-theme-controls").on('keyup', '.parallax_one_text_control',function(){
		 parallax_one_refresh_general_control_values();
	});
	
	jQuery("#customize-theme-controls").on('keyup', '.parallax_one_link_control',function(){
		parallax_one_refresh_general_control_values();
	});
	
	/*Drag and drop to change icons order*/
	jQuery(".parallax_one_general_control_droppable").sortable({
		update: function( event, ui ) {
			parallax_one_refresh_general_control_values();
		}
	});	

});

/********************************************
*** Footer Socials Repeater ***
*********************************************/


	
function parallax_one_refresh_icon_values(){
	var values = [];
	jQuery(".parallax_one_repeater_container").each(function(){
		var icon_value = jQuery(this).find('select').val();
		var icon_link = jQuery(this).find(".parallax_one_icon_link").val();
		if(icon_value != '' && icon_link !='' ){
			values.push({
				"icon_value" : icon_value,
				"icon_link" : icon_link
			});
		}
	})
	jQuery("#parallax_one_repeater_colector").val(JSON.stringify(values));
	jQuery("#parallax_one_repeater_colector").trigger('change');
}


jQuery(document).ready(function(){

	jQuery("#parallax_one_icons_repeater").on('change', '.parallax_one_icons',function(){
		parallax_one_refresh_icon_values();
		return false; 
	});

	jQuery("#parallax_one_new_field").on("click",function(){
		var field = jQuery(".parallax_one_repeater_container:first").clone();
		if(typeof field != 'undefined') {
			field.find(".parallax_one_remove_field").show();
			field.find("select").val('');
			field.find(".parallax_one_icon_link").val('');
			jQuery(".parallax_one_repeater_container:first").parent().append(field);
			parallax_one_refresh_icon_values();
		}
		return false;
	 });
	 
	jQuery("#parallax_one_icons_repeater").on("click", ".parallax_one_remove_field",function(){
		if(typeof jQuery(this).parent() != 'undefined'){
			jQuery(this).parent().remove();
			parallax_one_refresh_icon_values();
		}
		return false;
	});

	jQuery("#parallax_one_icons_repeater").on('keyup', '.parallax_one_icon_link',function(){	 
		 parallax_one_refresh_icon_values();
	});
	
	/*Drag and drop to change icons order*/
	jQuery(".parallax_one_droppable").sortable({
		update: function( event, ui ) {
			parallax_one_refresh_icon_values();
		}
	});	

});



/********************************************
*** Customizer order ***
*********************************************/


function parallax_one_order_refresh_values(){

	var values = [];
	jQuery("#parallax_order_droppable").find('li').each( function(){ 
		var section_id = jQuery(this).attr('id');
		var section_content = jQuery(this).html();
		
		if(section_id!='' && section_content!=''){
			values.push({
				'section_id' : section_id,
				'section_content' : section_content
			}); 
		}
	
	
	} );
	jQuery("#order_collector").val(JSON.stringify(values));
	jQuery("#order_collector").trigger('change');
	
}


jQuery( document ).ready(function() {
	
	jQuery("#parallax_order_droppable").sortable({
		update: function( event, ui ) {
			parallax_one_order_refresh_values();
		}
	});
	
	
});

