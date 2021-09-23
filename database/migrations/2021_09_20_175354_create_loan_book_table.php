<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_book', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'fk_loan_book_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('book_id');
            $table->foreign('book_id', 'fk_loan_book_book')->references('id')->on('books')->onDelete('restrict')->onUpdate('restrict');
            $table->date('date');
            $table->string('loaned_to', 100);
            $table->boolean('status');
            $table->date('return_date')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_book');
    }
}
