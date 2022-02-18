<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateNotebooksTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('notebooks', function (BluePrint $table) {

				$table->id();
				$table->string('user_id', 60);
				$table->string('note_name', 60)->unique();
				$table->string('supermarket_name')->nullable();
				$table->text('notes')->nullable();
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

			Schema::modify('notebooks', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('notebooks');
     
		} 

}