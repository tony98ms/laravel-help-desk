<?php

namespace TonyStore\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class Ticket extends Model
{
    use BelongsToThrough;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'ticket_type_id',
        'ticket_category_id',
        'body',
        'requester_id',
        'ticket_state_id',
        'user_id',
        'open_ticket_at',
        'assignmentt_at',
        'close_ticket_at',
        'ticket_state_id',
    ];
    public function user()
    {
        return $this->belongsTo(config('help-desk.models.user'));
    }
    public function requester()
    {
        return $this->belongsTo(config('help-desk.models.user'), 'requester_id');
    }
    public function type()
    {
        return $this->belongsTo(config('help-desk.models.ticket_type'), 'ticket_type_id');
    }
    public function category()
    {
        return $this->belongsTo(config('help-desk.models.ticket_category'), 'ticket_category_id');
    }
    public function state()
    {
        return $this->belongsTo(config('help-desk.models.ticket_state'), 'ticket_state_id');
    }
    public function priority()
    {
        return $this->belongsToThrough(config('help-desk.models.ticket_priority'), config('help-desk.models.ticket_category'));
    }
    public function comments()
    {
        return $this->hasMany(config('help-desk.models.ticket_comment'))->latest();
    }
    public function files()
    {
        return $this->morphMany(config('help-desk.models.ticket_file'), 'fileable');
    }
}
