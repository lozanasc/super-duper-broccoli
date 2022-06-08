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
            $table->string('consolidation_plan')->nullable();
            $table->string('deed')->nullable();
            $table->string('transfer_cert')->nullable();
            $table->string('tax_clearance')->nullable();
            $table->string('tax_receipt')->nullable();
            $table->string('petition_form')->nullable();
            $table->string('cert_auth_reg')->nullable();
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
