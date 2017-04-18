<?php


/**
 * DOCUMENTATION IN THIS DOCUMENT IS NOT LONGER VALID.
 * PLEASE ASK DEVELOPER ABOUT THIS CODE.
 */


class Bot{

    private static $instance;

    public static function init(){
        if(self::$instance == NULL){
            $className = __CLASS__;
            self::$instance = new $className();
        }
        return self::$instance;
    }

    private function __construct(){

    }

	public function img($id){
		return ('<img src="assets/common/img/maskot/' . $id . '.svg">');
	}

	public function alert($id, $title, $text, $url, $btnTitle){
return ('
<div class="row">
	<div class="col-md-12">
		<div class="alert-message alert-message-success">
			<div class="row">
				<div class="col-xs-2 text-center">
					<img src="assets/common/img/maskot/' . $id . '.svg">
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
}
