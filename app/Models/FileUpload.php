<?php

namespace App\Models;

use App\Traits\Mutator\GenUid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory, GenUid;

    protected $fillable = [
        'report_id',
        'filename',
        'filepath',
        'filetype',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
