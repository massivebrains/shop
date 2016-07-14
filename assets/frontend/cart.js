$.get(site_url+'shop/order/cartcount', function(response){
	$('#cartcount').html(response);
})

function addToCart(sku) {
	qty = $('#'+sku).val();
	url = site_url+'shop/order/add_to_cart';
	data = {'sku':sku, 'qty':qty};
	$.post(url, data, function(response){
		console.log(response);
		if(response == 1) {
			toastr.options = {'progressBar': true, 'timeOut': 1000};
			toastr.success('', 'Product Added To cart');
			$.get(site_url+'shop/order/cartcount', function(response){
				$('#cartcount').html(response);
			})
		}
	})

}

function updateQty(rowid, sku) {
	qty = $('#'+sku).val();
	url = site_url+'shop/order/updatecart';
	data = {'rowid':rowid, 'qty':qty};
	$.post(url, data, function(response){
		console.log(response);
		response = JSON.parse(response);
		console.log(response.message);
		if(qty == 0)
			window.location.reload(false);
		$('#item-subtotal-'+sku).html(response.subtotal);
		$('#subtotal').html(response.total);
		$('#total').html(response.total);
		toastr.options = {'progressBar': true, 'timeOut': 1000};
		toastr.success('', 'Quantity Updated.');
	})
}

function removeProduct(rowid) {
	url = site_url+'shop/order/updatecart';
	data = {'rowid':rowid, 'qty':0};
	$.post(url, data, function(response){
		toastr.options = {progressBar: false, timeOut: 1500};
		toastr.success('', 'Product removed.');
		window.location.reload(false);
	})
}

// toastr.options = {progressBar: true};
// toastr.success('Record Added Succesfully', 'grade: '+ $scope.grade);
// toastr.options = {progressBar: true};
// toastr.error('Record Not Added Succesfully', 'An Unexpected Error Occured');
