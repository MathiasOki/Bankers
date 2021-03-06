<?php


/**
 * DOCUMENTATION IN THIS DOCUMENT IS NOT LONGER VALID.
 * PLEASE ASK DEVELOPER ABOUT THIS CODE.
 */


class Satan{

    private static $instance;
	private static $server = "http://188.166.97.195:8080/";

    public static function init(){
        if(self::$instance == NULL){
            $className = __CLASS__;
            self::$instance = new $className();
        }
        return self::$instance;
    }

    private function __construct(){

    }

	public function checkServer(){
		$host = self::$server . '/check';
		if($host == true){
			return true;
		} else {
			return false;
		}
	}

	/**
 	 * Method for getting data from server and convert to array.
 	 *
	 * @type must be a valid type.
 	 * @identification must be an user or account.
 	 * @return the data as array.
	 */

	private function getData($type, $identification){
		if(!empty($identification)){
			$data = self::$server . 'user/' . $identification . '/' . $type;
		}
		else {
			$data = self::$server . $type;
		}

		$data = @file_get_contents($data);
		if($data === FALSE){
			$error = true;
			return $error;
		}
		else {
			$data = json_decode($data, true);

			return $data;
		}
	}

	/**
 	 * Get all users.
 	 *
 	 * @return all users.
	 */

	public function getUsers(){
		$data = $this->getData(NULL, "all");

		return $data;
	}

	/**
 	 * Get information about one user.
 	 *
 	 * @identification must be an valid user.
 	 * @return information about user.
	 */

	public function getUser($identification){
		$data = $this->getData(NULL, $identification);

		return $data;
	}

	/**
 	 * Get accounts for one user.
 	 *
 	 * @identification must be an valid user.
 	 * @return users accounts.
	 */

	public function getAccounts($identification){
		$data = $this->getData("account/all", $identification);

		return $data;
	}

	/**
 	 * Get information about account.
 	 *
 	 * @identification must be an account number.
 	 * @return information about account.
	 */

	public function getAccount($identification){
		$data = $this->getData("account", $identification);

		return $data;
	}

	/**
 	 * Get account balance. Identification must be an account.
 	 *
 	 * @identification must be an account number.
 	 * @return account balance.
	 */

	public function getBalance($identification){
		$data = $this->getData("balance", $identification);

		return $data;
	}

	/**
 	 * Get account password.
 	 *
 	 * @identification must be an account number.
 	 * @return password in array.
	 */

	public function getPassword($identification){
		$data = $this->getData("auth", $identification);

		return $data;
	}

	/**
 	 * Transfer
 	 *
 	 * @from must be an account number.
	 * @to must be an account number.
	 * @kroner must be an integer.
	 * @ore must be an integer.
 	 * @return true or false.
	 */

	public function transfer($msg, $from, $to, $kroner, $ore, $recurring, $inteval, $endDate){
		if(!empty($from) && !empty($to)){
			$data = self::$server . 'sendmoney/' . $msg . '/' . $from . '/' . $to . '/' . $kroner . '/' . $ore . '/' . $recurring . '/' . $inteval . '/' . $endDate;
		}

		$data = @file_get_contents($data);
		if($data === FALSE){
			$error = true;
			return $error;
		}
		else {
			$data = json_decode($data, true);

			return $data;
		}
	}

	public function internalTransfer($msg, $from, $to, $kroner, $ore){
		$recurring = 0;
		$inteval = 0;
		$endDate = 0;

		$data = $this->transfer($msg, $from, $to, $kroner, $ore, $recurring, $inteval, $endDate);

		return $data;
	}

	public function payment($msg, $from, $to, $kroner, $ore, $recurring, $inteval, $endDate){
		$data = $this->transfer($msg, $from, $to, $kroner, $ore, $recurring, $inteval, $endDate);

		return $data;
	}

	/**
 	 * Get transactions
 	 *
 	 * @account must be an account number.
	 * @type must be a valid string.
 	 * @return transactions in array.
	 */

	public function getTransactions($account, $type){
		if(!empty($account) && !empty($type)){
			$data = self::$server . '/' . $account . '/' . $type;
		}

		$data = @file_get_contents($data);
		if($data === FALSE){
			$error = true;
			return $error;
		}
		else {
			$data = json_decode($data, true);

			return $data;
		}
	}

	public function getAllTransactions($account){
		$data = $this->getTransactions($account, "all");

		return $data;
	}

	public function getCardTransactions($account){
		$data = $this->getTransactions($account, "card");

		return $data;
	}

	public function getPaymentTransactions($account){
		$data = $this->getTransactions($account, "payment");

		return $data;
	}

	public function getTransferTransactions($account){
		$data = $this->getTransactions($account, "transfer");

		return $data;
	}

	/**
 	 * Savings targets
 	 *
 	 * @from must be an account number.
	 * @to must be an account number.
	 * @kroner must be an integer.
	 * @ore must be an integer.
 	 * @return true or false.
	 */

	public function createSavingsTarget($name, $customerId, $kroner, $ore){
		if(!empty($name) && !empty($customerId)){
			$data = self::$server . 'createsavingstargets/' . $name . '/' . $customerId . '/' . $kroner . '/' . $ore;
		}

		$data = @file_get_contents($data);
		if($data === FALSE){
			$error = true;
			return $error;
		}
		else {
			$data = json_decode($data, true);
			return $data;
		}
	}

	public function getSavingsTargets($account){
		if(!empty($account)){
			$data = self::$server . '/' . $account . '/allsavingstargets';
		}

		$data = @file_get_contents($data);
		if($data === FALSE){
			$error = true;
			return $error;
		}
		else {
			$data = json_decode($data, true);

			return $data;
		}
	}
}
