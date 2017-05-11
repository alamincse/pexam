@extends( 'master' )

@section( 'content' )
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 well" style="margin-top:30px;">
				<h2 class="page-header">
					Edit Product
					<a href="{{ url('/') }}" class="pull-right">Home</a>
				</h2>

				{{-- show success msg --}}
				@if( Session::has( 'msg' ) )
					<div class="alert alert-success">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p><i class="fa fa-check-circle"></i>&nbsp;{{ Session::get('msg') }}</p>
					</div><!-- .alert .alert-success  -->
				@endif

				@foreach( $edits as $edit )

				{!! Form::open( array('route' => array( 'product-update', $edit->id )) ) !!}
					<div class="form-group">
						{!! Form::label( 'name', 'Product name' ) !!}
						{!! Form::text( 'name', $edit->name, array('class' => 'form-control') ) !!}
						<span style="color:red;">
							@if( $errors->has('name') )
								{{ $errors->first('name') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					
					<div class="form-group">
						{!! Form::label( 'quantity', 'Quantity' ) !!}
						{!! Form::text( 'quantity', $edit->quantity, array('class' => 'form-control') ) !!}
						<span style="color:red;">
							@if( $errors->has('quantity') )
								{{ $errors->first('quantity') }}
							@endif
						</span>
					</div><!-- .form-group  -->


					<div class="form-group">
						{!! Form::label( 'price', 'Price' ) !!}
						{!! Form::text( 'price', $edit->price, array('class' => 'form-control') ) !!}
						<span style="color:red;">
							@if( $errors->has('price') )
								{{ $errors->first('price') }}
							@endif
						</span>
					</div><!-- .form-group  -->

					<div class="form-group">
						{!! Form::submit('Edit product', array('class'=>'btn btn-success btn-md')) !!}
					</div><!-- .form-group  -->
				{!! Form::token() !!}
				{!! Form::close() !!}

				@endforeach
			</div><!-- .col-lg-4  -->
		</div><!-- .row  -->

	</div><!--  .container  -->
@stop