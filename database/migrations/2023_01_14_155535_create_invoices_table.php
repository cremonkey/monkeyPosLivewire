<?php

use App\Models\Company;
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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('Company_id')->constrained('companies');
            $table->string('company');
            $table->string('Data');
            $table->decimal('invoice_no')->default(0);
            $table->decimal('total');
            $table->decimal('discount');
            $table->decimal('tax');
            $table->decimal('ship');
            $table->decimal('total_due');
            $table->boolean('statue')->default(0);
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
        Schema::dropIfExists('invoices');
    }
};
