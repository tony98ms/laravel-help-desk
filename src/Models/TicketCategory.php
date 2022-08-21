<?php

namespace TonyStore\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    const CATEGORY     = 1;
    const SUBCATEGORY  = 2;
    const ACTIVE = 1;
    const INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'ticket_priority_id',
        'ticket_category_id',
        'type',
    ];
    public function tickets()
    {
        return $this->hasMany(config('help-desk.models.ticket'), 'ticket_category_id');
    }
    public function types()
    {
        return $this->belongsToMany(
            config('help-desk.models.ticket_type'),
            config('help-desk.tables.ticket_category_type'),
            'ticket_category_id',
            'ticket_type_id',
        );
    }
    public function subcategories()
    {
        return $this->hasMany(config('help-desk.models.ticket_category'), 'ticket_category_id');
    }
    public function category()
    {
        return $this->belongsTo(config('help-desk.models.ticket_category'), 'ticket_category_id');
    }
}
