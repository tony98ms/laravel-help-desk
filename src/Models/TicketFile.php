<?php

namespace TonyStore\HelpDesk\Models;

use Illuminate\Database\Eloquent\Model;

class TicketFile extends Model
{
    protected $fillable = [
        'name',
        'extension',
        'file',
    ];
    public function fileable()
    {
        return $this->morphTo();
    }
}
