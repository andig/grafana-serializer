<?php

namespace Andig\GrafanaSerializer\Model;

use JMS\Serializer\Annotation as Serializer;

class Target
{
    const TYPE_TIMESERIES = 'timeseries';
    const TYPE_TABLE = 'table';

    /**
     * @Serializer\Type("string")
     */
    public $refId;

    /**
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @Serializer\Type("string")
     */
    public $format;

    /**
     * @Serializer\Type("string")
     */
    public $target;

    /**
     * @Serializer\Type("string")
     */
    public $data;

    public function __construct(string $target, string $type = self::TYPE_TIMESERIES)
    {
        $this->target = $target;
        $this->type = $type;
        $this->format = $type;
    }
}
