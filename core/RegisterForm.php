<?php 

spl_autoload_register(function ($class) {
    require  $class . '.php';
});

class RegisterForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::string($attributes['name'])){
            $this->errors['name'] = 'Please provide enter your name.';
        }
        if(!Validator::email($attributes['email'])) 
        {
            $this->errors['email'] = 'Please provide a valid email.';
        }
        if(!Validator::string($attributes['password'], 7, 30)){
            $this->errors['password'] = 'Please provide a strong password.';
        }
        if(!Validator::string($attributes['date']))
        {
            $this->errors['date'] = 'Please provide a valid date';
        }
        if(!Validator::string($attributes['role'])){
            $this->errors['role'] = 'Please select a role.';
        }
        if(!Validator::string($attributes['city'])){
            $this->errors['city'] = 'Please select a city.';
        }
    }
    
    public static function validate($attributes){
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    } 
    
    public function throw(){
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(){
        return count($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field] = $message;
        return $this;

    }

}