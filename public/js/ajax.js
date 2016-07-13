$(document).ready(function(){
	
	var url= '/tasks';

	$('.open-modal').click(function(){
		
		var task_id = $(this).val(); // $(this).attr('value');
		
		$.get(url+'/'+task_id,function(data){
			$('#task_id').val(data.id);
			$('#task').val(data.task);
			$('#description').val(data.description);
			$('#btn-save').val("update");
			$('#myModal').modal('show');
		})
	});

	$('#btn-add').click(function(){
		$('#btn-save').val("add")
		$('#frmTasks').trigger("reset");
		$('#myModal').modal('show');

	});

	$('#btn-save').click(function(e){
		e.preventDefault();

		var state = $('#btn-save').val();
		var type= "POST";
		var task_id = $('#task_id').val();
		var my_url = url;
		var formData ={
			task: $('#task').val(),
			description: $('#description').val(),
			id: task_id
		}

		if(state == 'update'){
			type = "PUT",
			my_url +='/'+ task_id;
		}

		$.ajax({
			type:type,
			url:my_url,
			data: formData,
			dataType: 'json',
			success: function function_name(data) {
				console.log('success');
			}

		});
	});


	$('.delete-task').click(function(){
		var task_id = $(this).val();
		$.ajax({
			type:"DELETE",
			url: url+'/'+task_id,
			success: function(){
				$('#task' + task_id).remove();
			}	
		});
	});

});