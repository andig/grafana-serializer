<?php

namespace Andig\GrafanaSerializer\Model;

use JMS\Serializer\Annotation as Serializer;

class Dashboard
{
    const TIME_FROM = 'from';
    const TIME_TO = 'to';

    /**
     * @Serializer\Type("array<Andig\GrafanaSerializer\Model\Panel>")
     */
    public $panels = [];

    /**
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @Serializer\Type("int")
     */
    public $id;

    /**
     * @Serializer\Type("string")
     */
    public $uid;

    /**
     * @Serializer\Type("array<string>")
     */
    public $tags;

    /**
     * @Serializer\Type("array<string,string>")
     * @Serializer\SkipWhenEmpty
     */
    public $time = [];

    public function __construct(string $title, array $tags = [])
    {
        $this->title = $title;
        $this->tags = $tags;
    }

    public function setTime(string $key, $val)
    {
        $this->time[$key] = date_format($val, DATE_ATOM);
    }
}
