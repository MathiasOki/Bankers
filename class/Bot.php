<?php


/**
 * DOCUMENTATION IN THIS DOCUMENT IS NOT LONGER VALID.
 * PLEASE ASK DEVELOPER ABOUT THIS CODE.
 */


class Bot{

    private static $instance;

	private static $maskotID = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];

    public static function init(){
        if(self::$instance == NULL){
            $className = __CLASS__;
            self::$instance = new $className();
        }
        return self::$instance;
    }

    private function __construct(){

    }

	private function exist($id){
		if (!in_array($id, self::$maskotID)) {
			$id = 9;
			return $id;
		} else {
			return $id;
		}
	}

	private function img($id){
		$id = $this->exist($id);
		return ('<img src="assets/common/img/maskot/' . $id . '.svg">');
	}

	public function reveal($type, $id, $title, $text, $url, $btnTitle){
		if($type == 'alert'){
return ('
<div class="row">
	<div class="col-md-12">
		<div class="alert-message alert-message-success">
			<div class="row">
				<div class="col-xs-2 text-center">
					' . $this->img($id) . '
				</div>

				<div class="col-md-10">
					<h4>' . $title . '</h4>
					<p>' . $text . '</p>

					<p><a href="' . $url . '" class="btn btn-bankers">' . $btnTitle . '</a> <a href="#" class="btn btn-link">Nei, lukk boksen :(</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
');
		}
		if($type == 'img') {
			return $this->img($id);
		}
	}
}
