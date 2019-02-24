<?php

namespace Andig\GrafanaSerializer\Model;

use JMS\Serializer\Annotation as Serializer;

class YAxis
{
    /**
     * @Serializer\Type("string")
     */
    public $format;

    /**
     * @Serializer\Type("string")
     */
    public $label;

    /**
     * @Serializer\Type("int")
     */
    public $min;

    /**
     * @Serializer\Type("int")
     */
    public $max;

    /**
     * @Serializer\Type("bool")
     */
    public $show = true;

    public function __construct(string $format)
    {
        $this->format = $format;
    }
}
