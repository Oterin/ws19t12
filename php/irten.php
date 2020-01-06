<?php	
    session_start();
    session_destroy();
    
    echo '<script>
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log("User signed out.");
        });
    
    
    </script>';
    header("Location: Layout.php");
    exit();
?>
