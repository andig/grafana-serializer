<?php

namespace Andig\GrafanaSerializer\Response;

use JMS\Serializer\Annotation as Serializer;

class GetDashboard
{
    /**
     * @Serializer\Type("Andig\GrafanaSerializer\Model\Dashboard")
     */
    public $dashboard;
}
