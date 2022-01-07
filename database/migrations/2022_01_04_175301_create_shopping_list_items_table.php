<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateShoppingListItemsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('shopping_list_items', function (BluePrint $table) {

				$table->id();
				$table->foreignId('shopping_list_id')->constrained('shopping_lists')->cascadeOnDelete();
				$table->string('item_name');
				$table->integer('item_price');
				$table->string('item_column_number', 20);
				$table->string('item_position', 10);
				$table->string('supermarket', 20);
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

			Schema::modify('shopping_list_items', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('shopping_list_items');
     
		} 

}