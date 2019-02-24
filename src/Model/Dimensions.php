<?php

namespace Andig\GrafanaSerializer\Model;

use JMS\Serializer\Annotation as Serializer;

class Dimensions
{
    /**
     * @Serializer\Type("int")
     */
    public $x;

    /**
     * @Serializer\Type("int")
     */
    public $y;

    /**
     * @Serializer\Type("int")
     */
    public $w;

    /**
     * @Serializer\Type("int")
     */
    public $h;

    public function __construct(int $x, int $y, int $w, int $h)
    {
        $this->x = $x;
        $this->y = $y;
        $this->w = $w;
        $this->h = $h;
    }
}
