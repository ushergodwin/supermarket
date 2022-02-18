<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateChatTypingsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('chat_typings', function (BluePrint $table) {

				$table->id();
				$table->string('user_key');
				$table->string('status')->default('online');
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

			Schema::modify('chat_typings', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('chat_typings');
     
		} 

}