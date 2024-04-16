

	<!--main content section-->
    <div class = "main-content">
    	<div class = "wrapper">
    	<h1>Failed to login. This is to prevent users from leaking sensitive information.</h1>
    	<br>

        <?php 
        if(isset($_SESSION['login']))//if login succesful
        {
            echo $_SESSION['login'];//display message
            unset($_SESSION['login']);//remove message
        }
        ?>
        
        <div class = "clearfix"></div>
    	
        </div>
    </div>
	<!--main content section-->