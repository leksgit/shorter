<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('short', 8)->unique();
            $table->string('source_url', 2048);
            $table->dateTime('available_until');
            $table->unsignedBigInteger('allowed_number_of_uses')->default(0);
            $table->unsignedBigInteger('number_of_uses')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('links');
    }
};
