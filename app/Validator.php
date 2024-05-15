<?php

class Validator
{

    private $rules;
    private $errors;
    private $result;
    public function __construct($rules)
    {
        $this -> rules = $rules;
    }
    public function Validate()
    {
        $result = [];
        $errors = [];
        foreach ($this -> rules as $key => $rule) {
            print "<br>";
            print $_POST[$key];
            print "<br>";
            if ($rule["required"]) {
                if (isset($_POST[$key]) && !empty($_POST[$key])) {
                    if ($rule["type"] == 'email') {
                        if (!filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
                            $errors[$key] = "email wrong";
                        }
                    }
                    if ($rule["type"] == 'text') {
                        if ($rule["max"] < strlen($_POST[$key])) {
                            $errors[$key] = " '$key' too long";
                        }
                        if ($rule["min"] > strlen($_POST[$key])) {
                            $errors[$key] = " '$key' too short";
                        }
                    }
                } else {
                    $errors[$key] = "$key is required";
                }
            }
            if (!isset($errors[$key])) {
                $result[$key] = $_POST[$key];
            }
        }

        $this->result = $result;
        $this->errors = $errors;

//        print "<pre>";
//        print_r($errors);
//        print "</pre>";
        if (count($errors) > 0) {
            return false;
        }
        return true;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getResult()
    {
        return $this->result;
    }

}