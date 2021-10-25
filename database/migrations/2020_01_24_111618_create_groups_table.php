<?php

use App\Models\Group;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable(false);
            $table->timestamps();
        });
        $this->init();
    }

    public function init()
    {
        Group::create(['name'=>'Użytkownik']);
        Group::create(['name'=>'Moderator']);
        Group::create(['name'=>'Administrator']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
