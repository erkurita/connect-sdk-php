<?php
namespace GCS\Services;

use GCS\DataObject;

/**
 * Class BINLookupRequest
 *
 * @package GCS\Services
 */
class BINLookupRequest extends DataObject
{
    /**
     * @var string
     */
    public $bin = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bin')) {
            $this->bin = $object->bin;
        }
        return $this;
    }
}