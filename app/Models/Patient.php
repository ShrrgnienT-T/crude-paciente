<?php

namespace App\Models;

use App\Casts\CpfCast;
use App\Casts\CnsCast;
use App\Casts\PhoneCast;
use App\Casts\DateToBRCast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'cns',
        'name',
        'birth',
        'email',
        'phone',
        'county_id'
    ];
    

    protected function casts(): array
    {
        return [
            'cpf' => CpfCast::class,
            'birth' => DateToBRCast::class,
            'cns'=> CnsCast::class,
            'phone'=> PhoneCast::class

        ];
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
