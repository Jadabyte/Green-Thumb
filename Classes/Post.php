<?php
    include_once(__DIR__ . "/Db.php");

    class Post{
        private $userId;
        private $content;
        private $img;

        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }

        /**
         * Get the value of content
         */ 
        public function getContent()
        {
                return $this->content;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */ 
        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }

        /**
         * Get the value of img
         */ 
        public function getImg()
        {
                return $this->img;
        }

        /**
         * Set the value of img
         *
         * @return  self
         */ 
        public function setImg($img)
        {
                $this->img = $img;

                return $this;
        }

        public function createPost(){
            $conn = Db::getConnection();

            $statement = $conn->prepare("insert into posts (content, userId) values (:content, :userId)");
            
            $content = $this->getContent();
            $userId = $this->getUserId();

            $statement->bindValue(":content", $content);
            $statement->bindValue(":userId", $userId);

            $result = $statement->execute();

            return $result;
        }
    }