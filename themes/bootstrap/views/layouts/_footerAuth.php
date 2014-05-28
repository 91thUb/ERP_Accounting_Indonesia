<footer  style="background-color:black;margin-top:50px;">
    <div class="container">

        <div style="font-size:12px;margin-top:20px;padding:10px 0;color:white">
            <div class="row">
				<div class="span2">
					<ul class="unstyled" style="margin-left:10px">
						<li><strong>General</strong><li>
						<li><i class="fa fa-bookmark"></i><?php echo CHtml::link(' Notification', Yii::app()->createUrl('/sNotification'), array("style" => "color: white")) ?></li>
						<li><i class="fa fa-comment"></i><?php echo CHtml::link(' Feedback', Yii::app()->createUrl('/sFeedback'), array("style" => "color: white")) ?></li>
						<li><i class="fa fa-picture-o"></i><?php echo CHtml::link(' Photo Gallery', Yii::app()->createUrl('/site/photo'), array("style" => "color: white")) ?></li>
						<li><i class="fa fa-share"></i><?php echo CHtml::link(' Company News', Yii::app()->createUrl('/sCompanyNews'), array("style" => "color: white")) ?></li>
						<li><i class="fa fa-envelope"></i><?php echo CHtml::link(' Mailbox', Yii::app()->createUrl('/mailbox'), array("style" => "color: white")) ?></li>
					</ul>
				</div>
				<div class="span2">
					<ul class="unstyled" style="margin-left:10px">
						<li><strong>Employee Self Service</strong><li>
						<li><i class="fa fa-leaf"></i><?php echo CHtml::link(' ESS Dashboard', Yii::app()->createUrl('/m1/gEss'), array("style" => "color: white")) ?></li>
						<li><i class="fa fa-user"></i><?php echo CHtml::link(' My Profile', Yii::app()->createUrl('/m1/gEss/person'), array("style" => "color: white")) ?></li>
						<li><i class="fa fa-plane"></i><?php echo CHtml::link(' My Leave', Yii::app()->createUrl('/m1/gEss/leave'), array("style" => "color: white")) ?></li>
						<li><i class="fa fa-hand-o-up"></i><?php echo CHtml::link(' Permission', Yii::app()->createUrl('/m1/gEss/permission'), array("style" => "color: white")) ?></li>							
						<li><i class="fa fa-bell"></i><?php echo CHtml::link(' Attendance', '#', array("style" => "color: white")) ?></li>							
					</ul>
				</div>
				<div class="span4">
					<ul class="unstyled" style="margin-left:10px">
						<li><strong>Profile</strong><li>
						<li><i class="fa fa-list"></i><?php echo CHtml::link(" " . sUser::model()->myGroupName, Yii::app()->createUrl('/aOrganization/viewSelf', array('id' => sUser::model()->myGroup)), array("style" => "color: white")) ?></li>							
						<li><i class="fa fa-user"></i><?php echo CHtml::link(' My Profile', Yii::app()->createUrl('/sUser/viewSelf', array('id' => Yii::app()->user->id)), array("style" => "color: white")) ?></li>							
						<li><i class="fa fa-user"></i><?php echo CHtml::link(' Change User Name', Yii::app()->createUrl('/sUser/updateUsernameAuthenticated', array('id' => Yii::app()->user->id)), array("style" => "color: white")) ?></li>							
						<li><i class="fa fa-barcode"></i><?php echo CHtml::link(' Change Password', Yii::app()->createUrl('/sUser/updatePasswordAuthenticated', array('id' => Yii::app()->user->id)), array("style" => "color: white")) ?></li>							
						<li><i class="fa fa-user"></i><?php echo CHtml::link(' User Login History', Yii::app()->createUrl('/sNotification/userHistory'), array("style" => "color: white")) ?></li>							
					</ul>
				</div>
				<div class="span4">
					<ul class="unstyled" style="margin-left:10px">
						<li><strong>Online Support</strong><li>
						<li>
							<a href="http://messenger.yahoo.com/edit/send/?.target=peterjkambey">
							<img border="0" src="http://opi.yahoo.com/yahooonline/u=peterjkambey/m=g/t=2/l=us/opi.jpg">
							</a> Peter J. Kambey 					
						</li>							
					</ul>
				</div>
            </div>
            <hr>
            <div class="row">
                <div class="span8" style="margin-left:10px">
                    <?php echo CHtml::link('Term and Conditions of Use', Yii::app()->createUrl('site/link', array('view' => 'tac'))) ?> | <?php echo CHtml::link('Privacy Policy', Yii::app()->createUrl('site/link', array('view' => 'policy'))) ?> 
                </div>
                <div class="span4">
                    <p class="muted pull-right" style="color:white;">
                        <?php echo Yii::app()->params['title'] ?> :: Ver <?php echo Yii::app()->params['appVersion'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
</footer>
