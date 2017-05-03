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


//include the classes
include "Resources/Config.php";              //Configuing Martha.
include "Libary/MessageData.php";         //Decode the JSON data sent from FB.
include "Libary/DetermineTheMessage.php"; //Determine if Statement or Question.
include "Libary/StatementAnswers.php";    //Possiblity of statement replies.
include "Libary/DirectQuestions.php";     //possiblity of questions to martha w/ replies.
include "Libary/IndirectQuestions.php";   //possiblity of questions needed to be
                                   //searched on google.
include "Libary/SendReply.php";           //takes the processed reply and sends back
                                   //to facebook.


//Get data from facebook
//file_put_contents("fb.txt", file_get_contents("php://input")); //comment this out for testing purposes
$fb = file_get_contents("fb.txt");
$fb = json_decode($fb);

//Define classes
$get                = new MessageData();
$theKey             = new Config();
$think              = new DetermineTheMessage();
$goAheadAnd         = new SendReply();
$isDirectQuestion   = new DirectQuestions();
$isIndirectQuestion = new indirectQuestions();
$isStatement        = new StatementAnswers();


//Define Continued..
$senderID   = $get->theSenderId($fb);
$theMessage = $get->theMessage($fb);
$token      = $theKey->accessToken();


//Detemine what type of message was sent to you
$processTheMessage = $think->figureOut($theMessage);

switch ($processTheMessage) {
    case "Asking Martha Something":
        echo "Asking Martha Something"; //development purposes
        $isDirectQuestion->figureOut($theMessage);
        return $reply;
        break;

    case "Asking Martha for Something":
        echo "Asking Martha for Something"; //send message to Indirect questions
        //return a reply
        break;

    case "Telling Martha Something":
        echo "Telling Martha Something"; //send message to Statement Answers
        break;

    default:
        echo "Err, something went wrong!";
};

//for testing purposes
$reply = "this is a test";

if(!empty($reply)) {
    $goAheadAnd->sendTheMeme($reply, $senderID, $token);
}
