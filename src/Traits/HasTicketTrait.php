<?php

namespace TonyStore\HelpDesk\Traits;

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
}
