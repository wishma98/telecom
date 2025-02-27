<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clouser extends Model
{
    use HasFactory;

    protected $table = 'clousers'; // Ensure table name matches the database

    protected $fillable = [
        'clouser_ID',
        'service_id',
        'category',
        'clouser_type',
        'clouser_amount',
        'location',
        'date_time',
        'message',
        'nooflocation',
        'connectiontype',

    ];

    protected $casts = [
        'date_time' => 'datetime',
        'clouser_ID' => 'string',
        'service_id' => 'string',
        'category' => 'string',
        'clouser_type' => 'string',
        'clouser_amount' => 'float',
        'location' => 'string',
        'message' => 'string',
        'nooflocation' => 'float',
        'connectiontype' => 'string',
    ];

    public $timestamps = true; // Ensure timestamps match the table's structure
}




