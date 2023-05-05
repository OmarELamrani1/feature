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
        Schema::table('abstractsubmissions', function (Blueprint $table) {
            $table->text('introduction')->nullable()->change();
            $table->text('objective')->nullable()->change();
            $table->text('method')->nullable()->change();
            $table->text('result')->nullable()->change();
            $table->text('conclusion')->nullable()->change();
            $table->text('diagnosis')->nullable()->change();
            $table->text('treatment')->nullable()->change();
            $table->text('discussion')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abstractsubmissions', function (Blueprint $table) {
            //
        });
    }
};
