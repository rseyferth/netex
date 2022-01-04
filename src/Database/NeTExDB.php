<?php

namespace Wipkip\NeTEx\Database;

class NeTExDB
{


    /**
     * @var \SQLite3
     */
    protected $db;

    public function __construct($path) {
        $this->db = new \SQLite3($path);
        $this->prepareTables();
    }

    public function prepareTables() {




    }

}