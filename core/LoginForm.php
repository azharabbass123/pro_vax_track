<?php 

spl_autoload_register(function ($class) {
    require  $class . '.php';
});

class LoginForm 
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::email($attributes['email'])) 
        {
            $this->errors['email'] = 'Please provide a valid email.';
        }
        if(!Validator::string($attributes['password'])){
            $this->errors['password'] = 'Please provide a valid password.';
        }
        if(!Validator::string($attributes['role'])){
            $this->errors['role'] = 'Please select a valid role.';
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