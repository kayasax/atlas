<?php
class Helper{
	public static function getProfileLink($id,$withImage=TRUE){
	$profile=UserProfile::Model()->findByPk($id);
        ($profile->avatar == "")?$avatar='anonymous.png':$avatar='$profile->avatar';
        
	return "<a href='".Yii::app()->baseUrl."/index.php/userprofile/view/?id=".$id."' rel='tooltip' title='".$profile->firstname." " .$profile->lastname."'> 
                <img src=".Yii::app()->baseUrl."/images/avatars/mini/".$avatar.">
                </a>";
	}
        
        
        
}