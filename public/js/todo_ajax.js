$(document).ready(function(){

	var url ='/todos';

	$('.open-modal').click(function(){
		var task_id = $(this).val();
		var task_url = url +'/'+ task_id;
		$.get(task_url,function(data){
			$('#task_id').val(task_id);
			$('#task').val(data.task);
			$('#description').val(data.description);
			$('#btn-save').val('update');
			$('#myModal').modal('show');
		});
		
	});

	$('#btn-save').click(function(){
		var task_id = $('#task_id').val();
		var status = $(this).val();
		var type= 'POST';
		var task_url = url;
		if(status == 'update'){
			type ='PUT';
			task_url = url +'/' + task_id;
		}

		var formData ={
			type: type,
			task: $('#task').val(),
			description: $('#description').val(),
			id: task_id
		};
		$.ajax({
			type: type,
			data: formData,
			dataType: 'json',
			url: task_url,
			success:function(response){
				//console.log(response);
				$('#myModal').modal('hide');
				if(status == 'add'){
					var task = '<tr id="task' + response.id + '"><td>' + response.id + '</td><td>' + response.task + '</td><td>' + response.description + '</td><td>' + response.created_at + '</td>';
                	task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + response.id + '">Edit</button>';
                	task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + response.id + '">Delete</button></td></tr>';
                	$('#task-list').append(task);
				}else{
					$('#task'+task_id).find('td').eq(1).html(response.task);
					$('#task'+task_id).find('td').eq(2).html(response.description);
				}

				$('#frmTask').trigger('reset');

			}
		});
	});

	$('#btn-add').click(function(e){
			e.preventDefault();
			$('#btn-save').val('add');
			$('#frmTask').trigger('reset');
			$('#myModal').modal('show');
	});

	$('.delete-task').click(function(){
		var task_id = $(this).val();
		var conf = confirm("Are you sure you want to delete this record?");
		if(!conf)
			return false;

		$.ajax({
			type: 'DELETE',
			url: url+'/'+task_id,
			success:function(){
				$('#task'+task_id).remove();	
			}
		});

	});



});