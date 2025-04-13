<?php
    session_start();

    if (isset($_SESSION["username"])){
        $logged_username = $_SESSION['username'];
    }
    
    echo "<link rel='stylesheet' href='navstyle.css'>";

    echo "<header>
            <div class='container'>
                    <div class='nav-bt'>
                        <div class='nav-links'>
                                <ul>";
            
            

            

            if(isset($_SESSION["role"]) && $_SESSION["role"] == "trainee") {
                echo "<li class='nav-link' style='--i: .6s'><a href='/ITI/Trainee/trainee_show.php?username=\"$logged_username\"'>Profile</a></li>";
            }
            else if(isset($_SESSION["role"]) && $_SESSION["role"] == "instructor") {
                echo "<li class='nav-link' style='--i: .6s'><a href='/ITI/Instructor/instructorshow.php?username=\"$logged_username\"'>Profile</a></li>";
            }else if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
                echo "<li class='nav-link' style='--i: .6s'><a href='/ITI/Admin/admin_profile.php?username=\"$logged_username\"'>Profile</a></li>";
            }


            if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
                echo "
                    <li class='nav-link' style='--i: .6s'><a href='/ITI/Trainee/trainee_list.php'>Trainee List</a></li>
                    <li class='nav-link' style='--i: .6s'><a href='/ITI/Instructor/instructors.php'>Instructor List</a></li>";
            }

            if(isset($_SESSION["username"])){
                echo "<li class='nav-link' style='--i: .6s'><a href='/ITI/Groups/group_list.php'>Group List</a></li>";
            }

            // if(!isset($_SESSION["username"])){
            //     echo "<li class='btn transparent'><a href='/ITI/Login/login.php'>Login</a></li>";
            // }

            echo "<div class='log-sign' style='--i: 1.8s'>";

            if(!isset($_SESSION["username"]) || $_SESSION["role"] == "admin"){
                echo "<a class='btn transparent' href='/ITI/Registeration/Trainee/regTraineeForm.php'>Register Trainee</a></li>";
            }

            if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
                echo "<a class='btn transparent' style='--i: .6s;' href='/ITI/Registeration/Instructor/regInstructorForm.php'>Register Instructor</a></li>";
            }

            if(isset($_SESSION["username"])){
                echo "<a class='btn solid' href='/ITI/Logout.php'>Logout</a></li>";
            }

            echo "</div>";
                
        echo"   
                </div>
            </div>
        </div>
    </header>";
?>
