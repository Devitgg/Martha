<?php
/*
Copyright (C) 2017 Devitgg

Permission is hereby granted, free of charge, to any person obtaining a copy
of this Application and associated documentation files (the "Application"),
to deal inthe Application without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Application, and to permit persons to whom the
Application is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Application.

THE APPLICATION IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE X
CONSORTIUM BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN
ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE APPLICATION OR THE USE OR OTHER DEALINGS IN THE APPLICATION.

Except as contained in this notice, the name of the X Consortium shall not be
used in advertising or otherwise to promote the sale, use or other dealings
in this Application without prior written authorization from the X Consortium.
*/

/*
messed something up, havn't figured out what. Will fix after Martha can do
 things. Needs to first understand what is being sent.
*/

class SendReply {
      public function sendTheMeme($senderID, $reply, $token){
      //prepare for liftoff
      if(empty($reply) || empty($token) || empty($senderID)){

        //Create log in database

      }else {
        //T-Minus 10.9.8..
        $options = array (
            'http' => array(
              'method' => 'POST',
              'content' => json_encode(array(
                'recipient' => array(
                    'id' => $senderID),
                'message' => array(
                    'text' => $reply))),
              'header' => "Content-Type: application/json\r\n"
            )
        );

        //T-Minus 3.2.1..
        $context = stream_context_create($options);

        //Launch, sending Martha's response
        file_get_contents(
          'https://graph.facebook.com/v2.6/me/messages?access_token=$token',
          false,
          $context
          );
      }
   }
}
