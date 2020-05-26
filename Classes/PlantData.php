<?php
    include_once(__DIR__ . "/Db.php");

    class PlantData{
        private $celcius;
        private $fahrenheit;
        private $light;
        private $moisture;

        /**
         * Get the value of celcius
         */ 
        public function getCelcius()
        {
                return $this->celcius;
        }

        /**
         * Set the value of celcius
         *
         * @return  self
         */ 
        public function setCelcius($celcius)
        {
                $this->celcius = $celcius;

                return $this;
        }

        /**
         * Get the value of fahrenheit
         */ 
        public function getFahrenheit()
        {
                return $this->fahrenheit;
        }

        /**
         * Set the value of fahrenheit
         *
         * @return  self
         */ 
        public function setFahrenheit($fahrenheit)
        {
                $this->fahrenheit = $fahrenheit;

                return $this;
        }

        /**
         * Get the value of light
         */ 
        public function getLight()
        {
                return $this->light;
        }

        /**
         * Set the value of light
         *
         * @return  self
         */ 
        public function setLight($light)
        {
                $this->light = $light;

                return $this;
        }

        /**
         * Get the value of moisture
         */ 
        public function getMoisture()
        {
                return $this->moisture;
        }

        /**
         * Set the value of moisture
         *
         * @return  self
         */ 
        public function setMoisture($moisture)
        {
                $this->moisture = $moisture;

                return $this;
        }

        public function addData(){
            $conn = Db::getConnection();

            $statement = $conn->prepare("insert into plantdata (celcius, fahrenheit, light, moisture) values (:celcius, :fahrenheit, :light, :moisture)");

            $celcius = $this->getCelcius();
            $fahrenheit = $this->getFahrenheit();
            $light = $this->getLight();
            $moisture = $this-> getMoisture();

            $statement->bindValue(":celcius", $celcius);
            $statement->bindValue(":fahrenheit", $fahrenheit);
            $statement->bindValue(":light", $light);
            $statement->bindValue(":moisture", $moisture);

            $result = $statement->execute();

            return $result;
        }

        public static function retrieveData(){
            $conn = Db::getConnection();
            $statement = $conn->prepare("SELECT * FROM `plantdata` ORDER by id DESC");
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }