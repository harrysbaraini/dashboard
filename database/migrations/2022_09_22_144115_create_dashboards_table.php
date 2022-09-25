<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('settings');
            $table->json('widgets');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('dashboard_user', function (Blueprint $table) {
            $table->unsignedBigInteger('dashboard_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('dashboard_id')->references('id')->on('dashboards')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboards');
    }
};
