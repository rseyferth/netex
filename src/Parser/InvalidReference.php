<?php

namespace Wipkip\NeTEx\Parser;

class InvalidReference
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var null|string
     */
    public $version;

    /**
     * @var string
     */
    public $elementName;

    public function __construct(string $id, ?string $version, ?string $elementName = null)
    {
        $this->id = $id;
        $this->version = $version;
        $this->elementName = $elementName;
    }
}