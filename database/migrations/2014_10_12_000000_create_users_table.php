<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //$table->integer('id');
            $table->primary('id')->autoIncrement();
            $table->string('name',50);
            $table->string('surname',50);
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',50);
            $table->string('companyName',50)->nullable();
            $table->string('companyWeb',50)->nullable();
            $table->string('linkedin',50)->nullable();
            $table->string('position',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('mobile',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('postalAddress',50)->nullable();
            $table->string('company',50)->nullable();
            $table->integer('companySize')->nullable();
            $table->string('sector',50)->nullable();
            $table->integer('averageClientSize')->nullable();
            $table->integer('averageClientTicket')->nullable();
            $table->string('idSalesforce',100)->nullable();
            $table->boolean('LMS')->nullable();
            $table->boolean('ownGames')->nullable();
            $table->boolean('instructionalDesigner')->nullable();
            $table->rememberToken();
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

        Schema::dropIfExists('users');
    }
}
