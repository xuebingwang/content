<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-02-18 16:22:07
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateTableComments.
 */
class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('log_id');
            $table->integer('user_id');
            $table->string('action');
            $table->integer('date');
            $table->bigInteger('post_id');
            $table->bigInteger('thread_id');
            $table->integer('thread_key');
            $table->integer('author_id');
            $table->string('author_name')->nullable();
            $table->string('author_email');
            $table->string('author_url')->nullable();
            $table->integer('author_key');
            $table->string('ip');
            $table->string('created_at');
            $table->text('message');
            $table->bigInteger('parent_id');
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('comments');
    }
}
