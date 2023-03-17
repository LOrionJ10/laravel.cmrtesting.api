<?php

namespace App\Formatters;

use App\Domain\Enterprise;

class EnterpriseFormatter
{
    public function toDomain($enterprises)
    {
        if (!is_array($enterprises))
            return new Enterprise($enterprises->_id->__toString(), $enterprises->name, $enterprises->location);

        $dataFormatter = [];
        foreach ($enterprises as $enterprise) {
            $enterprise = (object) $enterprise;
            $dataFormatter[] = new Enterprise($enterprise->_id->__toString(), $enterprise->name, $enterprise->location);
        }

        return $dataFormatter;
    }
}
