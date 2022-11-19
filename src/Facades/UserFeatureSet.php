<?php

namespace Mawuva\UserFeatureSet\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mawuva\UserFeatureSet\Skeleton\SkeletonClass
 */
class UserFeatureSet extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'user-feature-set';
    }
}
