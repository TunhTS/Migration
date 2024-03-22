<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryMainAttachmentFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_main_attachment_file', function (Blueprint $table) {
            $table->unsignedInteger('inquiry_main_attachment_file_id')->autoIncrement();
            $table->unsignedBigInteger('inquiry_id');
            $table->string('attachment_file_name', 255);
            $table->string('attachment_file_path', 255)->comment('S3へのパス');
            $table->unsignedSmallInteger('creater_id')->nullable()->comment('投稿者から返信の場合はNull');
            $table->dateTime('created_at');
            $table->unsignedBigInteger('last_update_operation_log_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiry_main_attachment_file');
    }
}
