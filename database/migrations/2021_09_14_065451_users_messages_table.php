<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
        $table->unsignedInteger('message_id');
        $table->unsignedInteger('sender_id');
        $table->unsignedInteger('receiver_id');
        $table->tinyInteger('type')->default(0)->comment('1:group message, 0:personal message');
        $table->tinyInteger('seen-status')->default(0)->comment('1:seen');
        $table->tinyInteger('deliver-status')->default(0)->comment('1:delivered');
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
        //
    }
}
