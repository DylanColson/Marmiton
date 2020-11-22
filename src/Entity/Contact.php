<?php 
    
    namespace App\Entity;
    use Symfony\Component\Validator\Constraints as Assert;

    
    class Contact{


        /**
         * @Assert\Length(
         * min = 1,
         * max = 50,
         * minMessage = "Votre Nom doit avoir plus de {{ limit }} characters",
         * maxMessage = "Votre Nom doit pas contenir plus de {{ limit }} characters"
         * )
         */
        private string $surname;
        /**
         * @Assert\Length(
         * min = 1,
         * max = 50,
         * minMessage = "Votre prénom doit avoir plus de {{ limit }} characters",
         * maxMessage = "Votre prénom doit pas contenir plus de {{ limit }} characters"
         * )
         */
        private string $name;
        private string $mail;

        /**
         * @Assert\Length(
         * min = 10,
         * max = 250,
         * minMessage = "Votre message doit contenir plus de {{ limit }} characters",
         * maxMessage = "Votre message doit pas contenir plus de {{ limit }} characters"
         * )
         */
        private string $message;


        /**
         * Get the value of surname
         */ 
        public function getSurname()
        {
                return $this->surname;
        }

        /**
         * Set the value of surname
         *
         * @return  self
         */ 
        public function setSurname($surname)
        {
                $this->surname = $surname;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        /**
         * Get the value of message
         */ 
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }
    }



?>

