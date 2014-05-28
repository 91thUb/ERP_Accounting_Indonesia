<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class fPhoto extends CFormModel {

    public $datetime;
    public $title;
    public $description;
    public $images;

    public function rules() {
        return array(
            // username and password are required
            array('datetime,title, description', 'required', 'on' => 'businessunit'),
            array('datetime', 'date', 'format' => 'dd-MM-yyyy'),
            array('title', 'length', 'max' => 100),
            array('images', 'safe'),
            array('images', 'file'),
            array('description', 'length', 'max' => 5000),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'datetime' => 'Date',
            'title' => 'Title',
            'description' => 'Description',
        );
    }

    public function sanitize($is_filename = TRUE) {
        // Replace all weird characters with dashes
        $string = preg_replace('/[^\w\-' . ($is_filename ? '~_\.' : '') . ']+/u', '-', $this->title);

        // Only allow one dash separator at a time (and make string lowercase)
        //return mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
        return preg_replace('/--+/u', '-', $string);
    }

    public function sanitizeTitle($is_filename = TRUE) {
        // Replace all weird characters with dashes
        $string = preg_replace('/[^\w\-' . ($is_filename ? '~_\.' : '') . ']+/u', ' ', $this->title);

        // Only allow one dash separator at a time (and make string lowercase)
        //return mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
        return preg_replace('/--+/u', '-', $string);
    }

    public function sanitizeDesc($is_filename = TRUE) {
        return htmlentities(preg_replace('/--+/u', '-', $this->description));
    }

}
