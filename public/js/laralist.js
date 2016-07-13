$(document).ready(function(){
	
	var url= 'settings/update';

	var csrf_token =  $( "input[name='_token']" ).val();

	$('#btn-save').click(function(e){
		e.preventDefault();

		var state = $('#btn-save').val();
		var type= "POST";
		var task_id = $('#task_id').val();
		var my_url = url;
		var formData ={
			site_title: $('#site_title').val(),
			item_per_page: $('#item_per_page').val(),
			default_country: $('#default_country').val(),
			max_image_post: $('#max_image_post').val(),
			google_map_api_key: $('#google_map_api_key').val()
			
		}


		$.ajax({
			type:'POST',
			url:my_url,
			data: formData,
			dataType: 'json',
			 headers : {
            'X-CSRF-TOKEN': csrf_token // X-CSRF-TOKEN is used for Ruby on Rails Tokens
            },
              beforeSend: function( xhr ) {
    				$('.flash-message').show().find('#partial-msg').html('Saving settings..');
  			},
			success: function function_name(data) {
				$('.flash-message').show().find('#partial-msg').html(data.msg);

			}

		});
	});

});