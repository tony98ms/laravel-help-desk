<?php

namespace TonyStore\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status'
    ];

    public function categories()
    {
        return $this->belongsToMany(
            config('help-desk.models.ticket_category'),
            config('help-desk.tables.ticket_category_type'),
            'ticket_type_id',
            'ticket_category_id',
        )->withTimestamps();
    }
    public function tickets()
    {
        return $this->hasMany(config('help-desk.models.ticket'), 'ticket_type_id');
    }
}
