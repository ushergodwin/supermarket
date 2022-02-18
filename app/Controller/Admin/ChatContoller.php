<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Chat;
use App\Models\ChatRequest;
use App\Models\ChatTyping;
use App\Models\User;
use System\Database\DB;
use System\Http\Request\Request as HttpRequest;

 class ChatContoller extends BaseController 
 { 

    public function __construct()
    {
        if(!$this->session()->contains('user'))
        {
            return redirect();
        }
    }

    public function support($chat_request)
    {

        $context = [
            'title' => "ADMIN DASHBOARD | SUPPORT",
            'online' => User::where('status', 'online')->get(),
            'user' => ChatRequest::join('users', 'chat_requests.request_by', 'users.email')->where('request_status', 1)->where('session_id', $chat_request)->get('fname, lname, chat_requests.request_by, chat_requests.session_id'),
            'session_id' => $chat_request
        ];
        
        ChatRequest::where('session_id', $chat_request)->update(['respondent' => session('user')->email]);
        
        return render('chat.super.chat', $context);
    }

    protected static function typing($user_email, $new_status = 'online', $set = true)
    {
        $status = ChatTyping::find($user_email, 'user_key')->value('status');

        if($set)
        {
            if(empty($status))
            {
              $typing = new ChatTyping(['user_key' => $user_email]);
              return $typing->save();  
            }
            return ChatTyping::where('user_key', $user_email)->update(['status' => $new_status]);
        }

        if(!$set)
        {
            if($status == 'typing')
            {
                $status = "typing...";

                return response()->json(200, $status);
            }
            return response()->json(200, $status);
        }

    }


    public function send(HttpRequest $request)
    {
        $sender = $request->post('sender');
        $receiver = $request->post('receiver');
        $session_id = $request->post('session_id');
        $message = $this->end_to_end_encryption($this->cleanText($request->post('message')));
        $row_message = $this->cleanText("<br/>" . $request->post('message'));

        $chat = [
            'sender' => $sender,
            'receiver' => $receiver,
            'sender_message' => $message,
            'chat_session_id' => $session_id,
            'sent_on' => date("Y-m-d"),
            'sent_at' => date("H:i:s")
        ];

        $last_message = Chat::find($session_id, 'chat_session_id')->orderBy('id', "DESC")->limit(1)->get();

        //receiver_reply
        if(empty($last_message))
        {
            $chat = new Chat($chat);
            if(!$chat->save())
            {
                return response()->json(202, "not sent");
            }
    
            return response()->json(200, "sent");
        }


        if(!empty($last_message->sender_message) && !empty($last_message->receiver_reply))
        {
            $chat = new Chat($chat);
            if(!$chat->save())
            {
                return response()->json(202, "not sent");
            }
    
            return response()->json(200, "sent");
        }

        if(!empty($last_message->sender_message) && empty($last_message->receiver_message))
        {
            if($last_message->sender == $sender)
            {
                $message = $this->end_to_end_encryption($last_message->sender_message, true) . $row_message;
                $message = $this->end_to_end_encryption($message);
                $update = Chat::find($last_message->id)->update(["sender_message" => $message]);

                if(!$update)
                {
                    return response()->json(202, "not sent");
                }
        
                return response()->json(200, "sent");
            }

            $update = Chat::find($last_message->id)->update(["receiver_reply" => $message]);
            if(!$update)
            {
                return response()->json(202, "not sent");
            }
    
            return response()->json(200, "sent");
        }

    }

    public function get($session_id)
    {
        $messages = Chat::where('chat_session_id', $session_id)->get();
        $bg_img = asset('img/undraw_profile.svg');
        if(!empty($messages))
        {
                foreach($messages as $value)
            {
                if(!empty($value->sender_message))
                {
                    $sender = User::find($value->sender, 'email')->get("fname, lname, email");
                   echo '
                    <div class="d-flex mt-1 justify-content-start py-1">
                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                            <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url(\''. $bg_img .'\'); background-size: cover;"></a>
                        </div>
                        <div class="userDatatable-inline-title">
                            <a href="#" class="text-dark fw-500">
                                <h6>' .  $sender->fname . " {$sender->lname}" . '</h6> 
                            </a>
                            <h5 class="d-block mb-0 text-secondary">
                                ' . $this->end_to_end_encryption($value->sender_message, true) .'
                            </h5>
                            <p class="d-flex justify-content-end text-success">
                                ' . $value->sent_at .'
                            </p>
                        </div>
                    </div>
                    ';
                }
                if(!empty($value->receiver_reply))
                {
                    $sender = User::find($value->receiver, 'email')->get("fname, lname, email");
                    echo
                    '
                    <div class="d-flex mt-1 justify-content-end py-1">
                        <div class="userDatatable__imgWrapper d-flex align-items-center">
                            <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url(\''. $bg_img .'\'); background-size: cover;"></a>
                        </div>
                        <div class="userDatatable-inline-title">
                            <a href="#" class="text-dark fw-500">
                                <h6>' . $sender->fname . " {$sender->lname}" . '</h6> 
                            </a>
                            <h5 class="d-block mb-0 text-success">
                                ' . $this->end_to_end_encryption($value->receiver_reply, true) .'
                            </h5>
                            <p class="d-flex justify-content-end text-success">
                                ' . $value->sent_at .'
                            </p>
                        </div>
                    </div>
                    ';
                }
            }
        }

    }


    public function setTyping($user_id, $status)
    {   
        return $this->typing($user_id, $status);
    }


    public function getTyping($user_id)
    {
        return $this->typing($user_id, '', false);
    }


    public function __joined__()
    {
        $chat_request = ChatRequest::join('users', 'chat_requests.respondent', 'users.email')->where('chat_requests.request_by', session('user')->email)->where('chat_requests.request_status', 1)->get('session_id, fname, lname');
        
        $bg_img = asset('img/undraw_profile.svg');
        if(!empty($chat_request))
        {

            $response = '
            <div class="d-flex mt-1">
                <div class="userDatatable__imgWrapper d-flex align-items-center">
                    <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url(\''. $bg_img .'\'); background-size: cover;"></a>
                </div>
                <div class="userDatatable-inline-title">
                    <a href="#" class="text-dark fw-500">
                        <h6>' . $chat_request[0]->fname . " {$chat_request[0]->lname}" . '</h6> 
                    </a>
                    <p class="d-block mb-0 text-success">
                        online
                    </p>
                </div>
            </div>
            ';
            $redirect = url('admin/dashboard/help/chat/' . $chat_request[0]->session_id);
            $status = 200;

        }else {
            $response = '
            <div class="d-flex mt-1">
                <div class="userDatatable__imgWrapper d-flex align-items-center">
                    <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url(\''. $bg_img .'\'); background-size: cover;"></a>
                </div>
                <div class="userDatatable-inline-title">
                    <a href="#" class="text-dark fw-500">
                        <h6>waiting...</h6>
                    </a>
                </div>
            </div>
            ';
            $redirect = '';

            $status = 202;
        }

        return response()->json($status, ["message" => $response, "redirect" => $redirect]);
    }


    public function __end__(HttpRequest $request)
    {
        $session_id = $request->post('session_id');
        sleep(1);
        $end = ChatRequest::where('session_id', $session_id)->update(['request_status' => 0]);

        if($end)
        {
            return response()->json(202, "Chat not ended. Please try again");
        }

        return response()->json(200, "You have ended the chat.");
    }


    public function request(HttpRequest $request)
    {
        $chat_request = $request->except([crsf()]);

        $chat_request = new ChatRequest($chat_request);

        if(!$chat_request->save())
        {
            return response()->json(202, "Failed to initiate the chat. Please try again");
        }

        return response()->json(200, "Chat Initiated, please wait as our respondent joins you");

    }

    public function getChatRequests()
    {
        $chat_requests = ChatRequest::where('request_status', 1)->get();

        foreach ($chat_requests as $value) {
            # code...
            echo '<div class="card card-body py-1 mt-1"><a href="' . url('admin/dashboard/support/chat/' . $value->session_id) . '" class="stretched-link">' . $value->reason . '</a></div>';
        }
    }


    public function getChatStatus($session_id)
    {
        $chat_request = ChatRequest::find($session_id, 'session_id')->get('request_status as status');

        if($chat_request->status == 0)
        {
            return response()->json(200, "ended");
        }

        return response()->json(302, "ended");
    }


    protected function cleanText($text)
    {
       return htmlspecialchars(stripslashes($text)); 
    }


    protected function end_to_end_encryption($text, $decrypt = false)
    {
        $output = '';
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'eaiYYkYTysia2lnHiw0N0vx7t7a3kEJVLfbTKoQIx5o=';
        $secret_iv = 'eaiYYkYTysia2lnHiw0N0';
           // hash
        $key = hash('sha256', $secret_key);

        $initialization_vector = substr(hash('sha256', $secret_iv), 0, 16);

        if($text != '')
        {
            if(!$decrypt)
            {
                    $output = openssl_encrypt($text, $encrypt_method, $key, 0, $initialization_vector);
                    $output = base64_encode($output);
            } 
            if($decrypt) 
            {
                $output = openssl_decrypt(base64_decode($text), $encrypt_method, $key, 0, $initialization_vector);
            }
        }
        return htmlspecialchars_decode($output);
    }
 }