<?php
include("Satan.php");

class Custom extends Satan{

    private static $instance;

    protected $db;
	protected $satan;

    public static function init(){
        if(self::$instance == NULL){
            $className = __CLASS__;
            self::$instance = new $className();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->db = Database::init();
		$this->satan = Satan::init();
    }

    public function getUserIP(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }
        else{
            $ip = $remote;
        }

        return $ip;
    }

    public function makeLog(){
        $db = $this->db; // Så slipper du å endre alle $db her til $this->db.
        //$userID     = $logged['id'];
        $userID     = "NULL";
        $ip         = $this->getUserIP();
        $url        = $db->escape($_SERVER["REQUEST_URI"]);
        $browser    = $db->escape($_SERVER['HTTP_USER_AGENT']);
        $protocol   = $db->escape($_SERVER['SERVER_PROTOCOL']);
        $method     = $db->escape($_SERVER['REQUEST_METHOD']);
        $referer    = $db->escape((isset($_SEVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER'] : null));
        $time       = time();

        $db->query("INSERT INTO `log` SET
            `userID`='" . $userID . "',
            `ip`='" . $ip . "',
            `url`='" . $url . "',
            `browser`='" . $browser . "',
            `protocol`='" . $protocol . "',
            `method`='" . $method . "',
            `referer`='" . $referer . "',
            `time`='" . $time . "'
        ");
    }

	public function makeCurrency($kr, $oere) {

		/*
		 * 	1000
		 *	10 000
		 *	100 000
		 *  1 000 000
		 *  10 000 000
		 *	100 000 000
		 * 	1 000 000 000
		 */

		if(!empty($oere)){
			return number_format($kr, 0,'.', ' ') . '.' . $oere . ',-';
		}
		else {
			return number_format($kr, 2,'.', ' ') . ',-';
		}
	}

	public function makeAccountNumber($number) {
		if(!empty($number)){
		$str1 = substr($number, 0, 4);
		$str2 = substr($number, 4, 2);
		$str3 = substr($number, 6, 5);

		return $str1 .".". $str2 .".". $str3;
		}
	}

	protected static $langStrings = [
        'year' => ['%d år'],
        'month' => [
            '%d måned',
            '%d måneder',
        ],
        'day' => [
            '%d dag',
            '%d dager',
        ],
        'hour' => [
            '%d time',
            '%d timer',
        ],
        'minute' => [
            '%d minutt',
            '%d minutter',
        ],
        'second' => ['mindre enn 1 minutt'],
    ];

    protected static $presence = [
        'past' => 'siden',
        'future' => 'til'
    ];

    /**
     * @param $timestamp
     *
     * @return string
     */
    public static function convertTime($timestamp)
    {
        $date = new \DateTime();
        $date->setTimestamp($timestamp);

        $now = new \DateTime();

        $diff = $now->diff($date);

        if ($diff->y) {
            $converted = self::pluralOrSingle("year", $diff->y);
        } elseif ($diff->m) {
            $converted = self::pluralOrSingle("month", $diff->m);
        } elseif ($diff->d) {
            $converted = self::pluralOrSingle("day", $diff->d);
        } elseif ($diff->h) {
            $converted = self::pluralOrSingle("hour", $diff->h);
        } elseif ($diff->i) {
            $converted = self::pluralOrSingle("minute", $diff->i);
        } else {
            $converted = self::pluralOrSingle("second", 0);
        }

        if ($diff->invert) {
            $converted .= " " .self::$presence['past'];
        } else {
            $converted .= " " .self::$presence['future'];
        }

        return $converted;
    }

    /**
     * @param string $type
     * @param mixed $value
     *
     * @return string
     * @throws \Exception
     */
     protected static function pluralOrSingle($type, $value)
     {
         if (!isset(self::$langStrings[$type])) {
             throw new \Exception("Language does not exist for given type");
         }

         if ($value != 1 && count(self::$langStrings[$type]) == 2) {
             return sprintf(self::$langStrings[$type][1], $value);
         }
         return sprintf(self::$langStrings[$type][0], $value);
     }
}
