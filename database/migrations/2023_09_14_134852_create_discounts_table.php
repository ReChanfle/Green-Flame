<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');// Crear un campo `id` bigint unsigned NOT NULL AUTO_INCREMENT
            $table->string('name', 100)->collation('utf8mb4_unicode_ci'); // Crear un campo `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
            $table->dateTime('start_date'); // Crear un campo `start_date` datetime NOT NULL
            $table->dateTime('end_date'); // Crear un campo `end_date` datetime NOT NULL
            $table->unsignedInteger('priority')->default(0); // Crear un campo `priority` int unsigned NOT NULL DEFAULT '0'
            $table->tinyInteger('active')->default(0); // Crear un campo `active` tinyint(1) NOT NULL DEFAULT '0'
            $table->unsignedBigInteger('region_id'); // Crear un campo `region_id` bigint unsigned NOT NULL
            $table->unsignedBigInteger('brand_id'); // Crear un campo `brand_id` bigint unsigned NOT NULL
            $table->string('access_type_code', 1)->collation('utf8mb4_unicode_ci'); // Crear un campo `access_type_code` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
            $table->timestamps(); // Crear automáticamente campos `created_at` y `updated_at`
            $table->softDeletes(); // Crear automáticamente campo `deleted_at`
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            // Crear índices y restricciones de clave externa
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('access_type_code')->references('code')->on('access_types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
