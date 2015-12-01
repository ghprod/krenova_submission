<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('product')->nullable();
            $table->string('inspirator')->nullable();
            $table->text('problem')->nullable();
            $table->string('since')->nullable();
            $table->string('applied_at')->nullable();
            $table->text('benefit')->nullable();
            $table->text('obstacles')->nullable();
            $table->text('support_expectations')->nullable();
            $table->string('image')->nullable();
            $table->string('image_url')->nullable();
            $table->string('video')->nullable();
            $table->string('video_url')->nullable();
            $table->dateTime('publish_date')->nullable();
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
        Schema::drop('submissions');
    }
}
