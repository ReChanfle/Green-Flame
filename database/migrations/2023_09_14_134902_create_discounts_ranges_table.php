<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts_ranges', function (Blueprint $table) {
            $table->bigIncrements('id'); // Crear un campo `id` bigint unsigned NOT NULL AUTO_INCREMENT
            $table->unsignedInteger('from_days'); // Crear un campo `from_days` int unsigned NOT NULL
            $table->unsignedInteger('to_days'); // Crear un campo `to_days` int unsigned NOT NULL
            $table->double('discount')->nullable(); // Crear un campo `discount` double DEFAULT NULL
            $table->string('code', 15)->collation('utf8mb4_unicode_ci')->nullable(); // Crear un campo `code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
            $table->unsignedBigInteger('discount_id'); // Crear un campo `discount_id` bigint unsigned NOT NULL
            $table->timestamps(); // Crear automáticamente campos `created_at` y `updated_at`
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            // Crear índice y restricción de clave externa
            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts_ranges');
    }
}
