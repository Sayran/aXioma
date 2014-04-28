<?php
/**
 * Created by PhpStorm.
 * User: sayran
 * Date: 4/28/14
 * Time: 9:31 AM
 */
include("baseobject.php");

class Page extends BaseObject
    {
        protected $slug;

    /**
     * @return mixed
     */
        public  function getSlug ()
            {
            return $this->slug;
            }

    /**
     * @param mixed $slug
     */
        public function setSlug ($slug)
            {
            $this->slug = $slug;
            }

        protected   function redirect($slug)
            {
            header("http://localhost/".$slug);
            }
    }
