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
save everything facebook sends to Martha to database.
*/
class MessageData {

  public function theSenderId ($fb){
    $rid = $fb->entry[0]->messaging[0]->sender->id;

    return $rid;
  }

  public function theMessage ($fb){
    $theMessage = $fb->entry[0]->messaging[0]->message->text;
    return $theMessage;
  }
}
