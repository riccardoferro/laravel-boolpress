<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //with the property table we edit the table posts
        Schema::table('posts', function(Blueprint $table) {
            // here we create the column
            $table->unsignedBigInteger(('category_id'));
 
            // here we say what table the column refers to
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('posts', function(Blueprint $table) {
            // here we eliminate the column, dropForeign(nometabella_colonnaDellaTabella_foreign)
            $table->dropForeign(('posts_category_id_foreign'));
            $table->dropColumn('category_id');
            

         });
    }
}
