<?php
if (!Yii::app()->user->isGuest) {
    if (Yii::app()->user->name == 'admin') {
        $dependency = new CDbCacheDependency('SELECT max(updated_date) AS t  FROM s_module;');
    }
    else
        $dependency = new CDbCacheDependency('SELECT max(um.updated_date) AS t  FROM s_user_module um WHERE um.s_user_id =' . Yii::app()->user->id);


    if (!Yii::app()->cache->get('hierarchy1m1' . Yii::app()->user->id)) {
        if (Yii::app()->user->name == 'admin') {
            $Hierarchy = menu::model()->findAll(array('condition' => 'parent_id = \'0\' AND (name = \'m1\' OR name = \'m0\') ', 'order' => 'sort'));
        } else {

            $criteria = new CDbCriteria;
            $criteria->with = array('user');
            $criteria->compare('parent_id', 0);
            $criteria->compare('user.s_user_id', Yii::app()->user->id);
            $criteria->order = 't.sort';
            $criteria1 = new CDbCriteria;
            $criteria1->compare('name', 'm1', true, 'OR');
            $criteria1->compare('name', 'm0', true, 'OR');
            $criteria->mergeWith($criteria1);

            //$Hierarchy=menu::model()->findAllBySql('SELECT a.id FROM s_module a
            //		LEFT JOIN s_user_module b ON a.id = b.s_module_id
            //		WHERE a.parent_id = "0"
            //		AND b.s_user_id = '.Yii::app()->user->id .' order by sort');
            $Hierarchy = menu::model()->cache(3600, $dependency)->findAll($criteria);
        }
        Yii::app()->cache->set('hierarchy1m1' . Yii::app()->user->id, $Hierarchy, 86400, $dependency);
    }
    else
        $Hierarchy = Yii::app()->cache->get('hierarchy1m1' . Yii::app()->user->id);

    if (!Yii::app()->cache->get('hierarchy2m1' . Yii::app()->user->id)) {
        foreach ($Hierarchy as $Hierarchy) {
            $models = menu::model()->findByPk($Hierarchy->id);
            $items[] = $models->getListed();
        }
        Yii::app()->cache->set('hierarchy2m1' . Yii::app()->user->id, $items, 86400, $dependency);
    }
    else
        $items = Yii::app()->cache->get('hierarchy2m1' . Yii::app()->user->id);

    $this->widget('bootstrap.widgets.TbNavbar', array(
        //'fixed'=>true,
        'brand' => '',
        //'brand' => Yii::app()->name,
        //'brand'=>CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/logo.jpg", Yii::app()->name, array("height"=>"100%",'id'=>'photo','padding'=>0)),
        //'brandUrl' => Yii::app()->createUrl("menu"),
        'collapse' => true, // requires bootstrap-responsive.css
        'items' => array(
/*            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => 'Home', 'icon' => 'home', 'url' => Yii::app()->homeUrl, 'items' => array(
                        )),
                )
            ), */
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => $items,
            ),
            include(Yii::app()->basePath . '/components/AuthenticatedMenu.php'),
        ),
    ));
} else {
    ?>
    <?php /*
      <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
      <div class="container"><!-- Collapsable nav bar -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </a>


      <!-- Start of the nav bar content -->
      <div class="nav-collapse"><!-- Other nav bar content -->

      <!-- The drop down menu -->
      <ul class="nav pull-right">
      <li><a href="site/register">Register</a></li>
      <li class="divider-vertical"></li>
      <li class="dropdown">
      <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
      <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">

      <form class="form-vertical" id="login-form" action="/aphris/site" method="post">
      <label for="fLogin_username" class="required">User Name <span class="required">*</span></label>
      <input class="span2" name="fLogin[username]" id="fLogin_username" type="text" />


      <label for="fLogin_password" class="required">Password <span class="required">*</span></label>
      <input class="span2" name="fLogin[password]" id="fLogin_password" type="password" />


      <button class="btn btn-primary" type="submit" name="yt0"><i class="icon-ok"></i> Submit</button>
      </form>

      </div>
      </li>
      </ul>
      </div>
      </div>
      </div>
      </div>

     */ ?>

    <div class="row">
        <div class="span6">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/logo.jpg", Yii::app()->name, array("height" => "100%", 'id' => 'photo', 'style' => 'padding:0')); ?>
        </div>

        <div class="span6">
            <div class="pull-right">
                <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
                    'stacked' => false, // whether this is a stacked menu
                    'items'=>include(Yii::app()->basePath . '/config/guestMenu.php'),
                ));
                ?>
            </div>
        </div>
    </div>

    <div style="margin-top:-20px">
        <hr/>
    </div>

    <?php
}
?>
