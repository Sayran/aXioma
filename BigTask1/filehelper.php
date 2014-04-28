<?php
/**
 * Created by PhpStorm.
 * User: sayran
 * Date: 4/28/14
 * Time: 9:23 AM
 */
class FileHelper
    {
        protected $file="";
        protected function write($array)
            {
            $data=implode("|",$array);
            $data .="\n";
            file_put_contents($this->file,$data);
            }

        protected function append($array)
            {
            $data=implode("|",$array);
            $data .="\n";
            file_put_contents($this->file,$data,FILE_APPEND);
            }

        protected function get($file)
            {
            $array = file_get_contents($file);
            return $array;
            }

    }