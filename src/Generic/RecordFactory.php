<?php

namespace CoMAPI\Generic;

use stdClass;
use \CoMAPI\Generic\RecordList;
use \CoMAPI\Generic\ListFactory;
use CoMAPI\Generic\Record;

class RecordFactory
{
    /**
     * Creates a new Record or a child class of Record with the given data.
     *
     * @param bool|string|array|stdClass $json The data to create the Record from.
     * @param string $recordType The name of the class to create. Must be a child of Record.
     * @return Record The created Record object.
     * @throws \InvalidArgumentException If $recordType is not a child of Record or does not exist.
     */
    public static function create($json = false, string $recordType = Record::class): Record
    {

        if (!class_exists($recordType)) {
            throw new \InvalidArgumentException("$recordType does not exist.");
        }

        if (!is_a($recordType, Record::class)) {
            throw new \InvalidArgumentException("$recordType must be a Record or a child of Record.");
        }

        return new $recordType($json);
    }
}
