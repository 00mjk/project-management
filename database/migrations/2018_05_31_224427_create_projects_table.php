<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('client_id')->nullable()->index();
            $table->integer('project_manager_id')->nullable()->index();
            $table->integer('product_owner_id')->nullable()->index();
            $table->integer('technical_leader_id')->nullable()->index();
            $table->text('urls')->nullable();
            $table->text('source_code')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')
                  ->references('id')->on('people')
                  ->onDelete('set null');

            $table->foreign('project_manager_id')
                  ->references('id')->on('people')
                  ->onDelete('set null');

            $table->foreign('product_owner_id')
                  ->references('id')->on('people')
                  ->onDelete('set null');

            $table->foreign('technical_leader_id')
                  ->references('id')->on('people')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
