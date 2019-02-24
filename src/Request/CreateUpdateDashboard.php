<?php

namespace Andig\GrafanaSerializer\Request;

use Andig\GrafanaSerializer\Model\Dashboard;
use JMS\Serializer\Annotation as Serializer;

class CreateUpdateDashboard
{
    /**
     * @Serializer\Type("Andig\GrafanaSerializer\Model\Dashboard")
     */
    public $dashboard;

    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("folderId")
     */
    public $folderId;

    /**
     * @Serializer\Type("bool")
     */
    public $overwrite;

    public function __construct(Dashboard $dashboard, $overwrite = false)
    {
        $this->dashboard = $dashboard;
        $this->overwrite = $overwrite;
    }
}
