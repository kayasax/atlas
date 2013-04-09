<?php
class Helper{
	public static function getProfileLink($id){
	$profile=UserProfile::Model()->findByPk($id);
	return "<a href='".Yii::app()->baseUrl."/index.php/userprofile/view/?id=".$id."'>".$profile->firstname .$profile->lastname."</a>";
	}
        
        
        
}