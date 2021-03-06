<?php
class GCS_payment_definitions_AddressPersonal extends GCS_fei_definitions_Address
{
    /**
     * @var GCS_payment_definitions_PersonalName
     */
    public $name = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new UnexpectedValueException('value \'' . print_r($object->name, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PersonalName();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
