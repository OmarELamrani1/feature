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
        Schema::create('abstractsubmissions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->upper()->nullable(false);
            $table->enum('type', ['Research Paper', 'Clinical Case']);
            $table->foreignId('topic_id')->constrained();
            $table->string('keywords');
            $table->text('introduction');
            $table->text('objective')->nullable();
            $table->text('method')->nullable();
            $table->text('result')->nullable();
            $table->text('conclusion')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->text('discussion')->nullable();
            $table->boolean('affirmation')->default(0);
            $table->string('disclosure')->nullable();
            $table->string('tracking_code')->nullable()->unique();
            $table->foreignId('personne_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->foreignId('president_id')->nullable()->constrained();
            $table->boolean('modified')->default(0);
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
        Schema::dropIfExists('abstractsubmissions');
    }
};
