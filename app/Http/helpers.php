<?php

function getStatus($videoCategory)
{
    $videoCategories = ["PHP" => "PHP", "Laravel" => "Laravel", "JavaScript" => "JavaScript", "AngularJS" => "AngularJS", "ReactJS" => "ReactJS", "Python" => "Python", "Django" => "Django", "Ruby" => "Ruby", "Rails" => "Rails", "Java" => "Java", "iOS" => "iOS"];

    if( array_key_exists($videoCategory, $videoCategories) ) {
        unset($videoCategories[$videoCategory]);
        foreach( $videoCategories as $key => $value) {
            echo "<option value='{$value}'>{$value}</option>";
        }
    }

}