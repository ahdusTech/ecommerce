@extends('themes.ezone.layout')

@section('content')
	<!-- header end -->
	<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('https://images.pexels.com/photos/3769747/pexels-photo-3769747.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }});
    background-position-y: center;
    background-size: cover;">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<h2>Checkout Page</h2>
				<ul>
					<li><a href="{{ url('/') }}">home</a></li>
					<li> Checkout Page</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- checkout-area start -->
	<div class="checkout-area ptb-100">
		<div class="container">
			@include('admin.partials.flash', ['$errors' => $errors])

			{!! Form::model($user, ['url' => 'orders/checkout']) !!}
			<div class="row">
				<div class="col-lg-6 col-md-12 col-12">
					<div class="checkbox-form">
						<h3>Billing Details</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>First Name <span class="required">*</span></label>
									{!! Form::text('first_name', null, ['required' => true]) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Last Name <span class="required">*</span></label>
									{!! Form::text('last_name', null, ['required' => true]) !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Company Name</label>
									{!! Form::text('company') !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Address <span class="required">*</span></label>
									{!! Form::text('address1', null, ['required' => true, 'placeholder' => 'Home number and street name']) !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									{!! Form::text('address2', null, ['placeholder' => 'Apartment, suite, unit etc. (optional)']) !!}
								</div>
							</div>
							<div class="col-md-12">
								{{--  <div class="checkout-form-list">  --}}
									{{--  <label>Province<span class="required">*</span></label>  --}}
									{{--  {!! Form::select('province', $provinces, Auth::user()->province, ['id' => 'province-id', 'placeholder' => '- Please Select - ', 'required' => true]) !!}  --}}

								{{--  </div>  --}}

                                    <label for="province">Province:</label>
                                    <select class="form-control" id="province-id-3" name="province">
                                      <option value="">-- Select Province --</option>
                                      <option value="punjab">Punjab</option>
                                      <option value="sindh">Sindh</option>
                                      <option value="kpk">KPK</option>
                                      <option value="balochistan">Balochistan</option>
                                      <option value="gilgit_baltistan">Gilgit Baltistan</option>
                                      <option value="islamabad">Islamabad</option>
                                    </select>

							</div>
							<div class="col-md-6">
								{{--  <div class="checkout-form-list">  --}}
									{{--  <label>City<span class="required">*</span></label>  --}}
									{{--  {!! Form::select('city', $cities, null, ['id' => 'city-id', 'placeholder' => '- Please Select -', 'required' => true])!!}  --}}

								{{--  </div>  --}}
                                <div class="form-group" id="city-select">
                                    <label for="city">City:</label>
                                    <select class="form-control" id="city-id-3" name="city">
                                      <option value="">-- Select City --</option>
                                    </select>
                                </div>
							</div>
							<div class="col-md-6">
								{{--  <div class="checkout-form-list">  --}}
									{{--  <label>Postcode / Zip <span class="required">*</span></label>  --}}
									{{--  {!! Form::number('postcode', null, ['required' => true, 'placeholder' => 'Postcode']) !!}  --}}
								{{--  </div>  --}}

                                <div class="form-group" id="postcode-select" >
                                    <label for="postcode">Postcode:</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" required>
                                  </div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Phone  <span class="required">*</span></label>
									{!! Form::text('phone', null, ['required' => true, 'placeholder' => 'Phone']) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Email Address </label>
									{!! Form::text('email', null, ['placeholder' => 'Email', 'readonly' => true]) !!}
								</div>
							</div>
						</div>
						<div class="different-address">
							<div class="ship-different-title">
								<h3>
									<label>Ship to a different address?</label>
									<input id="ship-box" type="checkbox" name="ship_to"/>
								</h3>
							</div>
							<div id="ship-box-info">
								<div class="row">
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>First Name <span class="required">*</span></label>
											{!! Form::text('shipping_first_name') !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Last Name <span class="required">*</span></label>
											{!! Form::text('shipping_last_name') !!}
										</div>
									</div>
									<div class="col-md-12">
										<div class="checkout-form-list">
											<label>Company Name</label>
											{!! Form::text('shipping_company') !!}
										</div>
									</div>
									<div class="col-md-12">
										<div class="checkout-form-list">
											<label>Address <span class="required">*</span></label>
											{!! Form::text('shipping_address1', null, ['placeholder' => 'Home number and street name']) !!}
										</div>
									</div>
									<div class="col-md-12">
										<div class="checkout-form-list">
											{!! Form::text('shipping_address2', null, ['placeholder' => 'Apartment, suite, unit etc. (optional)']) !!}
										</div>
									</div>
									<div class="col-md-12">
										<div class="checkout-form-list">
											{{--  <label>Province<span class="required">*</span></label>  --}}
											{{--  {!! Form::select('shipping_province', $provinces, null, ['id' => 'shipping-province', 'placeholder' => '- Please Select - ']) !!}  --}}
											{{--  {!! Form::select('shipping_province', ['id' => 'shipping-province', 'placeholder' => '- Please Select - ']) !!}  --}}
										{{--  </div>  --}}

                                            <label for="province">Province:</label>
                                            <select class="form-control" id="shipping-province" name="shipping_province">
                                              <option value="">-- Select Province --</option>
                                              <option value="punjab">Punjab</option>
                                              <option value="sindh">Sindh</option>
                                              <option value="kpk">KPK</option>
                                              <option value="balochistan">Balochistan</option>
                                              <option value="gilgit_baltistan">Gilgit Baltistan</option>
                                              <option value="islamabad">Islamabad</option>
                                            </select>
                                          </div>


									</div>
									<div class="col-md-6">
										<div class="checkout-form-list" id="city-select-2">
											{{--  <label>City<span class="required">*</span></label>  --}}
											{{--  {!! Form::select('shipping_city_id', [], null, ['id' => 'shipping-city','placeholder' => '- Please Select -'])!!}  --}}


                                                <label for="city">City:</label>
                                                <select class="form-control" id="shipping-city" name="shipping_city">
                                                  <option value="">-- Select City --</option>
                                                </select>



                                        </div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Postcode / Zip <span class="required">*</span></label>
											{!! Form::number('shipping_postcode', null, ['placeholder' => 'Postcode']) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Phone  <span class="required">*</span></label>
											{!! Form::text('shipping_phone', null, ['placeholder' => 'Phone']) !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Email </label>
											{!! Form::text('shipping_email', null, ['placeholder' => 'Email']) !!}
										</div>
									</div>
								</div>
							</div>
							<div class="order-notes">
								<div class="checkout-form-list mrg-nn">
									<label>Order Notes</label>
									{!! Form::textarea('note', null, ['cols' => 30, 'rows' => 10,'placeholder' => 'Notes about your order, e.g. special notes for delivery.']) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-12">
					<div class="your-order">
						<h3>Your order</h3>
						<div class="your-order-table table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-name">Product</th>
										<th class="product-total">Total</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($items as $item)
										@php
											$product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
											$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg')
										@endphp
										<tr class="cart_item">
											<td class="product-name">
												{{ $item->name }}	<strong class="product-quantity"> × {{ $item->quantity }}</strong>
											</td>
											<td class="product-total">
												<span class="amount">{{ number_format(\Cart::get($item->id)->getPriceSum()) }}</span>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="2">The cart is empty! </td>
										</tr>
									@endforelse
								</tbody>
								<tfoot>
									<tr class="cart-subtotal">
										<th>Subtotal</th>
										<td><span class="amount">{{ number_format(\Cart::getSubTotal()) }}</span></td>
									</tr>
									<tr class="cart-subtotal">
										<th>Tax</th>
										<td><span class="amount">{{ number_format(\Cart::getCondition('TAX 10%')->getCalculatedValue(\Cart::getSubTotal())) }}</span></td>
									</tr>
									<tr class="cart-subtotal">
										<th>Shipping Cost ({{ $totalWeight }} kg)</th>
										<td><select id="shipping-cost-option" required name="shipping_service"></select></td>
									</tr>
									<tr class="order-total">
										<th>Order Total</th>
										<td><strong><span class="total-amount">{{ number_format(\Cart::getTotal()) }}</span></strong>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="payment-method">
							<div class="payment-accordion">
								<div class="panel-group" id="faq">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1">Direct Bank Transfer.</a></h5>
										</div>
										<div id="payment-1" class="panel-collapse collapse show">
											<div class="panel-body">
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Cheque Payment</a></h5>
										</div>
										<div id="payment-2" class="panel-collapse collapse">
											<div class="panel-body">
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a></h5>
										</div>
										<div id="payment-3" class="panel-collapse collapse">
											<div class="panel-body">
												<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="order-button-payment">
									<input type="submit" value="Place order" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<!-- checkout-area end -->
    <script>
        window.onload = function(){
          $("#province-id-3").change(function() {
            let province = $(this).val();
            let cities = {
              punjab: ["Lahore", "Faisalabad", "Rawalpindi", "Multan"],
              sindh: ["Karachi", "Hyderabad", "Sukkur", "Larkana"],
              kpk: ["Peshawar", "Mardan", "Abbottabad", "Swat"],
              balochistan: ["Quetta", "Kalat", "Sibi", "Chaman"],
              gilgit_baltistan: ["Gilgit", "Skardu", "Chilas", "Astore"],
              islamabad: ["Islamabad", "Rawalpindi", "Murree", "Taxila"],
            };


            if (province in cities) {
              $("#city-id-3").empty();
              $('#city-id-3').append('<option value="">Select City</option>');
              for (let i = 0; i < cities[province].length; i++) {
                $("#city-id-3").append(

                  $("<option>").val(cities[province][i]).text(cities[province][i])
                );
              }
              $("#city-select").show();
            }
          });

              $("#shipping-province").change(function() {
                let province = $(this).val();
                let cities = {
                  punjab: ["Lahore", "Faisalabad", "Rawalpindi", "Multan"],
                  sindh: ["Karachi", "Hyderabad", "Sukkur", "Larkana"],
                  kpk: ["Peshawar", "Mardan", "Abbottabad", "Swat"],
                  balochistan: ["Quetta", "Kalat", "Sibi", "Chaman"],
                  gilgit_baltistan: ["Gilgit", "Skardu", "Chilas", "Astore"],
                  islamabad: ["Islamabad", "Rawalpindi", "Murree", "Taxila"],
                };


                if (province in cities) {
                  $("#shipping-city").empty();
                  $('#shipping-city').append('<option value="">Select City</option>');
                  for (let i = 0; i < cities[province].length; i++) {
                    $("#shipping-city").append(
                      $("<option>").val(cities[province][i]).text(cities[province][i])
                    );
                  }
                  $("#city-select-2").show();
                }
              });

        }

            </script>
@endsection
