<?php

namespace App\Models;

use App\Enums\GuestStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Guest extends Model implements Auditable
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'addressing',
        'email',
        'arrive',
        'invitation_sent_at',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    protected $casts = [
        'status' => GuestStatus::class
    ];

    public function sendInvitation()
    {
        $this->invitation_sent_at = now();
        $this->save();
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($guest) {
            $guest->key = bin2hex(random_bytes(12));
        });
    }
}
