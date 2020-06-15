<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->mediumText('reason');
            $table->integer('time_lapse');
            $table->integer('user_id')->unsigned()->nullable();
            // $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habits');
        // Schema::table('habits', function (Blueprint $table) {
        //     $table->dropForeign('user_id');
        //     $table->dropIndex('user_id');
        // });

    }
}
