<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_types', function (Blueprint $table) {
            $table->string('code', 1)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->primary();
            $table->text('name')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->notNullable();
            $table->unsignedBigInteger('display_order');
            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('access_types');
    }
}
