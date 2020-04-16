<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('permanent_address');
            $table->string('current_address')->nullable();
            $table->float('amount')->nullable();
            $table->string('other_help', 400)->nullable();
            $table->string('email')->nullable();
            $table->string('contact');
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
        Schema::dropIfExists('donate_requests');
    }
}
