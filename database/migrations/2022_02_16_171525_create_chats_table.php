<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateChatsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('chats', function (BluePrint $table) {

				$table->id();
				$table->string('sender');
				$table->string('receiver');
				$table->bigText('sender_message');
				$table->bigText('receiver_reply')->nullable();
				$table->string('chat_session_id');
				$table->date('sent_on');
				$table->time('sent_at');
			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('chats', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('chats');
     
		} 

}