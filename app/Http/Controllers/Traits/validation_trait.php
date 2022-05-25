<?php
namespace App\Http\Controllers\Traits;

trait validation_trait{
    
    function validate_employee_unique_data()
    {
        $this->validate( request(), [
            'bvn' => 'required|unique:users',
            //'nin' => 'unique:users',
            'username' => 'unique:users'
        ] );
    }

}
