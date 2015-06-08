<?php

class DiscussionForum extends BaseModel {
    protected $fillable = ['id',  'question_id', 'user_id', 'comment'];
    protected $table = 'discussion_forum';
    
    public static function fetchAllCommentsById($qid) {
        $result = DiscussionForum::leftJoin('user_profile','user_profile.id','=','discussion_forum.user_id')
                                ->where('discussion_forum.question_id',$qid)
                                ->select('user_profile.first_name','discussion_forum.comment')
                                ->get();
        return $result;
    }
    
    public static function insertComment($data) {
        DiscussionForum::insert(array ("question_id" => $data['question_id'], "user_id" => $data['user_id'], "comment" => $data['comment']));
        return true;
    }
}