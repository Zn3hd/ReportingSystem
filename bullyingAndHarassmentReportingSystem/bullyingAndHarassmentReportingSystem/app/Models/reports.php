<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reports extends Model
{ protected $fillable = [
    'report_date_time',
    'incident_date_time',
    'first_name',
    'middle_name',
    'last_name',
    'incident_location',
    'nature_of_incident',
    'incident_details',
    'suspect_charges',
    'arrested_relation',
    'name_of_victims',
    'bullying_type',
    'result_in_injury',
    'reported_to_nurse',
    'reported_to_police',
    'bully_behaviors',
    'Description',
    'physical_evidence',
    'file_upload',
  
];
}
