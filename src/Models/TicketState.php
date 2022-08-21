<?php

namespace TonyStore\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;

class TicketState extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function tickets()
    {
        return $this->hasMany(config('help-desk.models.ticket'), 'ticket_type_id');
    }
}
