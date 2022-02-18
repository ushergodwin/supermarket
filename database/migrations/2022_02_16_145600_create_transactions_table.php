<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateTransactionsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('transactions', function (BluePrint $table) {

				$table->id();
				$table->string('email', 40);
				$table->unsignedInteger('amount');
				$table->string('txt_ref', 50);
				$table->string('transaction_id', 15);
				$table->timestamp('transaction_at');
				$table->date("expires_on")->default(NULL);
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

			Schema::modify('transactions', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('transactions');
     
		} 

}