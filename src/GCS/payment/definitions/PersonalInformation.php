<?php
class GCS_payment_definitions_PersonalInformation extends GCS_DataObject
{
    /**
     * @var string
     */
    public $dateOfBirth = null;

    /**
     * @var string
     */
    public $gender = null;

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
        if (property_exists($object, 'dateOfBirth')) {
            $this->dateOfBirth = $object->dateOfBirth;
        }
        if (property_exists($object, 'gender')) {
            $this->gender = $object->gender;
        }
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
