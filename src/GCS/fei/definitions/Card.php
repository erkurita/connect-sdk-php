<?php
class GCS_fei_definitions_Card extends GCS_fei_definitions_CardWithoutCvv
{
    /**
     * @var string
     */
    public $cvv = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'cvv')) {
            $this->cvv = $object->cvv;
        }
        return $this;
    }
}
