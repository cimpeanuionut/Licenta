<html>
<head>
		<title>Baza de date cu angajatii din politie</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>  
		<script src="jquery-ui.js"></script>
</head>
<body>
	<div class="container">
	<br/>
	<h3 align="center"> Baza de date cu angajatii politiei</a></h3><br/>
	<br/>
	<div align="right" style="margin-bottom:5px;">
		<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
	</div>
	<div id = "user_data" class="table-responsive">
	
	</div>
	<br/>
	</div>
	<div id="user_dialog" title="Add Data">
		<form method="post" id="user_form">
			<div class="form-group">
				<label>Enter Nume</label>
				<input type="text" name="name" id="name" class="form-control"/>
				<span id="error_name" class="text-danger"></span>
				</div>
				<div class="form-group">
				<label>Enter Prenume</label>
				<input type="text" name="prenume" id="prenume" class="form-control"/>
				<span id="error_prenume" class="text-danger"></span>
				</div>
				<div class="form-group">
				<label>Enter Email</label>
				<input type="text" name="email" id="email" class="form-control"/>
				<span id="error_email" class="text-danger"></span>
				</div>
				<div class="form-group">
				<label>Enter Adresa</label>
				<input type="text" name="adresa" id="adresa" class="form-control"/>
				<span id="error_adresa" class="text-danger"></span>
				</div>
				<div class="form-group">
				<label>Enter Telefon</label>
				<input type="text" name="telefon" id="telefon" class="form-control"/>
				<span id="error_telefon" class="text-danger"></span>
				</div>
								
				
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert"/>
					<input type="hidden" name="hidden_id" id="hidden_id"/>
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert"/>
				</div>
			</form>	
			</div>	
			<div id="action_alert" title="Action">
			</div>	
			<div id="delete_confirmation" title="confirmation">
			<p> Are you sure you want to Delete this data?</p>
			</div>
			<center>
			<form method="post" action="Export.php">
			<input type="submit" name="export" class="btn btn-success" value="Download" />
			</form><br/>
			<form method="post" action="primapaginaserverprimarie.php">
			<input type="submit" name="return" class="btn btn-success" value="Return to the server" />
			</form>
			</center>
	
</body>
</html>


<script>
	$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#user_data').html(data);
			}
		});
	}
	
	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
	
	$('#add').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('insert');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_name = '';
		var error_prenume = '';
		var error_email = '';
		var error_adresa = '';
		var error_telefon = '';
		if($('#name').val() == '')
		{
			error_name = 'Name is required';
			$('#error_name').text(error_name);
			$('#name').css('border-color', '#cc0000');
		}
		else
		{
			error_name = '';
			$('#error_name').text(error_name);
			$('#name').css('border-color', '');
		}
		if($('#prenume').val() == '')
		{
			error_prenume = 'Prenume is required';
			$('#error_prenume').text(error_prenume);
			$('#prenume').css('border-color', '#cc0000');
		}
		else
		{
			error_prenume = '';
			$('#error_prenume').text(error_prenume);
			$('#prenume').css('border-color', '');
		}
		if($('#email').val() == '')
		{
			error_email = 'Email is required';
			$('#error_email').text(error_email);
			$('#email').css('border-color', '#cc0000');
		}
		else
		{
			error_email = '';
			$('#error_email').text(error_email);
			$('#email').css('border-color', '');
		}
		if($('#adresa').val() == '')
		{
			error_adresa = 'Adresa is required';
			$('#error_adresa').text(error_adresa);
			$('#adresa').css('border-color', '#cc0000');
		}
		else
		{
			error_adresa = '';
			$('#error_adresa').text(error_adresa);
			$('#adresa').css('border-color', '');
		}
		if($('#telefon').val() == '')
		{
			error_telefon = 'Telefon is required';
			$('#error_telefon').text(error_telefon);
			$('#telefon').css('border-color', '#cc0000');
		}
		else
		{
			error_telefon = '';
			$('#error_telefon').text(error_telefon);
			$('#telefon').css('border-color', '');
		}
		
		if(error_name != '' || error_prenume != '' || error_email != '' || error_adresa != '' || error_telefon != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data: form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});
	
	$('#action_alert').dialog({
		autoOpen:false
	});
	
	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#name').val(data.name);
				$('#prenume').val(data.prenume);
				$('#email').val(data.email);
				$('#adresa').val(data.adresa);
				$('#telefon').val(data.telefon);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
	
	});
</script>