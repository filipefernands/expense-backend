<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableExpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('value', 5, 2)->nullable();
            $table->date('due_date')->nullable();
            $table->date('pay_date')->nullable();
            $table->integer('repetition')->nullable();
            $table->string('desprition', 255)->nullable();
            $table->bigInteger('account_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->string('expense_paid', 1)->nullable();
            $table->boolean('expense_will_be_divided')->default(true)->nullable();
            $table->bigInteger('cast_to');
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('account');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense');
    }
}
