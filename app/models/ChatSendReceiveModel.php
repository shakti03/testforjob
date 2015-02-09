<?php
class ChatSendReceiveModel  extends Eloquent {
    protected $table = 'chat_data';
    protected $fillable = ['sender', 'receiver', 'msg', 'status', 'fr_chat_id'];
}
?>