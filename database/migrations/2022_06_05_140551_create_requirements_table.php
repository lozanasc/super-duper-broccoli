<?php

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
        // 'user',
        // 'type',
        // 'form',
        // 'sworn_statement',
        // 'demo_permit',
        // 'valid_id',
        // 'auth_letter',
        // 'tax_declaration',
        // 'order_of_award_issuance_patent',
        // 'deed_of_sale',
        // 'pin',
        // 'survey_plan',
        // 'machine_receipts',
        // 'lease_contract',
        // 'tax_clearance',
        // 'transfer_cert',
        // 'secretary_cert',
        // 'sale_cert',
        // 'zoning_cert',
        // 'barangay_cert',
        // 'completion_cert',
        // 'consolidation_plan',
        // 'sketch_plan',
        // 'color_pic_front',
        // 'color_pic_side_1',
        // 'color_pic_side_2',
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('type');
            $table->string('appointment_id');
            $table->string('for');
            $table->string('form')->nullable();
            $table->string('sworn_statement')->nullable();
            $table->string('demo_permit')->nullable();
            $table->string('bldg_permit')->nullable();
            $table->string('valid_id')->nullable();
            $table->string('auth_letter')->nullable();
            $table->string('tax_declaration')->nullable();
            $table->string('order_of_award_issuance_patent')->nullable();
            $table->string('deed_of_sale')->nullable();
            $table->string('pin')->nullable();
            $table->string('survey_plan')->nullable();
            $table->string('machine_receipts')->nullable();
            $table->string('lease_contract')->nullable();
            $table->string('tax_clearance')->nullable();
            $table->string('transfer_cert')->nullable();
            $table->string('secretary_cert')->nullable();
            $table->string('sale_cert')->nullable();
            $table->string('zoning_cert')->nullable();
            $table->string('barangay_cert')->nullable();
            $table->string('completion_cert')->nullable();
            $table->string('consolidation_plan')->nullable();
            $table->string('sketch_plan')->nullable();
            $table->string('color_pic_front')->nullable();
            $table->string('color_pic_side_1')->nullable();
            $table->string('color_pic_side_2')->nullable();
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
        Schema::dropIfExists('requirements');
    }
};
