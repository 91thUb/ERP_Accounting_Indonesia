<?php
if (!Yii::app()->user->isGuest) {
    if (Yii::app()->user->name == 'admin') {
        $dependency = new CDbCacheDependency('SELECT max(updated_date) AS t  FROM s_module;');
    } else
        $dependency = new CDbCacheDependency('SELECT max(um.updated_date) AS t  FROM s_user_module um WHERE um.s_user_id =' . Yii::app()->user->id);


    if (!Yii::app()->cache->get('hierarchy1m6' . Yii::app()->user->id)) {
        if (Yii::app()->user->name == 'admin') {
            $Hierarchy = menu::model()->findAll(array('condition' => 'parent_id = \'0\' AND (name = \'m6\' OR name = \'m0\') ', 'order' => 'sort'));
        } else {

            $criteria = new CDbCriteria;
            $criteria->with = array('user');
            $criteria->compare('parent_id', 0);
            $criteria->compare('user.s_user_id', Yii::app()->user->id);
            $criteria->order = 't.sort';
            $criteria1 = new CDbCriteria;
            $criteria1->compare('name', 'm6', true, 'OR');
            $criteria1->compare('name', 'm0', true, 'OR');
            $criteria->mergeWith($criteria1);

            //$Hierarchy=menu::model()->findAllBySql('SELECT a.id FROM s_module a
            //		LEFT JOIN s_user_module b ON a.id = b.s_module_id
            //		WHERE a.parent_id = "0"
            //		AND b.s_user_id = '.Yii::app()->user->id .' order by sort');
            $Hierarchy = menu::model()->cache(3600, $dependency)->findAll($criteria);
        }
        Yii::app()->cache->set('hierarchy1m6' . Yii::app()->user->id, $Hierarchy, 86400, $dependency);
    } else
        $Hierarchy = Yii::app()->cache->get('hierarchy1m6' . Yii::app()->user->id);

    if (!Yii::app()->cache->get('hierarchy2m6' . Yii::app()->user->id)) {
        foreach ($Hierarchy as $Hierarchy) {
            $models = menu::model()->findByPk($Hierarchy->id);
            $items[] = $models->getListed();
        }
        Yii::app()->cache->set('hierarchy2m6' . Yii::app()->user->id, $items, 86400, $dependency);
    } else
        $items = Yii::app()->cache->get('hierarchy2m6' . Yii::app()->user->id);

    $this->widget('bootstrap.widgets.TbNavbar', array(
        //'fixed'=>true,
        //'brand' => Yii::app()->name,
        'brand' => '',
        //'brand'=>CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/logo.jpg", Yii::app()->name, array("height"=>"100%",'id'=>'photo','padding'=>0)),
        'brandUrl' => Yii::app()->createUrl("menu"),
        'collapse' => true, // requires bootstrap-responsive.css
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => $items,
            ),
            include(Yii::app()->basePath . '/components/AuthenticatedMenu.php'),
        ),
    ));
} else {
    ?>

    <div class="row">
        <div class="span4">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/logo.jpg", Yii::app()->name, array("height" => "100%", 'id' => 'photo', 'style' => 'padding:0')); ?>
        </div>

        <div class="span8">
            <div class="pull-right">
                <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
                    'stacked' => false, // whether this is a stacked menu
                    'items' => array(
                        array('label' => 'Home', 'url' => Yii::app()->createUrl('/site/login')),
                        array('label' => 'Photo', 'url' => Yii::app()->createUrl('/site/photo')),
                        array('label' => 'Learning', 'url' => Yii::app()->createUrl('/site/learning')),
                        array('label' => 'Career', 'url' => (Yii::app()->params['webcareer']), 'linkOptions' => array('target' => '_blank', 'style' => 'background-color:#ddeeee')),
                    ),
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
