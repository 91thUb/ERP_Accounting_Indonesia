<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class fImage extends CFormModel {

    public $picture;

    public function rules() {
        return array(
            // username and password are required
            array('picture', 'required'),
            array('picture', 'file', 'types' => 'xls'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'picture' => 'Nama File Excel',
        );
    }

}
