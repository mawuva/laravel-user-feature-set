<?php

namespace Mawuva\UserFeatureSet\Traits;

use Mawuekom\ModelUuid\Utils\GeneratesUuid;
use Mawuekom\PasswordHistory\Traits\HasPasswordHistory;

trait HasUserFeatureSet
{
    use GeneratesUuid, HasPasswordHistory;

    /**
     * The names of the columns that should be used for the UUID.
     *
     * @return array
     */
    public function uuidColumns(): array
    {
        return ["_id"];
    }

    /**
     * Get user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this ->first_name} {$this ->name}";
    }
}