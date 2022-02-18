<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateChatRequestsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('chat_requests', function (BluePrint $table) {

				$table->id();
				$table->string('request_by');
				$table->string('respondent')->nullable();
				$table->bigText('reason');
				$table->string('session_id')->unique()->nullable();
				$table->date('sent_on');
				$table->time('sent_at');
				$table->boolean('request_status')->default(1);
			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('chat_requests', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('chat_requests');
     
		} 

}