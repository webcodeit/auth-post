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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('content');
            $table->string('author')->nullable();
            $table->enum('status', ['Draft', 'Pending', 'Rejected', 'Approved'])->default('Draft');
            $table->date('issuance_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->timestamp('approved_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
