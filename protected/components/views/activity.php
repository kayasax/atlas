<ul class='unstyled'>
<?php
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_activity',
				
		));
		
?>
</ul>


