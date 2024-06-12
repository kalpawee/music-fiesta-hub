<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('date');
            $table->string('venue');
            $table->string('featured_band');
            $table->decimal('ticket_price', 8, 2);
            $table->text('description');
            $table->timestamps();
        });
    }
};
