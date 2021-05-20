<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyConverterRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_converter_rates', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->string('query')->index();
            $table->decimal('rates', 14, 7);
            $table->tinyInteger('limit')->default(0);
            $table->timestamps();
            $table->unique(['day', 'query']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_converter_rates');
    }
}
