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
        $referer    = $db->escape(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null);
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

	public function makeAccountNumber($number, $desc = true) {
		if(!empty($number)){
		$str1 = substr($number, 0, 4);
		$str2 = substr($number, 4, 2);
		$str3 = substr($number, 6, 5);

		if($desc == true){
			$accountNuber = "Kontonummer: ";
		}else{
			$accountNuber = "";
		}

		return $accountNuber . $str1 .".". $str2 .".". $str3;
		}
	}

	protected static $langStrings = [
        'year' => ['%d år'],
        'month' => [
            '%d måned',
            '%d måneder',
        ],
        'day' => [
            ['i morgen kl. %2$02d:%3$02d', 'i går kl. %2$d:%3$d'],
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
        'future' => ['om', 'til'],
        'past' => ['for', 'siden'],
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
            $converted = self::pluralOrSingle("year", $diff->y, $diff->invert);
        } elseif ($diff->m) {
            $converted = self::pluralOrSingle("month", $diff->m, $diff->invert);
        } elseif ($diff->d) {
            $converted = self::pluralOrSingle("day", $diff->d, $diff->invert, $date->format("H"), $date->format("i"));
        } elseif ($diff->h) {
            $converted = self::pluralOrSingle("hour", $diff->h, $diff->invert);
        } elseif ($diff->i) {
            $converted = self::pluralOrSingle("minute", $diff->i, $diff->invert);
        } else {
            $converted = self::pluralOrSingle("second", 0, $diff->invert);
        }

        return $converted;
    }

    /**
     * @param string $type
     * @param mixed  $value
     * @param        $presence
     * @param mixed  $extra
     *
     * @return string
     * @throws \Exception
     */
    protected static function pluralOrSingle($type, $value, $presence, ...$extra)
    {
        if (!isset(self::$langStrings[$type])) {
            throw new \Exception("Language does not exist for given type");
        }

        if ($value != 1 && count(self::$langStrings[$type]) == 2) {
            return self::convertPresence($presence, self::$langStrings[$type][1], $value, ...$extra);
        }
        return self::convertPresence($presence, self::$langStrings[$type][0], $value, ...$extra);
    }

    /**
     * @param       $presence
     * @param       $lines
     * @param       $value
     * @param array ...$extra
     *
     * @return string
     */
    protected static function convertPresence($presence, $lines, $value, ...$extra)
    {
        if (is_array($lines)) {
            return sprintf($lines[$presence], $value, ...$extra);
        }
        $string = sprintf($lines, $value, ...$extra);

        if ($presence) {
            $string = self::$presence['past'][0] . " " . $string . " " . self::$presence['past'][1];
        } else {
            $string = self::$presence['future'][0] . " " . $string . " " . self::$presence['future'][1];
        }

        return $string;
    }
}
