function getShippingCostOptions(city) {
	$.ajax({
		type: 'POST',
		url: '/orders/shipping-cost',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'),
			city: city
		},
		success: function (response) {
			$('#shipping-cost-option').empty();
			$('#shipping-cost-option').append('<option value>- Please Select -</option>');

			$.each(response.results, function(key, result){
				$('#shipping-cost-option').append('<option value="'+ result.service.replace(/\s/g, '') +'">'+ result.service + ' | ' + result.cost + ' | ' + result.etd + '</option>');
			});
		}
	});
}

function getQuickView(product_slug) {
	$.ajax({
		type: 'GET',
		url: '/products/quick-view/' + product_slug,
		success: function (response) {
			$('#exampleModal').html(response);
			$('#exampleModal').modal();
		}
	});
}

(function($) {
	$('#user-province-id').on('change', function (e) {
		var province = e.target.value;

		$.get('/orders/cities?province=' + province, function(data){
			$('#user-city-id').empty();
			$('#user-city-id').append('<option value>- Please Select -</option>');

			$.each(data.cities, function(city, city){

			   $('#user-city-id').append('<option value="'+city+'">'+ city + '</option>');

		   });
		});
	});

	$('#province-id').on('change', function (e) {
		var province = e.target.value;

		$.get('/orders/cities?province=' + province, function(data){
			$('#city-id').empty();
			$('#city-id').append('<option value>- Please Select -</option>');

			$.each(data.cities, function(city, city){

			   $('#city-id').append('<option value="'+city+'">'+ city + '</option>');

		   });
		});
	});

	$('#shipping-province').on('change', function (e) {
		var province = e.target.value;

		$.get('/orders/cities?province=' + province, function(data){
			$('#shipping-city').empty();
			$('#shipping-city').append('<option value>- Please Select -</option>');

			$.each(data.cities, function(city, city) {

			   $('#shipping-city').append('<option value="'+city+'">'+ city + '</option>');

		   });
		});
	});

	// ======= Show Shipping Cost Options =========
	if ($('#city-id').val()) {
		getShippingCostOptions($('#city-id').val());
	}

	$('#city-id').on('change', function (e) {
		var city = e.target.value;

		if (!$('#ship-box').is(':checked')) {
			getShippingCostOptions(city);
		}
	});

	$('#shipping-city').on('change', function (e) {
		var city = e.target.value;
		getShippingCostOptions(city);
	});

	// ============ Set Shipping Cost ================
	$('#shipping-cost-option').on('change', function (e) {
		var shipping_service = e.target.value;
		var city = $('#city-id').val();

		if ($('#ship-box').is(':checked')) {
			city = $('#shipping-city').val();
		}

		$.ajax({
			type: 'POST',
			url: '/orders/set-shipping',
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'),
				city: city,
				shipping_service: shipping_service
			},
			success: function (response) {
				$('.total-amount').html(response.data.total);
			}
		});
	});

	$('.quick-view').on('click', function (e) {
		e.preventDefault();

		var product_slug = $(this).attr('product-slug');

		getQuickView(product_slug);
	});

	$('.add-to-card').on('click', function (e) {
		e.preventDefault();

		var product_type = $(this).attr('product-type');
		var product_id = $(this).attr('product-id');
		var product_slug = $(this).attr('product-slug');

		if (product_type == 'configurable') {
			getQuickView(product_slug);
		} else {
			$.ajax({
				type: 'POST',
				url: '/carts',
				data:{
					_token: $('meta[name="csrf-token"]').attr('content'),
					product_id: product_id,
					qty: 1
				},
				success: function (response) {
					location.reload(true);
				}
			});
		}
	});

	$('.add-to-fav').on('click', function (e) {
		e.preventDefault();

		var product_slug = $(this).attr('product-slug');

		$.ajax({
			type: 'POST',
			url: '/favorites',
			data:{
				_token: $('meta[name="csrf-token"]').attr('content'),
				product_slug: product_slug
			},
			success: function (response) {
				alert(response);
			},
			error: function (xhr, textStatus, errorThrown) {
				if (xhr.status == 401) {
					$('#loginModal').modal();
				}

				if (xhr.status == 422) {
					alert(xhr.responseText);
				}
			}
		});
	});

})(jQuery);
