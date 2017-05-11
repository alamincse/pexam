<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$time = date( 'Y-m-d H:i:s' );

		DB::table( 'products' )->insert(
			array(
	            array( 'name' => 'iPhone','quantity' => '45','price' => '200', 'created_at' => $time, 'updated_at' => $time ),
	            array( 'name' => 'Laptop','quantity' => '78','price' => '100', 'created_at' => $time, 'updated_at' => $time ),
	            array( 'name' => 'Mobile','quantity' => '89','price' => '20', 'created_at' => $time, 'updated_at' => $time ),
	            array( 'name' => 'Key','quantity' => '9','price' => '500', 'created_at' => $time, 'updated_at' => $time ),
	            array( 'name' => 'Dummy','quantity' => '12','price' => '800', 'created_at' => $time, 'updated_at' => $time ),
	            array( 'name' => 'Test','quantity' => '43','price' => '20', 'created_at' => $time, 'updated_at' => $time ),
	            array( 'name' => 'Locker','quantity' => '10','price' => '30', 'created_at' => $time, 'updated_at' => $time ),
      		)
		);
	}

}
