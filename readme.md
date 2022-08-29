[![Latest Stable Version](http://poser.pugx.org/tonystore/laravel-help-desk/v)](https://packagist.org/packages/tonystore/laravel-help-desk) [![Total Downloads](http://poser.pugx.org/tonystore/laravel-help-desk/downloads)](https://packagist.org/packages/tonystore/laravel-help-desk) [![License](http://poser.pugx.org/tonystore/laravel-help-desk/license)](https://packagist.org/packages/tonystore/laravel-help-desk) [![PHP Version Require](http://poser.pugx.org/tonystore/laravel-help-desk/require/php)](https://packagist.org/packages/tonystore/laravel-help-desk)
# Laravel Help Desk
Es un paquete para Laravel que permite generar tickets de soporte para cualquier aplicación de Laravel


# Instalación

Instalar el paquete:
```bash
composer require tonystore/laravel-help-desk
```

Publicar el archivo de configuración y migraciones:
```bash
php artisan vendor:publish --provider="TonyStore\HelpDesk\HelpDeskServiceProvider"
```

Configurar los nombres de las tablas con los que se crearán las migraciones en el archivo de configuración subscriptions.php:
```php
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
        'ticket_category_type' => 'ticket_category_type',
        'ticket_comments' => 'ticket_comments',
        'ticket_files' => 'ticket_files',
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
        'ticket_category_type' => \TonyStore\HelpDesk\Models\TicketCategoryType::class,
        'ticket_comment' => \TonyStore\HelpDesk\Models\TicketComment::class,
        'ticket_file' => \TonyStore\HelpDesk\Models\TicketFile::class,
        'ticket_state' => \TonyStore\HelpDesk\Models\TicketState::class
    ]

];

```

Migrar las tablas:
```bash
php artisan migrate
```