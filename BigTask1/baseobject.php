<?php
/**
 * Created by PhpStorm.
 * User: sayran
 * Date: 4/28/14
 * Time: 9:24 AM
 */
include("filehelper.php");
interface BaseFunc
    {
        function save();
        function populate($id);
        function __construct($id);
    }


class BaseObject extends FileHelper
    {
        protected $file = "";
        protected $id;
        protected $title;
        protected $content;
        protected $date;

    }