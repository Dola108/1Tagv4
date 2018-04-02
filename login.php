<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) {
            include('connection.php');

            $uname = mysqli_real_escape_string($dbc, $_POST['uname']);
            $email = mysqli_real_escape_string($dbc, $_POST['email']);
            $pass = mysqli_real_escape_string($dbc, $_POST['psw']);


            $query = mysqli_query($dbc, "SELECT * FROM registration WHERE username='".$uname."'");
            $num_row = mysqli_num_rows($query);
            $myQuery = "SELECT * FROM registration";

            if($num_row == 1) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbmail = $row['email'];
                    $dbuname = $row['username'];
                    $dbpass = $row['password'];

                    if ($email == $dbmail) {
                        if (password_verify($pass, $dbpass)) {
                            if ($uname == $dbuname) {
                                header('Location: http://localhost/fuckinFromSkratch/profile.php?uname='.$_POST['uname']);
                            } else {
                                echo "Wrong username!!";
                            }
                        } else {
                            echo "Wrong password!!";
                            echo $pass;
                            echo "<br>";
                            echo $dbpass;
                        }
                    } else {
                        echo "Wrong E-mail id!!";
                    }
                }
            }
            else {
                echo "<script>
                      alert('You have to register first!!');
                      var modalreg = document.getElementById('myReg');
                      window.location.href = 'http://localhost/fuckinFromSkratch/homepage.php';
                      modalreg.style.display = 'block';
                      </script>";
            }
        }
    }
?>