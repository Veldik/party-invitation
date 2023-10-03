<?php

namespace App\Models;

use App\Enums\GuestStatus;
use App\Mail\Invite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use OwenIt\Auditing\Contracts\Auditable;

class Guest extends Model implements Auditable
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'addressing',
        'email',
        'status',
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
        Mail::to($this->email)->send(new Invite($this));

        $this->invitation_sent_at = now();
        $this->save();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guest) {
            $guest->key = bin2hex(random_bytes(12));
        });
    }
}
