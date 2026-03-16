<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalProfile extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'professional_type',
        'license_number',
        'license_state',
        'license_expiration',
        'license_upload',
        'business_name',
        'instagram',
        'website',
        'tax_id',
        'business_address',
        'school_name',
        'program_enrolled',
        'expected_graduation',
        'student_id_upload',
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
}
