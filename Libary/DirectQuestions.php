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


class DirectQuestions
{

  /*
    not sure if this is redundent but, Martha would almost be analyizing $theMessage
    into a form, where it's easier to understand to come up with a response.?.?
            This is going to eventually into a MySQL database.
            Database - figureOut(example)
            Table - Each Array will have it's own.
            Row - String Word, String WordType
                   what            firstType
    Don't need it yet though, want to figure this out first.

                                ----

    Wonder if a google script should be able to add into this Database of
    questions and answers. by sending it into google search and googling
    "What is the answer of, THE QUESTION here" and  collecting all data
    that triggers something like:

    Martha peaks around for things after "Answer is" or "Best Answer"

    Martha => google Search -> "how do you answer, what color is the sky?"

    Google Results -> First Result -> Title: HELP! "what color is the sky?"? | Yahoo Answers

    Martha opens - >

    Looks for things like "Best Answer" collects the data after it saves to Database

    --from page source--
    <span class="ya-ba-title Fw-b">Best Answer:</span>&nbsp;
    <span itemprop="text" class="ya-q-full-text"> Basically, it has no colour: it is
    transparent. At night, when the Sun and Moon are below the horizon, it is black,
    except where the stars shine through it. When the Moon rises, it turns gray: light
    scattered by the air molecules, but not bright enough to trigger the colour
    receptors in our eyes. When the Sun is in the sky, it turns blue because of Rayleigh
    scattering by air molecules. It is still transparent, though, because you can see the Sun
    and Moon through it, and even bright planets and stars if you know exactly where to look.
    When the Sun is low in the sky, or just below the horizon, the sky shows various colours
    due to complex scattering and refraction. <br>
    <br>
    But probably the answer they want is &quot;blue.&quot; </span>
    --from page source--


    Source: https://answers.yahoo.com/question/index?qid=20100709211727AAq7lEg
    */

    function firstDistingushedWords(){
      $theArray = array( 'what', 'who', 'where', 'when', 'why', 'how' );
      return $theArray;
    }

    private function secondSentenceLeanerWords(){
      $theArray = array( 'are', 'then' );
      return $theArray;
    }

    private function thirdSentenceFinishers(){
      $theArray = array( 'you', 'doing' );
      return $theArray;
    }

    public function figureOut($theMessage)
    {
        $outsideCnt = 6; //define the number of subarrays for loop
        $outside    = $this->firstDistingushedWords();


        $middleCnt = 2; //define the number of subarrays for loop
        $middle    = $this->secondSentenceLeanerWords();

        /*
        May have to have 4 Arrays, depending how complex of answers Martha can answer.
        */
        $insideCnt = 2; //define the number of subarrays for loop
        $inside    = $this->thirdSentenceFinishers();


        //find specific words to determine the direct questions to figure out
        //a decent response
        for ($x = 0; $x < $outsideCnt; $x++) {
            if (stripos($theMessage, $outside[$x]) !== false) {
                for ($y = 0; $y < $middleCnt; $y++) {
                    if (stripos($theMessage, $middle[$y]) !== false) {
                        for ($z = 0; $z < $insideCnt; $z++) {
                            if (stripos($theMessage, $inside[$z]) !== false) {
                                $theQuestion =  $outside[$x] . " " . $middle[$y] . " " . $inside[$z];
                                break 3;
                            }
                        }
                    }
                }
            }
        }

        //This will be removed and a row count of the DB to be replaced
        $responseArrayCnt = 5; //update when adding responses

        //Parael Questions to the Response Array, if repsonse added..
        //add a question to trigger that response


        //Responses
        $responseArray = array (
          'Im doing okay, how are you?',
          'I am in the internet world, where are you?',
          'I am currently trolling many forums on the internet, just for the lulz! What are you doing?',
          'I am martha, a BOT. No big deal, who are you?',
          "I'm not sure exactly what you are directly asking me? Maybe try to reword and ask again? I am still learning, Sorry."
        );

        /*
          End Goal: Tell Martha the following to do, and martha actually do it and respond with approiate message.

          "Martha, save (123)321-0938 to my phone."" //Martha goes into my gmail, saves the number
                                                  //in my Google contacts, which will update my phone because of the sync.

          "Remind me (in 3 days/tomorrow/ next week) liam's doctors appointment at 1pm.""
                                          //Martha goes into my google calander, insearchs Liam's Doctors Apt
                                          //and sets the time for 1pm and pass any pre set reminder notifications in
                                          //the reminder set up on google. This will actually give you a notification on your phone
                                          //if sync is on.

          ETC.
        */
        $questionsArray = array (
          'how are you',
          'where are you',
          'what are doing',
          'who are you',
          'not sure'
        );

        //For Testing only, remove once sending through facebook.

        echo "--->    Facebook Messenger Question:    " . $theQuestion . "
         ---> The Answer is: ";
        for($i = 0; $i < $responseArrayCnt; $i++){
          if(stripos($questionsArray[$i],$theQuestion) !== false){
            echo $responseArray[$i];
          }
        }
    }
}
