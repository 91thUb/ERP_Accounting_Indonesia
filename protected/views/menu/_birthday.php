<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="fa fa-bars fa-fw"></i><?php echo Yii::t('basic', ' Happening TODAY') ?></li>
    </ul>
</div>

<?php
$dependency = new CDbCacheDependency('SELECT MAX(created_date) FROM g_permission');
if (!Yii::app()->cache->get('birthday' . Yii::app()->user->id)) {
    $sql = '
		SELECT t.id,t.employee_name,"on birthday" as type,  
        (select 
                `o`.`name` AS `name`
            from
                (`erp_apl`.`g_person_career` `c`
                left join `erp_apl`.`a_organization` `o` ON ((`o`.`id` = `c`.`department_id`)))
            where
                ((`t`.`id` = `c`.`parent_id`)
                    and (`c`.`status_id` NOT in (' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ')))
            order by `c`.`start_date` desc
            limit 1) AS `department`

		FROM `g_person` `t`

		WHERE (((select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')) 
		AND ((select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN (' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . '
		))) 
		AND (date(CONCAT(year(now()),"-",month(birth_date),"-",day(birth_date))) = curdate()) 
		
		UNION ALL

		SELECT  
		`person`.`id` AS `t1_c0`, `person`.`employee_name` AS `t1_c3`,"on leave",
        (select 
                `o`.`name` AS `name`
            from
                (`erp_apl`.`g_person_career` `c`
                left join `erp_apl`.`a_organization` `o` ON ((`o`.`id` = `c`.`department_id`)))
            where
                ((`person`.`id` = `c`.`parent_id`)
                    and (`c`.`status_id` NOT in (' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ')))
            order by `c`.`start_date` desc
            limit 1) AS `department`

		FROM `g_leave` `t` 
		LEFT OUTER JOIN `g_person` `person` ON (`t`.`parent_id`=`person`.`id`) 
		WHERE approved_id = 2  AND 
		CURDATE() BETWEEN start_date AND end_date AND 
		(((select c.company_id from g_person_career c WHERE person.id=c.parent_id AND c.status_id IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')) 
		AND ((select status_id from g_person_status s where s.parent_id = person.id ORDER BY start_date DESC LIMIT 1) NOT IN (' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . '
		))) 

		GROUP BY employee_name		

		UNION ALL

		SELECT  
		`person`.`id` AS `t1_c0`, `person`.`employee_name` AS `t1_c3`,"on permission",
        (select 
                `o`.`name` AS `name`
            from
                (`erp_apl`.`g_person_career` `c`
                left join `erp_apl`.`a_organization` `o` ON ((`o`.`id` = `c`.`department_id`)))
            where
                ((`person`.`id` = `c`.`parent_id`)
                    and (`c`.`status_id` NOT in (' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ')))
            order by `c`.`start_date` desc
            limit 1) AS `department`

		FROM `g_permission` `t` 
		LEFT OUTER JOIN `g_person` `person` ON (`t`.`parent_id`=`person`.`id`) 
		WHERE approved_id = 2  AND 
		CURDATE() BETWEEN date(start_date) AND date(end_date) AND 
		(((select c.company_id from g_person_career c WHERE person.id=c.parent_id AND c.status_id IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')) 
		AND ((select status_id from g_person_status s where s.parent_id = person.id ORDER BY start_date DESC LIMIT 1) NOT IN (' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . '
		))) 

		GROUP BY employee_name		

		';

    $connection = Yii::app()->db;
    $command = $connection->createCommand($sql);
    $rows = $command->queryAll();

    Yii::app()->cache->set('birthday' . Yii::app()->user->id, $rows, 3600, $dependency);
} else
    $rows = Yii::app()->cache->get('birthday' . Yii::app()->user->id);
?>

<ul style="margin:0">
    <?php
    foreach ($rows as $notifica) {
        echo CHtml::openTag('div', array('class' => 'media', 'style' => 'margin-top:0;'));
        echo CHtml::openTag('p', array('class' => 'pull-left', 'style' => 'width:30px'));
        //echo $notifica->photoPath; 
        echo CHtml::closeTag('p');

        echo CHtml::openTag('div', array('class' => 'media-body'));
        echo CHtml::openTag('p', array('class' => 'media-heading'));
        echo CHtml::link(strtoupper($notifica["employee_name"]) . ' ', Yii::app()->createUrl('/m1/gPerson/view', array('id' => $notifica["id"])));
        echo '<br/>';
        echo CHtml::tag('strong', array('style' => 'font-size:11px;'), $notifica["department"]) . ' ';
        echo CHtml::tag('i', array('style' => 'color:grey;font-size:11px; margin-bottom:10px;'), ' ' . $notifica["type"]);
        echo CHtml::closeTag('p');
        echo CHtml::closeTag('div');
        echo CHtml::closeTag('div');
    }
    ?>
</ul>

<br/>


