<?php

class dinacResponseModel implements \JsonSerializable
{
    private $isCoatNeeded;
    private $description;

    public function __construct($response)
    {
        $this->isCoatNeeded = isset($response['isCoatNeeded']) ? $response['isCoatNeeded'] : null;
        $this->description = isset($response['description']) ? $response['description'] : null;
    }

    public function jsonSerialize()
    {
        return [
            'isCoatNeeded' => $this->isCoatNeeded,
            'description' => $this->description
        ];
    }
}
