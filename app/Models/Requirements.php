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
        'consolidation_plan',
        'deed',
        'transfer_cert',
        'tax_clearance',
        'tax_receipt',
        'petition_form',
        'cert_auth_reg',
    ];
}
