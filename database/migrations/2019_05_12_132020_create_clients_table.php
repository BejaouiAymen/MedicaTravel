<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');
			$table->text('nom_prenom');
			$table->text('description');
			$table->text('pays');
			$table->string('URL', 500);
			$table->text('email');
			$table->integer('telephone');
            $table->timestamps(); 
			$table->integer('hotel_id')->unsigned();			
			$table->integer('clinique_id')->unsigned();			
			
			$table->foreign('hotel_id')->references('id')
	      		->on('hotels')->onDelete('cascade');
			$table->foreign('clinique_id')->references('id')
	      		->on('cliniques')->onDelete('cascade');
        });
		Schema::create('chirurgien_client', function (Blueprint $table) {
            $table->integer('chirurgien_id')->unsigned();
			$table->foreign('chirurgien_id')->references('id')
	      		->on('chirurgiens')->onDelete('cascade');
				
            $table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')
	      		->on('clients')->onDelete('cascade');
			$table->dateTime('date_deb');	
			$table->dateTime('date_fin');		
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('clients');
	   Schema::dropIfExists('chirurgien_client');
    }
}
