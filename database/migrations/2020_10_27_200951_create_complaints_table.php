<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('photo');
            $table->text('sevice_link');
            $table->foreignId('question_type')->constrained
            ('question_types')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedTinyInteger('subscribed')->default(1)->
            comment("[0=>not-subscribed , 1=>subscribed]");
            $table->text('question');            
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
        Schema::dropIfExists('complaints');
    }
}
