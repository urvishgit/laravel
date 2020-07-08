<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('display_name');
            $table->text('description');
            $table->text('icon');
            $table->string('route')->default('admin.home');
            $table->boolean('trash')->default(0);
            $table->string('trash_route')->nullable(true);
            $table->integer('order')->default(0);
            $table->boolean('is_administrator_module')->default(0);
            $table->string('slug');
            $table->boolean('status')->default(0);
            $table->string('published_at')->nullable(true);
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
        Schema::dropIfExists('modules');
    }
}
