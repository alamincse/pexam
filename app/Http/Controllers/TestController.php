<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class TestController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['title'] = 'Laravel Apps';
		
		$data['products'] = DB::table( 'products' )
	    	->select( DB::raw( '(price*quantity) as total_price, id, name, quantity, price, created_at' ) )
	    	->orderBy( 'created_at', 'DESC' )
	   	 	->get();

	   	$data['total_sum'] = DB::table( 'products' )->sum( DB::raw( '(price*quantity)' ) );

		return view( 'product', $data );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request ) 
	{
		/** Set rules */
		$rules = array(
			'name'     => 'required',
			'quantity' => 'required',
			'price'    => 'required'
		);

		$this->validate( $request, $rules );

		$product_info = new Product;

		$product_info->name 	= $request['name'];
		$product_info->quantity = $request['quantity'];
		$product_info->price 	= $request['price'];

		$info = $product_info->save();

		if( $info )
			return redirect( '/' )->with( 'msg', 'Well done! You have successfully added your new product.' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id )
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id )
	{
		$data['title'] = 'Laravel Apps';
		
		$data['edits'] = Product::where( 'id', $id )->get();

		return view( 'edit_product', $data );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( Request $request, $id )
	{
		/** Set rules */
		$rules = array(
			'name'     => 'required',
			'quantity' => 'required',
			'price'    => 'required' 
		);

		$this->validate( $request, $rules ); 

		$product_info = new Product;

		$updated = Product::where( 'id', $id )
			->update(array(
				'name' 		=> $request['name'],
				'quantity'  => $request['quantity'],
				'price' 	=> $request['price']
			));

		if( $updated ) 
			return redirect( '/edit/'.$id )->with( 'msg', 'Well done! You have successfully updated your product.' );

	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
