<?php

declare(strict_types=1);


namespace App\Module\Users\Events;

final class UserCreatedEvent
{
    public function __construct(
        public int $userId
    ) {
    }
}
