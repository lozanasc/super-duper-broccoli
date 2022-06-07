<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    use HasFactory;
    protected $fillable = [
        // Reference by email
        'user',
        'appointment_id',
        'type',
        'for',
        'form',
        'sworn_statement',
        'bldg_permit',
        'demo_permit',
        'valid_id',
        'auth_letter',
        'tax_declaration',
        'order_of_award_issuance_patent',
        'deed_of_sale',
        'pin',
        'survey_plan',
        'machine_receipts',
        'lease_contract',
        'tax_clearance',
        'transfer_cert',
        'secretary_cert',
        'sale_cert',
        'sketch_plan',
        'zoning_cert',
        'barangay_cert',
        'completion_cert',
        'consolidation_plan',
        'color_pic_front',
        'color_pic_side_1',
        'color_pic_side_2',
    ];
}
