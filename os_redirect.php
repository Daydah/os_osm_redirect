<?php
/**
 * @version            2.12.2
 * @package            Joomla
 * @subpackage         Membership Pro
 * @author             Tuan Pham Ngoc
 * @copyright          Copyright (C) 2010 - 2018 Ossolution Team
 * @license            GNU/GPL, see LICENSE.php
 */
// no direct access
defined('_JEXEC') or die;

class os_redirect extends MPFPayment
{
	/**
	 * Constructor functions, init some parameter
	 *
	 * @param \Joomla\Registry\Registry $params
	 * @param array                     $config
	 */
	public function __construct($params, $config = array())
	{
		parent::__construct($params, $config);


		/*if ($params->get('mode'))
		{
			$this->url = 'the_payment_gateway_url_in_live_mode';
		}
		else
		{
			$this->url = 'the_payment_gateway_url_in_test_mode';
		}

		$this->setParameter('merchant_id', $params->get('merchant_id'));*/

		// Additional constructor code goes here
	}

	/**
	 * Process Payment
	 *
	 * @param OSMembershipTableSubscriber $row
	 * @param array                       $data
	 */
	public function processPayment($row, $data)
	{
		/**
		 * Call $this->setParameter method to pass the data to your payment gateway. Each payment gateway requires
		 * different parameters, so please read your payment gateway manual for to see the data you have to pass to the payment gateway.
		 *
		 * Below are sample code:
		 */

		/*$this->setParameter('amount', round($data['amount'], 2));
		$this->setParameter('description', $data['item_name']);
		$this->setParameter('currency_code', $data['currency']);*/

		/**
		 * Then call $this->renderRedirectForm() method, Membership Pro will render a form with hidden parameters to submit
		 * the data (which you passed using setParameter method to your payment gateway.
		 */

		//$this->renderRedirectForm();
	}

	/**
	 * Verify payment
	 *
	 * @return bool
	 */
	public function verifyPayment()
	{
		 $row    = JTable::getInstance('OsMembership', 'Subscriber');
	   	 $app    = JFactory::getApplication();
		$Itemid = $app->input->getInt('Itemid', 0);
			$siteUrl = JUri::base();
		
				if ($this->validate())
		{
			/*$id            = $this->notificationData['registrant_id_param'];
			$transactionId = $this->notificationData['transaction_id_param'];

			$row = JTable::getInstance('OsMembership', 'Subscriber');

			if (!$row->load($id))
			{
				return false;
			}

			// If the subsctiption is active, it was processed before, return false
			if ($row->published)
			{
				return false;
			}

			// Check and make sure the transaction is only processed one time
			if ($transactionId && OSMembershipHelper::isTransactionProcessed($transactionId))
			{
				return false;
			}

			// This will final the process, set subscription status to active, trigger onMembershipActive event, sending emails to subscriber and admin...
			$this->onPaymentSuccess($row, $transactionId);*/
		}
	}


	/**
	 * Validate the post data from Payment gateway to our server
	 *
	 * @return string
	 */
	protected function validate()
	{
		// Store data passed from payment gateway to the system to use it later
		$this->notificationData = $_REQUEST;

		// Validate the callback data, return true if it is valid and false otherwise
		return true;
	}
}
