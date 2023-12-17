<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    
    protected $fillable = [
        'full_name',
        'id_card_address',
        'current_address',
        'district',
        'regency',
        'province',
        'phone_number',
        'email',
        'nationality_status',
        'foreign_nationality',
        'birth_date',
        'birth_place',
        'gender',
        'marital_status',
        'religion',
        'document_path',
        'registration_status',
    ];

    public function setFillableAttributes($nationalityStatus)
    {
        if ($nationalityStatus === 'WNA') {
            $this->fillable[] = 'foreign_nationality';
        }
    }

    // Override the save method to set fillable attributes before saving
    public function save(array $options = [])
    {
        $this->setFillableAttributes($this->nationality_status);
        parent::save($options);
    }
    
    // You may also want to define accessors, mutators, and relationships here.
}

