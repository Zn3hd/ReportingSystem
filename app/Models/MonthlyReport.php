<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class MonthlyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'year',
        'total_reports',
        // Add other fields as needed
    ];

    // Define the relationship with the Reports model
    public function reports()
    {
        return $this->hasMany(Reports::class);
    }
}