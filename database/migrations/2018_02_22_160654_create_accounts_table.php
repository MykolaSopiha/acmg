<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile_id')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('viewer_id')->nullable();
            $table->string('viewer_pass')->nullable();
            $table->text('schedule')->nullable();
            $table->integer('status');
            $table->text('comment')->nullable();
            $table->integer('confirmed_by')->unsigned()->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
