<?php

namespace Andig\GrafanaSerializer\Model;

use JMS\Serializer\Annotation as Serializer;

class SeriesOverride
{
    /**
     * @Serializer\Type("string")
     */
    public $alias;

    /**
     * @Serializer\Type("string")
     */
    public $transform;

    public function __construct(string $alias)
    {
        $this->alias = $alias;
    }
}
