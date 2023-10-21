<?php
namespace App\Resolvers;

use Illuminate\Support\Facades\Request;

class IpAddressResolver implements \OwenIt\Auditing\Contracts\Resolver
{
    /**
     * {@inheritdoc}
     * @param Auditable $auditable
     */
    public static function resolve(Auditable|\OwenIt\Auditing\Contracts\Auditable $auditable): string
    {
        return Request::header('HTTP_X_FORWARDED_FOR', '0.0.0.0');
    }
}
