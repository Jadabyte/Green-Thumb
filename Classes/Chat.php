<?php
    include_once(__DIR__ . "/Db.php");

    class Chat{
        private $user1;
        private $user2;
        private $content;
        private $date;

        /**
         * Get the value of user1
         */ 
        public function getUser1()
        {
                return $this->user1;
        }

        /**
         * Set the value of user1
         *
         * @return  self
         */ 
        public function setUser1($user1)
        {
                $this->user1 = $user1;

                return $this;
        }

        /**
         * Get the value of user2
         */ 
        public function getUser2()
        {
                return $this->user2;
        }

        /**
         * Set the value of user2
         *
         * @return  self
         */ 
        public function setUser2($user2)
        {
                $this->user2 = $user2;

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
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        public static function fetchChats($user1){
            $conn = Db::getConnection();

            $statement = $conn->prepare("SELECT users.firstname, users.lastname, users.userImg, messages.content, messages.date, chat.id FROM chat, messages, users WHERE chat.id = messages.chat_id AND chat.user_id_1 = '11' AND users.id = chat.user_id_2");
            $statement->bindValue(":user1", $user1);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
    }