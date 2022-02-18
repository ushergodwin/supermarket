<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateSupermarketVisitorsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('supermarket_visitors', function (BluePrint $table) {

				$table->id();
				$table->string('visitor_email', 40);
				$table->string('supermarket_name');
				$table->timestamp('visited_on');
				$table->integer('no_of_visits')->default(1);
			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('supermarket_visitors', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('supermarket_visitors');
     
		} 

}