<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateSupermarketsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('supermarkets', function (BluePrint $table) {

				$table->id();
				$table->string('name');
				$table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
				$table->date('expires');
				$table->boolean('expired');
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

			Schema::modify('supermarkets', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('supermarkets');
     
		} 

}