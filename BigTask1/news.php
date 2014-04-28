<?php
/**
 * Created by PhpStorm.
 * User: sayran
 * Date: 4/28/14
 * Time: 9:23 AM
 */
require_once("baseobject.php");
class News extends BaseObject implements BaseFunc
    {
        protected $file = "news.txt";
        protected $id;
        protected $title;
        protected $content;
        protected $date;

    /**
     * @return string
     */
        public function getFile ()
            {
            return $this->file;
            }
    /**
     * @param mixed $content
     */
        public function setContent ($content)
            {
            $this->content = $content;
            }

    /**
     * @return mixed
     */
        public function getContent ()
            {
            return $this->content;
            }

    /**
     * @param mixed $title
     */
        public function setTitle ($title)
            {
            $this->title = $title;
            }

    /**
     * @return mixed
     */
        public function getTitle ()
            {
            return $this->title;
            }

    /**
     * @param mixed $date
     */
        public function setDate ($date)
            {
            $this->date = $date;
            }

    /**
     * @return mixed
     */
        public function getDate ()
            {
            return $this->date;
            }

    /**
     * @param mixed $id
     */
        public function setId ($id)
            {
            $this->id = $id;
            }

    /**
     * @return mixed
     */
        public function getId ()
            {
            return $this->id;
            }

        public  function save()
            {
                $data = array("id"=>$this->id,"title"=>$this->title,"content"=>$this->content,"data"=>$this->date);
                if(file_exists($this->file))
                {
                    $this->append($data);
                }
                else
                {
                    $this->write($data);
                }
            }
        public function __construct($id=null)
            {
                if($id)
                {
                    $this->populate($id);
                }
                else
                {
                    $this->setId($this->generateId());
                }
            }
        public  function populate($id)
            {
            $news = explode("\n",file_get_contents($this->file));
            unset($news[count($news) - 1]);
            foreach($news as $key => $value)
            {
                $item = explode("|",$news[$key]);
                if($item[0] == $id)
                {
                    $this->setId($item[0]);
                    $this->setTitle($item[1]);
                    $this->setContent($item[2]);
                    $this->setDate($item[3]);
                    return 0;
                }
            }
            return 0;
            }
        private function generateId()
            {
                $id=date(time())-1398680691-1;
                return $id;
            }
    }
