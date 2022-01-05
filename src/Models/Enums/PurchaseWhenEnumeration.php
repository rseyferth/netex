<?php
namespace Wipkip\NeTEx\Models\Enums;

/**
 * PurchaseWhenEnumeration 
 * 
 * This class was automatically generated based on the XSD 'netex-nl-geen-constraints.xsd'
 */

class PurchaseWhenEnumeration {
	const advanceOnly = 'advanceOnly';
	const untilPreviousDay = 'untilPreviousDay';
	const dayOfTravelOnly = 'dayOfTravelOnly';
	const advanceAndDayOfTravel = 'advanceAndDayOfTravel';
	const timeOfTravelOnly = 'timeOfTravelOnly';
	const subscriptionChargeMoment = 'subscriptionChargeMoment';
	const other = 'other';
}
