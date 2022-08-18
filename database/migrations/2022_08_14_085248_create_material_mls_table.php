<?php

use App\Models\Material;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_mls', function (Blueprint $table) {

            $table->foreignIdFor(Material::class)->constrained()->cascadeOnDelete();
            $table->string('lng_code');
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->text('text')->nullable();
            $table->primary(['material_id','lng_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_mls');
    }
};
