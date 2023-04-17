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
            $table->string('title', 25)->upper()->nullable(false);
            $table->enum('type', ['Research Paper', 'Clinical Case']);
            $table->foreignId('topic_id')->constrained();
            $table->string('keywords');
            $table->text('introduction', 300);
            $table->text('objective', 300)->nullable();
            $table->text('method', 300)->nullable();
            $table->text('result', 300)->nullable();
            $table->text('conclusion', 300)->nullable();
            $table->text('diagnosis', 300)->nullable();
            $table->text('treatment', 300)->nullable();
            $table->text('discussion', 300)->nullable();
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
