<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->enum('gender', ['0', '1', '2'])->default(0); // 0=Other, 1=Male, 2=Femail
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('phone')->nullable();
            $table->string('attachment')->nullable(); // profile picture

            $table->unsignedBigInteger('user_id'); // foreign key for users table
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // join relationship on users table

            $table->unsignedBigInteger('location_id')->nullable(); // foreign key for location table
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // join relationship on locations table

            $table->softDeletes(); // soft delete
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
        Schema::dropIfExists('customers');
    }
};
