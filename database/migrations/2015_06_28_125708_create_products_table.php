<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->bigInteger('product_id');c
             $table->char('sid',60);c
              $table->bigInteger('type_id');c
               $table->bigInteger('has_discount');c
               
               
                $table->boolean('is_disabled');c
                 $table->string('price');c
                  $table->bigInteger('product_id');c 
                  $table->bigInteger('product_id');c
			$table->timestamps();
            
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
