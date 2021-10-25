<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 32)->nullable(false);
            $table->timestamps();
        });
        $this->init();
    }

    public function init()
    {
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'admin.group']);
        Permission::create(['name' => 'admin.permission']);
        Permission::create(['name' => 'admin.settings']);
        Permission::create(['name' => 'admin.user']);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
