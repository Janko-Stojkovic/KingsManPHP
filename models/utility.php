<?php
    function error($errors, $name, $alert){
        if(isset($errors[$name])){
            echo "<div class='mt-2 alert alert-".$alert."'>". $errors[$name] ."</div>";
        }
        else{
            echo "";
        }
    }

    function value($post, $value){
        if(isset($post[$value])){
            echo $post[$value];
        }
        else{
            echo "";
        }
    }