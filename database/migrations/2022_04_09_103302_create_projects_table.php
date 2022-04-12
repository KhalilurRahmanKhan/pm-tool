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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('code');
            $table->integer('initiated_for');
            $table->String('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->integer('project_owner');
            $table->String('remarks');
            $table->String('attachment')->default('fgsd');
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
        Schema::dropIfExists('projects');
    }
};
