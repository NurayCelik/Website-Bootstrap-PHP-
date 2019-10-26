<?php
               if (isset($_GET['action']) && $_GET['action'] == "logout"){ // Here i get this logout id 
                 Session::destroy(); 
                 Session::set('adminName')=="";
                 
                 // Here i destroy this Session for login user.
             }
             else
             {
              ?>