<?php

class BaseModel extends Eloquent {

  public function __construct($attributes = array())
  {
    parent::__construct($attributes);
    if ($this->useSti()) {
      $this->setAttribute($this->stiClassField,get_class($this));
    }
  }

  private function useSti() {
    return ($this->stiClassField && $this->stiBaseClass);
  }

  public function newQuery($excludeDeleted = true)
  {
    $builder = parent::newQuery($excludeDeleted);
    // If I am using STI, and I am not the base class, 
    // then filter on the class name.    
    if ($this->useSti() && get_class(new $this->stiBaseClass) !== get_class($this)) {
        $builder->where($this->stiClassField,"=",get_class($this));
    }
    return $builder;
  }

  public function newFromBuilder($attributes = array())
  {
    if ($this->useSti() && $attributes->{$this->stiClassField}) {
      $class = $attributes->{$this->stiClassField};
      $instance = new $class;
      $instance->exists = true;
      $instance->setRawAttributes((array) $attributes, true);
      return $instance;
    } else {
      return parent::newFromBuilder($attributes);
    }
  }
	/**
	 * Get all of the models from the database.
	 *
	 * @param  array  $columns
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	/*
	public static function all($columns = array('*'))
	{

		$instance = new static;
	      $class = $attributes->{$this->stiClassField};
	      $instance = new $class;
		return $instance->newQuery()->get($columns);
	}
	*/
}
?>
