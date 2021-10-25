<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingsEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weddings_emails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding')->index()->nullable(true);
            $table->foreign('wedding')->references('id')->on('weddings');
            $table->text('email')->nullable(false);
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
        Schema::dropIfExists('weddings_emails');
    }
}
