<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            //Pan młody
            $table->text('groom_first_name')->nullable(false);
            $table->text('groom_last_name')->nullable(false);
            $table->date('groom_birthdate')->nullable(false);
            $table->integer('groom_phone_number')->nullable(false);
            $table->text('groom_email')->nullable(false);

            //Panna młoda
            $table->text('bride_first_name')->nullable(false);
            $table->text('bride_last_name')->nullable(false);
            $table->date('bride_birthdate')->nullable(false);
            $table->integer('bride_phone_number')->nullable(false);
            $table->text('bride_email')->nullable(false);

            //Szczegóły wesela
            $table->text('music_for_first_dance')->nullable(true);
            $table->boolean('music_for_first_dance_original')->nullable(true);
            $table->boolean('music_for_first_dance_full_length')->nullable(true);
            $table->string('music_for_first_dance_start',16)->nullable(true);
            $table->string('music_for_first_dance_end',16)->nullable(true);
            $table->boolean('thanks_to_parents')->default(false);
            $table->text('thanks_to_partens_description')->nullable(true);
            $table->text('groom_parents_first_names')->nullable(true);
            $table->text('bride_parents_first_names')->nullable(true);

            $table->time('cake_time')->nullable(false);
            $table->time('meat_time')->nullable(false);


            //Posiadane usługi
            $table->boolean('services_music')->default(false);
            $table->boolean('services_photo')->default(false);
            $table->boolean('services_video')->default(false);

            //Dodatkowe atrakcje
            $table->boolean('our_services_lights')->default(false);
            $table->boolean('our_services_smoke')->default(false);
            $table->boolean('our_services_photo_booth')->default(false);
            $table->boolean('our_services_love_sign')->default(false);
            $table->boolean('our_services_bartending')->default(false);
            $table->boolean('our_services_live_instrumental')->default(false);

            //Dodatkowe informacje
            $table->dateTime('prepare_date')->nullable(true);
            $table->text('bride_prepare_address')->nullable(true);
            $table->text('groom_prepare_address')->nullable(true);

            $table->dateTime('wedding_date')->nullable(true);
            $table->text('wedding_address')->nullable(true);
            $table->dateTime('restaurant_come')->nullable(true);

            $table->dateTime('party_date')->nullable(false);
            $table->text('party_address')->nullable(false);

            $table->boolean('special_wishes_photo')->default(false);
            $table->text('special_wishes_photo_description')->nullable(true);
            $table->text('longer_movie')->nullable(true);
            $table->boolean('special_wishes_video')->default(false);
            $table->text('special_wishes_video_description')->nullable(true);
            $table->boolean('video_own_music_checkbox')->default(false);
            $table->text('video_own_music')->nullable(true);

            //$table->boolean('our_services_video_relation')->default(false);

            $table->text('own_music')->nullable(true);
            $table->text('forbidden_music')->nullable(true);
            $table->text('additional_attractions')->nullable(true);

            $table->text('wishes')->nullable(true);

            $table->unsignedBigInteger('dj')->index()->nullable(true);
            $table->foreign('dj')->references('id')->on('users');

            $table->unsignedBigInteger('photo')->index()->nullable(true);
            $table->foreign('photo')->references('id')->on('users');

            $table->unsignedBigInteger('operator')->index()->nullable(true);
            $table->foreign('operator')->references('id')->on('users');

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
        Schema::dropIfExists('weddings');
    }
}
