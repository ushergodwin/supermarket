<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateSupermarketItemsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('supermarket_items', function (BluePrint $table) {

				$table->id();
				$table->string('name');
				$table->integer('price');
				$table->string('category');
				$table->string('column_number');
				$table->string('position');
				$table->string('image')->nullable();
				$table->timestamps();
				$table->softDeletes();
				
			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('supermarket_items', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('supermarket_items');
     
		} 

}