<?php
    include_once(__DIR__ . "/Db.php");

    class Chat{
        private $user1;
        private $user2;
        private $content;
        private $date;
        private $chatId;

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

        /**
         * Get the value of chatId
         */ 
        public function getChatId()
        {
                return $this->chatId;
        }

        /**
         * Set the value of chatId
         *
         * @return  self
         */ 
        public function setChatId($chatId)
        {
                $this->chatId = $chatId;

                return $this;
        }

        public static function fetchChats($user1){
            $conn = Db::getConnection();

            $statement = $conn->prepare("SELECT users.id, users.firstname, users.lastname, users.userImg, messages.content, messages.date, messages.user_id FROM chat, messages, users WHERE chat.id = messages.chat_Id AND chat.user_id_1 = :user1 AND users.id = chat.user_id_2 GROUP BY users.id");
            $statement->bindValue(":user1", $user1);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }

        public static function fetchMessages($user1, $user2){
            $conn = Db::getConnection();

            $statement = $conn->prepare("SELECT messages.user_id, users.firstname, users.lastname, messages.content, messages.user_id, messages.date, chat.id FROM chat, messages, users WHERE chat.user_id_1 = :user1 AND chat.user_id_2 = :user2 AND users.id = chat.user_id_2");
            $statement->bindValue(":user1", $user1);
            $statement->bindValue(":user2", $user2);

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function createMessage(){
            $conn = Db::getConnection();

            $statement = $conn->prepare("insert into messages (chat_id, user_id, content) values (:chatId, :userId, :content)");
            
            $chatId = $this->getChatId();
            $userId = $this->getUser1();
            $content = $this->getContent();

            $statement->bindValue(":chatId", $chatId);
            $statement->bindValue(":userId", $userId);
            $statement->bindValue(":content", $content);

            $result = $statement->execute();
            return $result;
        }
    }