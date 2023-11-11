<?php
	class User {
		private $id;
	    private $email;
	    private $first_name;
	    private $last_name;
	    private $role;
	    private $password;
	    private $gender;
	    private $phone;
	    private $picture;
	    private $createdAt;


    	public function __construct($id, $email, $first_name, $last_name, $role, $password, $gender, $phone, $picture) {
	        $this->id = $id;
	        $this->email = $email;
	        $this->first_name = $first_name;
	        $this->last_name = $last_name;
	        $this->role = $role;
	        $this->password = $password;
	        $this->gender = $gender;
	        $this->phone = $phone;
	        $this->picture = $picture;
    	}

    	// Magic getter
	    public function __get($property) {
	        if (property_exists($this, $property)) {
	            return $this->$property;
	        }
	    }

    	// Magic setter
	    public function __set($property, $value) {
	        if (property_exists($this, $property)) {
	            $this->$property = $value;
	        }
	    }
	}