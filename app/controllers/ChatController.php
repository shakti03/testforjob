<?php
class ChatController extends BaseController {
    
    //public function getIndex() {
    //    $view =  View::make('chat.index', array('name' => 'Nitin Solanki'))->with('age','25');
    //    $view->location = "India";
    //    $view['tech'] = 'php';
    //    return $view;
    //}
    //
    //public function newCuser() {
    //    return View::make('chat.new_user')->with('title','new chat user');    
    //}
    
    public function createCuser() {
        $admin = CreateChatUserModel:: where('status',1)
                                       ->where('cname',Input:: get('chat_uname'))
                                       ->get(array('cname'));
        if(count($admin) > 0 and $admin[0]['cname'] == 'admin') {
            Session::put('owner', 'admin');
            #return Redirect:: to('chat/viewchat')->with('message', 'View Chat');
            #return Redirect:: to('/')->with('message', 'View Chat');
            echo json_encode(null);
        }
        else {
            $admin = CreateChatUserModel:: where('status',1)
                                                                    ->where('cname','admin')
                                                                    ->get(array('cname'));
            if(count($admin) > 0) {
                    CreateChatUserModel:: create(array(
                        'cname' => Input:: get('chat_uname'),
                        'cemail' => 'email',//Input:: get('email'),
                        'cmob' => '123',//Input:: get('mob'),
                        'status' => 1
                    ));
                    $records = CreateChatUserModel:: orderBy('id', 'ASC')->get();
                    $current_record = $records->last();
                    //print_r($current_record["cname"]);exit;
                    Session::put('active_chat', ['fid' => $current_record["id"], 'sender' => $current_record["cname"], 'receiver' => 'admin']);
                    Session::put('user', 'user');
                    #return Redirect:: to('chat/viewchat')->with('message', 'View Chat');
                    #return Redirect:: to('/')->with('message', 'View Chat');
                    echo json_encode(Session::get('active_chat'));
                }
                else {
                    echo "Leave a message ....";
                }
            }
        }
        
    //public function viewChat() {
    //        //return View::make('chat.chat_window')->with('title','Chat Window');
    //        return View::make('index')->with('title','Chat Window');
    //}
    
    public function sendChat() {
       //print_r(Session:: get('active_chat'));exit;
        $active_chat = Input:: get('active_chat');
        ChatSendReceiveModel:: create(array(
            'fr_chat_id' => $active_chat['fid'],
            'sender' => $active_chat['sender'],
            'receiver' => $active_chat['receiver'],
            'msg' => Input:: get('msg'),
            'status' => Input:: get('status')
        ));
        $data = ["active_chat" => Input:: get('active_chat'), "msg" => Input:: get('msg'), "status" => Input:: get('status')];
        echo json_encode($data);
        //return Redirect:: to('chat/chatwindow')->with('message', 'User created');
    }
    
    public function receiveChat() {
        $new_user_online = [];
        $update = [];
        $flag = 0;
        if(Session:: has('owner')) {
            $new_user_online = CreateChatUserModel:: where('status', 1)
                                                                                    ->where('cname', '!=', 'admin')
                                                                                    ->get(array('cname','id'));
            
            //print_r(count($new_user_online));exit;
            if(count($new_user_online) > 0) {
                //Session::put('active_chat', ['fid' => $new_user_online[0]["id"], 'sender' => 'admin', 'receiver' => $new_user_online[0]["cname"]]);
                //Session::forget('owner');
                
                foreach($new_user_online as $dt){
                    $dt ->status = 0;
                    $dt->save();
                    $data['activechat_'.$dt->id] = ['fid' => $dt["id"], 'sender' => 'admin', 'receiver' => $dt["cname"]];
                }
                echo json_encode($data);
                //return Redirect:: to('chat/viewchat')->with('message', 'View Chat');
            }
            else {
                $update = ChatSendReceiveModel:: where('status', 0)
                                                ->where('receiver', 'admin')
                                                ->get();
                $flag = 1;
            }
        }
        //print_r(Session:: get('active_chat'));exit;
        if(Session:: has('user')) {
            $active_chat = Session:: get('active_chat');
            $fid = $active_chat['fid'];
            $sender = $active_chat['sender'];
            $receiver = $active_chat['receiver'];
            $update = ChatSendReceiveModel:: where('status', 0)
                                            ->where('sender',$receiver)
                                            ->where('receiver', $sender)
                                            ->where('fr_chat_id',$fid)
                                            ->get();
            $flag = 1;
            //$update = ChatSendReceiveModel:: all();
        }
        if($flag) {
            if(count($update) > 0) {
                foreach ($update as $dt) {
                    $dt->status = 1;
                    $dt->save();
                    $data[$dt['id']] = ['fid' => $dt["fr_chat_id"], 'sender' => $dt["sender"], 'receiver' => $dt["receiver"], "msg" =>$dt['msg'], "status" => $dt['status']];
                }
                echo json_encode($data);
            }
            else {
                $data = 0;
                echo json_encode($data);
            }
        }
    }
}
?>