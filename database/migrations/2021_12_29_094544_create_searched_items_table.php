<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateSearchedItemsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('searched_items', function (BluePrint $table) {

				$table->id();
				$table->integer('item_id');
				$table->string('search_status')->default('found');
				$table->string('searched_item_name', 50)->nullable();
				$table->integer('number_of_searches')->default(1);
				$table->timestamps(); 

			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('searched_items', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('searched_items');
     
		} 

}