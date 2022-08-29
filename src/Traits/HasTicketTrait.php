<?php

namespace TonyStore\HelpDesk\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasTicketTrait
{
    public function tickets()
    {
        return $this->hasMany(config('help-desk.models.ticket'), 'user_id');
    }
    public function my_tickets()
    {
        return $this->hasMany(config('help-desk.models.ticket'), 'requester_id');
    }
    public function assignTicket($ticket)
    {
        if (is_numeric($ticket)) {
            config('help-desk.models.ticket')::find($ticket)
                ->update([
                    'user_id' => $this->getKey(),
                    'assignmentt_at' => now()
                ]);
        }
    }
    /**
     * Scope a query to only include
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAssignTickets($query)
    {
        return $query->has('tickets');
    }
    /**
     * Scope a query to only include
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOpenTickets($query)
    {
        return $query->whereHas('tickets', function (Builder $subQuery) {
            $subQuery->whereNull('close_ticket_at');
        });
    }
    /**
     * Scope a query to only include
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClosetTickets($query)
    {
        return $query->whereHas('tickets', function (Builder $subQuery) {
            $subQuery->whereNotNull('close_ticket_at');
        });
    }
}
