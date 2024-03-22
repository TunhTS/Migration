<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_threads', function (Blueprint $table) {
            $table->bigIncrements('inquiry_threads_id')->comment('AUTO_INCREMENT');
            $table->unsignedBigInteger('inquiry_id');
            $table->string('thread_title', 400);
            $table->unsignedSmallInteger('language_id')->nullable();
            $table->tinyInteger('is_reply')->default(0)->comment('0:受信、1:送信');
            $table->text('thread_content');
            $table->unsignedSmallInteger('creator_id')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('last_update_operation_log_id')->nullable();
            $table->string('mail_message_id', 225)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiry_threads');
    }
}
