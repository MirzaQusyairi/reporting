<?php

namespace App\Models;

use App\Traits\Mutator\GenUid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory, GenUid;

    protected $fillable = [
        'user_id',
        'type_id',
        'detail',
        'status',
    ];

    public function typeexpense()
    {
        return $this->belongsTo(TypeExpense::class, 'type_id');
    }

    public function evidence()
    {
        return $this->hasMany(FileUpload::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
