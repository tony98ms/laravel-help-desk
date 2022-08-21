<?php

namespace TonyStore\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;

class TicketPriority extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
    public function categories()
    {
        return $this->hasMany(config('help-desk.models.ticket_category'), 'ticket_category_id');
    }
}
