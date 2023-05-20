<?php
    class EmailList implements JsonSerializable
    {
        private $name;
        private $email;
        private $wantUpdate;
        private $happy;


        public function __get($name)
        {
            return $this->$name;
        }
        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function jsonSerialize()
        {
            return[
                "name" => $this->name,
                "email" => $this->email,
                "wantUpdate" => $this->wantUpdate,
                "happy" => $this->happy,
            ];
        }
    }
?>