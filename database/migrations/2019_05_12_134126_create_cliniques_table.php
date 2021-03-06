<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cliniques', function (Blueprint $table) {
          $table->increments('id');
			$table->text('titre');
			$table->text('description');
			$table->float('prix');
			$table->string('URL', 500);
			$table->integer('year');
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
       Schema::dropIfExists('cliniques');
    }
}
