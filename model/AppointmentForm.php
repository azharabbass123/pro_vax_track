<?php 

spl_autoload_register(function ($class) {
    require  $class . '.php';
});

class AppointmentForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::string($attributes['date']))
        {
            $this->errors['date'] = 'Please provide a valid date';
        }
        
        if(!Validator::string($attributes['health_worker'])){
            $this->errors['health_worker'] = 'Please select a health_worker.';
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