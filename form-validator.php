<?php
    session_start();
    $company_name = $_GET["company-name"];
    $full_name = $_GET["full-name"];
    $email = $_GET["email"];
    $phone = $_GET["phone"];
    $delivery_method = $_GET["delivery-method"];

    if(strlen($company_name) >= 5){
        $_SESSION["company-name"] = true;

        if(strlen($full_name) >= 5 && !preg_match("/^[a-zA-Z'-]+$/", $full_name)){
            $_SESSION["full-name"] = true;

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION["email"] = true;

                if(ctype_digit($phone) && strlen($phone) === 10){
                    $_SESSION["phone"] = true;

                    if($delivery_method !== "not-selected"){
                        $_SESSION["delivery-method"] = true;
                        $_SESSION["sent"] = true;
                        echo("<script>location='./'</script>");
                    }
                    else{
                        $_SESSION["delivery-method"] = false;
                        echo("<script>location='./'</script>");
                    }
                }
                else{
                    $_SESSION["phone"] = false;
                    echo("<script>location='./'</script>");
                }
            }
            else{
                $_SESSION["email"] = false;
                echo("<script>location='./'</script>");
            }
        }
        else{
            $_SESSION["full-name"] = false;
            echo("<script>location='./'</script>");
        }
    }
    else{
        $_SESSION["company-name"] = false;
        echo("<script>location='./'</script>");
    }
?>