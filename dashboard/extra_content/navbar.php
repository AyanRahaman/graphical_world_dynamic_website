<nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                 <h4>
                                 <?php
                               if($_SESSION["email"]  == true){
                            
                                   echo $_SESSION["email"];
                                   echo '<i class="fa-solid fa-user pe-2"></i>';
                               }
                               else{
                                   echo "something went wrong";
                               }
                               ?>
                                 </h4>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="password_change.php" class="dropdown-item">Change Password</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>