<?php

use App\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWeddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wedding', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wedding_id')->index();
            $table->foreign('wedding_id')->references('id')->on('weddings');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        $this->init();
    }

    public function init()
    {

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_wedding');
    }
}
