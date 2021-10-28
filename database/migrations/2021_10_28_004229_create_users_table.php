<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateUsersTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('users', function (BluePrint $table) {

				$table->bigIncrements('id');
				$table->string('fname', 30);
				$table->string('lname', 35);
				$table->string('email', 35)->unique();
				$table->string('phone', 13)->unique();
				$table->string('account')->default('customer');
				$table->string('password');
				$table->string('img_url')->nullable();
				$table->bigText('roles')->default('view items,');
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

			Schema::modify('users', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('users');
     
		} 

}