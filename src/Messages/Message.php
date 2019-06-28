<?php
namespace DingNotice\Messages;

abstract class Message
{
    protected $message = [];
    protected $at;

    protected $messageType = '';


    public function getMessage(){
        return $this->message;
    }

    protected function makeMessage($message)
    {
        if ($this->messageType){
            $message  = [
                'msgtype' => $this->messageType,
                $this->messageType => $message
            ];
        }
        $this->message = $message;
        return $this;
    }


    public function getBody(){

        if (empty($this->at)){
            $this->sendAt();
        }
        return $this->message + $this->at;
    }

}