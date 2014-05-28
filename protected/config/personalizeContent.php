		<div class="row">
			<div class="span4">
				<?php
				if (Yii::app()->user->name != "koes" && (Yii::app()->user->name == "admin" || sUser::model()->rightCountM > 2 || !Yii::app()->user->checkAccess('HR ESS Staff')))
					$this->renderPartial("_reminderSystem");
				?>
			</div>
			<div class="span4">
				<?php
				if (Yii::app()->user->name == "admin" || sUser::model()->rightCountM > 2 || !Yii::app()->user->checkAccess('HR ESS Staff'))
					$this->renderPartial("_notificationSystem");
				?>
			</div>
		</div>



<?php
        $this->renderPartial("_tabAnnouncement");

        $isExist = is_file(Yii::app()->basePath . "/modules/m1/models/gPerson.php");
        if ($isExist) {
            if (Yii::app()->user->name == "admin")
                $this->renderPartial("_tabNewEmployee");
        }

        echo $this->renderPartial("_tabMailbox", array(), true);

        $this->renderPartial("_tabCompanyDocuments");

?>
