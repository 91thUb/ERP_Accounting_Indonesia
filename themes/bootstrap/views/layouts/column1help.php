<?php $this->beginContent('//layouts/baseFixedNoNavBar'); ?>

<?php //$this->renderPartial('//layouts/_header'); ?>
<?php //$this->renderPartial('//layouts/_navigation'); ?>

<?php if (!Yii::app()->user->isGuest) { ?>
    <div class="row">
        <div class="span12 my-sticky-element">
            <h4 style="margin-top: -5px; padding: 8px; background-color: #cbcbcb">
                <?php
                if (!Yii::app()->user->isGuest)
                    echo sUser::model()->myGroupName;
                ?>
            </h4>
        </div>
    </div>
<?php } ?>

<?php $this->renderPartial('//layouts/_breadcrumb'); ?>
<?php $this->renderPartial('//layouts/_notification'); ?>

<div class="row">
    <div class="span3">
        <?php $this->renderPartial('//layouts/_sbLeftFilter'); ?>

        <?php
            $Hierarchy = sHelp::model()->findAll(array('condition' => 'id = 1'));

            foreach ($Hierarchy as $Hierarchy) {
				$models = sHelp::model()->findByPk($Hierarchy->id);
				$items[] = $models->getTree();
            }

            $this->beginWidget('CTreeView', array(
                'id' => 'module-tree2',
                'data' => $items,
                    //'url' => array('/aOrganization/ajaxFillTreeId','id'=>$_GET['id']),
                    'collapsed'=>true,
                    //'unique'=>true,
            ));
            $this->endWidget();
        ?>
    </div>
    <div class="span9">

		<?php echo $content; ?>
		
	</div>
</div>


<?php $this->endContent(); ?>

