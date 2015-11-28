<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('photo')->logo();
            $table->string('role');
            $table->date('birthday');
            $table->text('short_description');
            $table->text('description');

            $table
                ->integer('command_id')
                ->unsigned()
            ;

            $table
                ->foreign('command_id')
                ->references('id')
                ->on('commands')
                ->onDelete('CASCADE')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
