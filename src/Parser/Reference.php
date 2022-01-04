<?php

namespace Wipkip\NeTEx\Parser;

class Reference
{

    public $id;

    public $version;

    /**
     * @var string
     */
    public $elementName;

    public function __construct($id, $version, $elementName = null)
    {
        $this->id = $id;
        $this->version = $version;
        $this->elementName = $elementName;
    }
}