<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_main', function (Blueprint $table) {
            $table->bigIncrements('inquiry_id')->comment('AUTO_INCREMENT');
            $table->unsignedSmallInteger('subsite_id')->nullable();
            $table->string('inquiry_title', 400);
            $table->string('inquiry_name', 400);
            $table->string('email', 2000);
            $table->string('country_region', 200);
            $table->text('inquiry_message');
            $table->tinyInteger('is_completed')->default(0)->comment('0:未対応・対応中、1:対応済み');
            $table->tinyInteger('is_replied')->default(0)->comment('0:未返信、1:返信済み');
            $table->unsignedSmallInteger('updater_id')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('inquiry_main');
    }
}
