<?php echo "<pre>";
/**
 * Created by PhpStorm.
 * User: sayran
 * Date: 5/13/14
 * Time: 6:01 PM
 */

namespace Model;


class BaseModel {
    /**
     * @var null|\PDO
     */
        protected $id="";
        protected $connection = null;
        protected $tableName="";

        public function __construct(){
            $this->connection =new \PDO(
                'mysql:host='.\App\Config::getParameter('mysql.host').';dbname='.\App\Config::getParameter('mysql.dbname'),
                \App\Config::getParameter('mysql.user'),
                \App\Config::getParameter('mysql.password'),
                array(
                    \PDO::ATTR_PERSISTENT => true
                )
            );
        }

    /**
     * @param $title
     * @param $content
     * @param $isActive
     */

        public function save($title, $content, $isActive)
            {

                $statement = $this->connection->prepare('INSERT INTO '.$this->tableName.' (content, title, isActive) VALUES (:content, :title, :isActive)');
                $statement->execute(array(':content'=>$title, ':title'=>$content, ':isActive'=>$isActive));
            }

    /**
     * @param $tablename
     *
     * @return array
     */

        public function findAll($tablename)
            {
            $statement = $this->connection->prepare('SELECT* FROM '.$tablename);
            $statement->execute();

            $data = $statement->fetchAll();

            foreach ($data as $news) {
                        print $news['id']."<br>";
                        print $news['title']."<br>";
                        print $news['content']."<br>";
                }
                return $data;
            }

    /**
     * @param $id
     * @param $title
     * @param $content
     */
        public function editOne($id, $title, $content)
            {
            $statement = $this->connection->prepare("UPDATE".$this->tableName." SET title = :title, content = :content WHERE id = :id");
            $statement->execute(array(':title' => $title,':content' => $content , ':id' => $id));
            }

    /**
     * @param $id
     *
     * @return mixed
     */
        public function findOneById($id)
            {
                $statement = $this->connection->prepare('SELECT FROM '.$this->tableName.' WHERE id = :id');
                $statement->execute(array(':id'=>$id));
                $data = $statement->fetch();

                return $data;
            }



//}
//Poluchenie vseh novostej po 10 s 10j sortiruja to id
//LIMIT OFFSET DESC pishutsja vsegda v konce
//$statement = $db->prepare('SELECT* FROM news LIMIT 10 OFFSET 10 ORDER BY id DESC');
//$statement->execute();
//
//$data = $statement->fetchAll();


    /**
     * @param $id
     *
     * @return string
     */
        public function delete($id)
            {
                $statement = $this->connection->prepare('DELETE FROM '.$this->tableName.' WHERE id = :id');
                $statement->execute(array(':id'=>$id));
                return "succesfuly deleted";
            }
}