<?php

namespace Andig\GrafanaSerializer\Response;

use JMS\Serializer\Annotation as Serializer;

class SearchDashboardsAndFolders
{
    /**
     * @Serializer\Type("int")
     */
    public $id;

    /**
     * @Serializer\Type("string")
     */
    public $uid;

    /**
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @Serializer\Type("array<string>")
     * @Serializer\SkipWhenEmpty
     */
    public $tags = [];

    /**
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("isStarred")
     */
    public $isStarred;

    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("folderId")
     */
    public $folderId;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("folderUid")
     */
    public $folderUid;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("folderTitle")
     */
    public $folderTitle;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("folderUrl")
     */
    public $folderUrl;
}
