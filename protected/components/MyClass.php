<?php

/**
 * Created by IntelliJ IDEA.
 * User: Torchick
 * Date: 26/09/2016
 * Time: 9:52 PM
 */
class MyClass extends CApplicationComponent {

    public static $month = array(
        1=>"January",
        2=>"February",
        3=>"March",
        4=>"April",
        5=>"May",
        6=>"June",
        7=>"July",
        8=>"August",
        9=>"Sept",
        10=>"October",
        11=>"November",
        12=>"December",


    );

    public static function toArray($data){
        $rs = array();
        foreach ($data as $item){
            foreach ($item as $key=>$value){
                $rs[] = $value;
            }
        }
        return $rs;
    }

    public static function createKnob($id, $value, $color, $label){
        $knob =  "<div class=\"col-md-2\">
				<div class=\"row\">
					<div class=\"col-md-12\">
						<input type=\"text\" value=\"{$value}\" id=\"{$id}\">
						<script>
							$(function() {
								$(\"#{$id}\").knob({
									\"angleOffset\": -125,
									\"angleArc\": 250,
									\"readOnly\": true,
									\"width\": \"100%\",
									\"fgColor\" : \"{$color}\"
								});

							});
						</script>
					</div>
				</div>

				<div class=\"row\">
					<div class=\"col-md-12 text-center\">
						<strong>{$label}</strong>
					</div>
				</div>

			</div>";


        return $knob;


//        return sprintf($knob, $value, $color, $label);


    }

}