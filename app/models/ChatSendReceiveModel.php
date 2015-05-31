<?php

class ChatSendReceiveModel  extends Eloquent {

    protected $table = 'chat_data';

    protected $fillable = ['sender', 'receiver', 'msg', 'status', 'fr_chat_id'];
    
    // Delete Chat History Of Inactive user
    public static function deleteChatHistory($cid) {
        return ChatSendReceiveModel:: where('fr_chat_id', $cid) ->delete();
    }

}

