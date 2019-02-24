<?php

namespace Andig\GrafanaSerializer\Model;

use JMS\Serializer\Annotation as Serializer;

class Panel
{
    const TYPE_GRAPH = 'graph';
    const TYPE_TEXT = 'text';
    const TYPE_SINGLESTAT = 'singlestat';

    /**
     * @Serializer\Type("int")
     */
    public $id;

    /**
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @Serializer\Type("array<string,string>")
     * @Serializer\SerializedName("aliasColors")
     * @Serializer\SkipWhenEmpty
     */
    public $aliasColors = [];

    /**
     * @Serializer\Type("bool")
     */
    public $bars;

    /**
     * @Serializer\Type("bool")
     */
    public $dashes;

    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("dashLength")
     */
    public $dashLength;

    /**
     * @Serializer\Type("string")
     */
    public $datasource;

    /**
     * @Serializer\Type("int")
     */
    public $decimals;

    /**
     * @Serializer\Type("int")
     */
    public $fill;

    /**
     * @Serializer\Type("Andig\GrafanaSerializer\Model\Dimensions")
     * @Serializer\SerializedName("gridPos")
     * @Serializer\SkipWhenEmpty
     */
    public $gridPos;

    /**
     * @Serializer\Type("bool")
     */
    public $lines;

    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("linewidth")
     */
    public $lineWidth;

    /**
     * @Serializer\Type("array<string>")
     * @Serializer\SkipWhenEmpty
     */
    public $links = [];

    /**
     * @Serializer\Type("bool")
     */
    public $percentage;

    /**
     * @Serializer\Type("bool")
     */
    public $points;

    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("pointradius")
     */
    public $pointRadius;

    /**
     * @Serializer\Type("string")
     */
    public $renderer;

    /**
     * @Serializer\Type("array<Andig\GrafanaSerializer\Model\SeriesOverride>")
     * @Serializer\SerializedName("seriesOverrides")
     * @Serializer\SkipWhenEmpty
     */
    public $seriesOverrides = [];

    /**
     * @Serializer\Type("bool")
     */
    public $stack;

    /**
     * @Serializer\Type("array<Andig\GrafanaSerializer\Model\Target>")
     * @Serializer\SkipWhenEmpty
     */
    public $targets = [];

    /**
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("steppedLine")
     */
    public $steppedLine;

    /**
     * @Serializer\Type("array<Andig\GrafanaSerializer\Model\YAxis>")
     * @Serializer\SerializedName("yaxes")
     */
    public $yAxes = [];

    public function __construct(string $title, string $type = self::TYPE_GRAPH)
    {
        $this->type = $type;
        $this->title = $title;
    }
}
