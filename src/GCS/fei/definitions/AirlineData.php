<?php
class GCS_fei_definitions_AirlineData extends GCS_DataObject
{
    /**
     * @var string
     */
    public $agentNumericCode = null;

    /**
     * @var string
     */
    public $code = null;

    /**
     * @var string
     */
    public $flightDate = null;

    /**
     * @var GCS_fei_definitions_AirlineFlightLeg[]
     */
    public $flightLegs = null;

    /**
     * @var string
     */
    public $invoiceNumber = null;

    /**
     * @var bool
     */
    public $isETicket = null;

    /**
     * @var bool
     */
    public $isRegisteredCustomer = null;

    /**
     * @var bool
     */
    public $isRestrictedTicket = null;

    /**
     * @var bool
     */
    public $isThirdParty = null;

    /**
     * @var string
     */
    public $issueDate = null;

    /**
     * @var string
     */
    public $merchantCustomerId = null;

    /**
     * @var string
     */
    public $name = null;

    /**
     * @var string
     */
    public $passengerName = null;

    /**
     * @var string
     */
    public $placeOfIssue = null;

    /**
     * @var string
     */
    public $pnr = null;

    /**
     * @var string
     */
    public $pointOfSale = null;

    /**
     * @var string
     */
    public $posCityCode = null;

    /**
     * @var string
     */
    public $ticketDeliveryMethod = null;

    /**
     * @var string
     */
    public $ticketNumber = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'agentNumericCode')) {
            $this->agentNumericCode = $object->agentNumericCode;
        }
        if (property_exists($object, 'code')) {
            $this->code = $object->code;
        }
        if (property_exists($object, 'flightDate')) {
            $this->flightDate = $object->flightDate;
        }
        if (property_exists($object, 'flightLegs')) {
            if (!is_array($object->flightLegs) && !is_object($object->flightLegs)) {
                throw new UnexpectedValueException('value \'' . print_r($object->flightLegs, true) . '\' is not an array or object');
            }
            $this->flightLegs = [];
            foreach ($object->flightLegs as $flightLegsElementObject) {
                $flightLegsElement = new GCS_fei_definitions_AirlineFlightLeg();
                $this->flightLegs[] = $flightLegsElement->fromObject($flightLegsElementObject);
            }
        }
        if (property_exists($object, 'invoiceNumber')) {
            $this->invoiceNumber = $object->invoiceNumber;
        }
        if (property_exists($object, 'isETicket')) {
            $this->isETicket = $object->isETicket;
        }
        if (property_exists($object, 'isRegisteredCustomer')) {
            $this->isRegisteredCustomer = $object->isRegisteredCustomer;
        }
        if (property_exists($object, 'isRestrictedTicket')) {
            $this->isRestrictedTicket = $object->isRestrictedTicket;
        }
        if (property_exists($object, 'isThirdParty')) {
            $this->isThirdParty = $object->isThirdParty;
        }
        if (property_exists($object, 'issueDate')) {
            $this->issueDate = $object->issueDate;
        }
        if (property_exists($object, 'merchantCustomerId')) {
            $this->merchantCustomerId = $object->merchantCustomerId;
        }
        if (property_exists($object, 'name')) {
            $this->name = $object->name;
        }
        if (property_exists($object, 'passengerName')) {
            $this->passengerName = $object->passengerName;
        }
        if (property_exists($object, 'placeOfIssue')) {
            $this->placeOfIssue = $object->placeOfIssue;
        }
        if (property_exists($object, 'pnr')) {
            $this->pnr = $object->pnr;
        }
        if (property_exists($object, 'pointOfSale')) {
            $this->pointOfSale = $object->pointOfSale;
        }
        if (property_exists($object, 'posCityCode')) {
            $this->posCityCode = $object->posCityCode;
        }
        if (property_exists($object, 'ticketDeliveryMethod')) {
            $this->ticketDeliveryMethod = $object->ticketDeliveryMethod;
        }
        if (property_exists($object, 'ticketNumber')) {
            $this->ticketNumber = $object->ticketNumber;
        }
        return $this;
    }
}
