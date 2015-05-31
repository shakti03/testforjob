<?php

class Enquiry extends Eloquent{
    
    protected $table = 'contact';
    protected $fillable = ['name', 'mobile', 'email', 'message'];
    
}


