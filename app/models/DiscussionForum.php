<?php

class DiscussionForum extends BaseModel {
    protected $fillable = ['id',  'question_id', 'user_id', 'comment'];
    protected $table = 'discussion_forum';
    
    public static function fetchAllCommentsById($qid) {
        return DiscussionForum::leftJoin('objective_questions','objective_questions.id','=','discussion_forum.question_id')
                                ->leftJoin('user_profile','user_profile.id','=','discussion_forum.user_id')
                                ->where('discussion_forum.id',$qid)
                                ->select('user_profile.first_name','user_profile.last_name','comment');
    }
}
?>