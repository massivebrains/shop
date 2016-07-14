$('#submitGame').click(function(e){
	e.preventDefault();

});

function startResult(){	
	for(i = 1; i<=49; i++){
		current = $('#n'+i);
		if(current.prop('disabled') == true){
			$('#n'+i).prop('disabled', false);
		}
	}
}

$('#submitResult').click(function(e){
	e.preventDefault();
	for(i = 1; i<=49; i++){
		current = $('#n'+i);
		if(current.prop('disabled') == true){
			$('#n'+i).removeClass('btn-danger').addClass('btn-black').prop('disabled', false);
		}
	}
	$('#choosen').empty(); $('#stack').val('');
	toastr.options = {progressBar: true, timeOut:7000};
	toastr.info(' Result Posted');	
});

