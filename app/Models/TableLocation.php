<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableLocation extends Model
{
    use HasFactory;
    protected $table = 'table_location';
    protected $fillable = [
        // 'connection_type',
        'location_name',
        'END_A_LONGITUDE',
        'END_A_LATITUDE',
        'END_A_PHOTO',
        'END_B_LONGITUDE',
        'END_B_LATITUDE',
        'END_B_PHOTO',
        'LEA',
        'clouser_used',
    ];
}
