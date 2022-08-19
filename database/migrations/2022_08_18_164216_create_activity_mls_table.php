<?php

use App\Models\Activity;
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
        Schema::create('activity_mls', function (Blueprint $table) {

            $table->foreignIdFor(Activity::class)->constrained()->cascadeOnDelete();
            $table->string('lng_code');
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->string('short_description')->nullable();
            $table->primary(['activity_id','lng_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_mls');
    }
};
