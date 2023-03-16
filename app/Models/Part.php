<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'serial_number', 'is_registered', 'car_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
