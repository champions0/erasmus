<?php

use App\Models\Partner;
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
        Schema::create('partner_mls', function (Blueprint $table) {

            $table->foreignIdFor(Partner::class)->constrained()->cascadeOnDelete();
            $table->string('lng_code');
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->primary(['partner_id','lng_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_mls');
    }
};
