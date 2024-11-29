<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('tp')->default(null)->nullable();
            $table->string('code')->default(null)->nullable();
            $table->string('tp_scheme_no')->default(null)->nullable();
            $table->string('scheme_date')->default(null)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tp_schemes');
    }
};
