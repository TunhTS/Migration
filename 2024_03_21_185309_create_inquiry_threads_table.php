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
            $table->unsignedInteger('inquiry_threads_id')->autoIncrement();
            $table->unsignedSmallInteger('inquiry_id');
            $table->string('thread_title', 400);
            $table->unsignedSmallInteger('language_id')->nullable()->comment('送信の時のみセットする');
            $table->tinyInteger('is_reply')->default(0)->comment('0:受信、1:送信');
            $table->text('thread_content');
            $table->unsignedSmallInteger('creator_id')->nullable()->comment('投稿者から返信の場合はNull');
            $table->dateTime('created_at');
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
