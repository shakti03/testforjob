<?php

class CreateChatUserModel extends Eloquent {
    protected $table = 'chat_users';
    protected $fillable = ['id', 'cname', 'cemail', 'cmob','status'];
}
?>