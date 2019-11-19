<html>
<body>
	<form method="GET" action="link.php">
            <ul>
                <li><a href="?link=1" name="link">link 1</a></li>
                <li><a href="?link" name="link">link 2</a></li>
                <li><a href="?link=3" name="link">link 3</a></li>
                <li><a href="?link=4" name="link">link 4</a></li>    
            </ul>

       <div id="mainSection">
     <?php
        $link=$_GET['link'];
        if ($link == '1'){
           echo "1";
                  }
        if ($link == '2'){
            echo "2";
        }
        if ($link == '3'){
            echo "3";
        }
        if ($link == '4'){
            echo "4";
        }
            
       ?>  
        </div>
    </form>
    </body>
    </html>