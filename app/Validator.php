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
            if ($rule["required"]) {
                if (isset($_POST[$key]) && !empty($_POST[$key])) {
                    if ($rule["type"] == 'email') {
                        if (!filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
                            $errors[$key] = "email wrong";
                        }
                    }
                    if ($rule["type"] == 'text') {
                        if (isset($rule["max"]) && $rule["max"] < strlen($_POST[$key])) {
                            $errors[$key] = "$key too long";
                        }
                        if (isset($rule["min"]) && $rule["min"] > strlen($_POST[$key])) {
                            $errors[$key] = "$key too short";
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

        $this->saveErrors();
        $this->saveValues();

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

    public function saveErrors()
    {
        session_start();
        foreach ($this->errors as $key => $error) {
            $_SESSION[$key] = $error;
        }
    }

    public function saveValues()
    {
        session_start();
        $_SESSION['values'] = $_POST;
    }

}