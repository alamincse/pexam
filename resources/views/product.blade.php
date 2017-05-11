@extends( 'master' )

@section( 'content' )
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 well" style="margin-top:30px;">
				<h2 class="page-header">Product Information Form</h2>

				{{-- show success msg --}}
				@if( Session::has( 'msg' ) )
					<div class="alert alert-success">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
					</div><!-- .alert .alert-success  -->
				@endif


				{!! Form::open( array('url' => '/') ) !!}
					<div class="form-group">
						{!! Form::label( 'name', 'Product name' ) !!}
						{!! Form::text( 'name', ( Request::old('name') ) ? 'value = "'.e(Request::old('name')).'"' : '',  array('placeholder' => 'Product name', 'onfocus' => "if(this.placeholder == 'Product name'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Product name'}", 'class' => 'form-control input-sm') ) !!}
						<span style="color:red;">
							@if( $errors->has('name') )
								{{ $errors->first('name') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					
					<div class="form-group">
						{!! Form::label( 'quantity', 'Quantity' ) !!}
						{!! Form::text( 'quantity', ( Request::old('quantity') ) ? 'value = "'.e(Request::old('quantity')).'"' : '',  array('placeholder' => 'Quantity', 'onfocus' => "if(this.placeholder == 'Quantity'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Quantity'}", 'class' => 'form-control input-sm') ) !!}
						<span style="color:red;">
							@if( $errors->has('quantity') )
								{{ $errors->first('quantity') }}
							@endif
						</span>
					</div><!-- .form-group  -->


					<div class="form-group">
						{!! Form::label( 'price', 'Price' ) !!}
						{!! Form::text( 'price', ( Request::old('price') ) ? 'value = "'.e(Request::old('price')).'"' : '',  array('placeholder' => 'Price', 'onfocus' => "if(this.placeholder == 'Price'){this.placeholder = ''}", "onblur" => "if(this.placeholder == ''){this.placeholder = 'Price'}", 'class' => 'form-control input-sm') ) !!}
						<span style="color:red;">
							@if( $errors->has('price') )
								{{ $errors->first('price') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{!! Form::submit('Add product', array('class'=>'btn btn-success btn-md')) !!}
					</div><!-- .form-group  -->
				{!! Form::token() !!}
				{!! Form::close() !!}
			</div><!-- .col-lg-4  -->
		</div><!-- .row  -->

		@if( $products <> NULL ) :
			<div class="row">
				<div class="col-md-12">
					<h2 class="page-header">Product List</h2>
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<tr class="info">
								<th>Product name</th>
								<th>Quantity in stock</th>
								<th>Price per item</th>
								<th>Datetime submitted</th>
								<th>Total value number</th>
								<th>Action</th>
							</tr>
							@foreach( $products as $product )
								<tr>
									<td>{{ $product->name }}</td>
									<td>{{ $product->quantity }}</td>
									<td>${{ $product->price }}</td>
									<td>{{ $product->created_at }}</td>
									<td>${{ $product->total_price }}</td>
									<td>
										<a href="{{ URL::route( 'edits', $product->id ) }}"><span class="btn btn-danger">Edit</span></a>
									</td>
								</tr>

							@endforeach
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>@if( $total_sum <> 0 ) ${{ $total_sum }} @endif</td>
							</tr>
						</table><!-- .table .table-hober.table-bordered  -->
					</div><!-- .table-responsive  -->
				</div><!-- .col-md-12  -->
			</div><!-- .row  -->
		@endif
	</div><!--  .container  -->
@stop