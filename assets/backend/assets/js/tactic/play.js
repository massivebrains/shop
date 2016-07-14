function start(){
	$('#couponHolder').hide();
	setInterval(function(){
		count = $('#choosen').children().length;
		if((count < 3)){
			$('#submit').prop('disabled', true);
		}else{
			$('#submit').addClass('btn-warning');
			if($('#stack').val() == ''){
				$('#submit').prop('disabled', true);
			}else{
				$('#submit').removeClass('btn-warning').addClass('btn-success');
				$('#submit').prop('disabled', false);
			}
		} 
	}, 1000);
	for(i = 1; i<=49; i++){
		current = $('#n'+i);
		if(current.prop('disabled') == true){
			$('#n'+i).prop('disabled', false);
		}
	}
}



function selectNumber(number){
	//console.log(number);
	$('#n'+number).removeClass('btn-black').addClass('btn-danger');
	$('#n'+number).prop('disabled', true);
	$('#choosen').append('<button class="btn btn-sm btn-danger" style="margin-bottom:5px;" id="'+number+'" onclick="removeNumber('+number+')">'+number+'</button>&nbsp;');
}

function removeNumber(number){
	$('#'+number).remove();
	count = $('#choosen').children().length;
	if(count < 3)
		$('#submit').removeClass('btn-warning').removeClass('btn-success');
	choosen = $('#choosen').html();
	//console.log(choosen);
	$('#n'+number).removeClass('btn-danger').addClass('btn-black').prop('disabled', false);
}


$('#submit').click(function(e){
	e.preventDefault();
	for(i = 1; i<=49; i++){
		current = $('#n'+i);
		if(current.prop('disabled') == true){
			$('#n'+i).removeClass('btn-danger').addClass('btn-black').prop('disabled', false);
		}
	}
	$('#choosen').empty(); $('#stack').val('');
	toastr.options = {progressBar: true, timeOut:7000};
	$('#submit').removeClass('btn-success');
	toastr.info('SMS Sent to 09087657645', ' Game Played Successfully');
	$('#couponHolder').html('<h1 class="text-center semi-bold"><sup><small class="semi-bold">Coupon ID</small></sup>4958574</h1>');
	$('#couponHolder').fadeIn(3000).fadeOut(6500);
	
});


