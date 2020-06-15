<?php
    include_once(__DIR__ . "/Db.php");

    class Plants{
        private $userId;
        private $plantName;
        private $plantImg;

        /**
         * Get the value of plantName
         */ 
        public function getPlantName()
        {
                return $this->plantName;
        }

        /**
         * Set the value of plantName
         *
         * @return  self
         */ 
        public function setPlantName($plantName)
        {
                $this->plantName = $plantName;

                return $this;
        }

        /**
         * Get the value of plantImg
         */ 
        public function getPlantImg()
        {
                return $this->plantImg;
        }

        /**
         * Set the value of plantImg
         *
         * @return  self
         */ 
        public function setPlantImg($plantImg)
        {
                $this->plantImg = $plantImg;

                return $this;
        }

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

        public static function fetchAllPlants(){
            $conn = Db::getConnection();

            $statement = $conn->prepare("select * from plants");

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public static function fetchAllUserPlants($userId){
                $conn = Db::getConnection();
    
                $statement = $conn->prepare("select * from plants join userplants on userplants.plant_id = plants.id and userplants.user_id = :userId");
                
                $statement->bindValue(":userId", $userId);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }

        public static function fetchPlant($plantName){
            $conn = Db::getConnection();

            $statement = $conn->prepare("select * from plants where name = :name");

            $statement->bindValue(":name", $plantName);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    }