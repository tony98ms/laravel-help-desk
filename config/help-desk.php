<?php

return [

    /**
     * Nombres de las tablas que se definirán a la hora de
     * ejecutar la migración
     */
    'tables' => [
        'user' => 'users',
        'ticket' => 'tickets',
        'ticket_priorities' => 'ticket_priorities',
        'ticket_types' => 'ticket_types',
        'ticket_categories' => 'ticket_categories',
        'ticket_comments' => 'ticket_comments',
        'ticket_events' => 'ticket_events',
        'ticket_states' => 'ticket_states',
    ],

    /**
     * Modelo usado para suscripciones, usado para las relaciones
     * del Trait
     */
    'models' => [
        'user' => \App\Models\User::class,
        'ticket' => \TonyStore\HelpDesk\Models\Ticket::class,
        'ticket_priority' => \TonyStore\HelpDesk\Models\TicketPriority::class,
        'ticket_type' => \TonyStore\HelpDesk\Models\TicketType::class,
        'ticket_category' => \TonyStore\HelpDesk\Models\TicketCategory::class,
        'ticket_comment' => \TonyStore\HelpDesk\Models\TicketComment::class,
        'ticket_event' => \TonyStore\HelpDesk\Models\TicketEvent::class,
        'ticket_state' => \TonyStore\HelpDesk\Models\TicketState::class,
    ]

];
