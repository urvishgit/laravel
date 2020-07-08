<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasestudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casestudies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->string('title')->unique();
            $table->text('content')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('image')->nullable(true);

            $table->date('casestudy_date')->nullable(true);
            $table->string('casestudy_by')->nullable(true);
            $table->string('company')->nullable(true);
            $table->string('company_url')->nullable(true);
            $table->string('company_logo')->nullable(true);

            $table->string('seo_title')->nullable(true);
            $table->string('seo_description')->nullable(true);

            $table->string('slug');
            $table->boolean('status')->default(0);
            
            $table->string('published_at')->nullable(true);
            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('admins')->onDelete('cascade');
            
            $table->bigInteger('last_updated_by')->unsigned();
            $table->foreign('last_updated_by')->references('id')->on('admins')->onDelete('cascade');        
            
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
        Schema::dropIfExists('casestudies');
    }
}
