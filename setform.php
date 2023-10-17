
<?php
    // echo $_SERVER['HTTP_REFERER'];
    require 'include/dbfile.php';

    // define variables and set to empty values
    $nameErr = $emailErr = $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['signin-submit']) && !empty($_POST['signin-submit']) && !empty($_POST["signin-name"])  && !empty($_POST["signin-email"])  && !empty($_POST["signin-password"])) {
            $name = test_input($_POST["signin-name"]);
            $email = test_input($_POST["signin-email"]);
            $password = test_input($_POST["signin-password"]);

            if(isAlreadyCustomer($email)) {
                echo '<script>
                        openFormAlert(location.href,"warning","<strong>Already a Customer!</strong>");
                </script>';
                // echo '<script>let alert=document.getElementById("warning");alert.style.display="block";
                // alert.innerHTML="<strong>Already a Customer!</strong>"</script>';
            }else {
                if(signUp($name,$email,$password)) {
                    echo '<script>
                        openFormAlert(location.href,"success","<strong>Success!</strong> Sign Up Success full.");
                    </script>';
                    // echo '<script>let alert=document.getElementById("success");alert.style.display="block";
                    // alert.innerHTML="<strong>Success!</strong> Sign Up Success full."</script>';
                }else {
                    echo '<script>
                        openFormAlert(location.href,"danger","<strong>Error !</strong> Something went wrong !");
                    </script>';
                    // echo '<script>let alert=document.getElementById("danger");alert.style.display="block";
                    // alert.innerHTML="<strong>Error !</strong> Something went wrong !"</script>';
                }
            }
        }
        else if (isset($_POST['login-submit']) && !empty($_POST['login-submit']) && !empty($_POST["login-email"]) && !empty($_POST["login-password"])) {
            $email = test_input($_POST["login-email"]);
            $password = test_input($_POST["login-password"]);
            $keepsignin;
            if (isset($_POST['login-keepSignIn'])) {
                $keepsignin= $_POST['login-keepSignIn'];
            } else {
                $keepsignin= "off";
            }
            if(isAlreadyCustomer($email)) { 
                if(logIn($email,$password)) {
                    echo '<script>
                        openFormAlert(location.href,"success","<strong>Success!</strong> Log In Success full.");
                        keepSignIn("'. $email .'","'.$keepsignin.'");
                    </script>';
                        // let alert=document.getElementById("success");alert.style.display="block";
                        // alert.innerHTML="<strong>Success!</strong> Log In Success full.";
                    // echo '<script>let alert=document.getElementById("success");alert.style.display="block";
                    // alert.innerHTML="<strong>Success!</strong> Log In Success full."</script>';
                    // echo '<script>  keepSignIn("'. $email .'","'.$keepsignin.'");</script>';
                }else {
                    echo '<script>
                        openFormAlert(location.href,"danger","<strong>Error !</strong> Incorrect Password !");
                    </script>';
                    // echo '<script>let alert=document.getElementById("danger");alert.style.display="block";
                    // alert.innerHTML="<strong>Error !</strong> Incorrect Password !"</script>';
                }
            }else {
                echo '<script>
                        openFormAlert(location.href,"warning","<strong>Not a Customer!</strong> Sign In.");
                </script>';
                // echo '<script>let alert=document.getElementById("warning");alert.style.display="block";
                // alert.innerHTML="<strong>Not a Customer!</strong> Sign In"</script>';
            }
        }
    }

?>