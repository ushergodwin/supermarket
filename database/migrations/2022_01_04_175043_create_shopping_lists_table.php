<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateShoppingListsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('shopping_lists', function (BluePrint $table) {

				$table->id();
				$table->string('list_name', 20);
				$table->string('list_status', 10)->default('active');
				$table->string('list_owner', 60);
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

			Schema::modify('shopping_lists', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('shopping_lists');
     
		} 

}