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
    
    public static function insertComments($data) {
        $result = DiscussionForum:: insert(array ("question_id" => $data['qid'], "user_id" => $data['uid'], "comment" => $data['comment']));
        if($result) {
            $user_name = DB:: table('user_profile')->where('user_id',$data['uid'])->get();
            $user_name = $user_name[0]->first_name;
            return $user_name;
        }
        return $result;
    }
}
?>