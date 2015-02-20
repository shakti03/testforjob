<?php

class CreateChatUserModel extends Eloquent {

    protected $table = 'chat_users';

    protected $fillable = ['id', 'cname', 'cemail', 'cmob','status'];
    
    // Delete Inactive chat user
    public static function deleteChatUser($uid) {
        return CreateChatUserModel:: where('id', $uid) -> delete();
    }
    

}

?>