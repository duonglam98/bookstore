<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeFieldToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('books', 'code')) {
            Schema::table('books', function (Blueprint $table) {
                $table->string('code')->after('name')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('books', 'code')) {
            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('code');
            });
        }
    }
}
