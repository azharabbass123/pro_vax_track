<?php 

spl_autoload_register(function ($class) {
    require  $class . '.php';
});

class UpdateProfileForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::string($attributes['name'])){
            $this->errors['name'] = 'Please provide a valid name.';
        }
        if(!Validator::string($attributes['date']))
        {
            $this->errors['date'] = 'Please provide a valid date';
        }
        if(!Validator::string($attributes['city'])){
            $this->errors['city'] = 'Please select a valid city.';
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