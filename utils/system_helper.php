<?php 
//Redirect to page
function redirect($page = FALSE, $message = NULL, $message_type = NULL)
{
    if(is_string($page)){
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    //Check For Message
    if($message != NULL){
        //Set Message
        $_SESSION['message'] = $message;//we do that to access to the message after redirection to the new page where we gonna display the message.
    }
    //Check For Type
    if($message_type != NULL){
        //Set Message
        $_SESSION['message_type'] = $message_type;
    }

    //Redirect
    header('Location: ' . $location);
    exit;//end the script
}

//Display Message
function displayMessage(){
    if(!empty($_SESSION['message'])){
        //Assign Message Var
        $message = $_SESSION['message'];

        if(!empty($_SESSION['message_type'])){
            //Assign Type Var
            $message_type = $_SESSION['message_type'];
            //Create Output
            if($message_type == 'error'){
                echo '<div class="alert alert-danger">' . $message . '</div>';
            }else{
                echo '<div class="alert alert-successq">' . $message . '</div>';

            }
        }
        //Unset Message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo '';//if $message is empty the echo an empty string
    }
}