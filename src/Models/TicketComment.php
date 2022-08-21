<?php

namespace TonyStore\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'body',
        'user_id',
    ];

    public function author()
    {
        return $this->belongsTo(config('help-desk.models.user'), 'user_id');
    }

    public function files()
    {
        return $this->morphMany(config('help-desk.models.ticket_file'), 'fileable');
    }
}
