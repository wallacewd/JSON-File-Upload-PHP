<?php
if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {

                  // Upload Error
            
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            
        }else {
                  // Print details
                 
             echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
             echo "Type: " . $_FILES["file"]["type"] . "<br/>";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br/>";
             
                  // Check if the file exists
                 
             if (file_exists("uploads/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
            
             }else {     
                  // Save file in folder "upload" 
                    
            $storagename = "json_update.json";
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $storagename);
            echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
            
            }
            
        }
        
     } else {
             echo "No file was selected. Try again. <br />";
             
     }
     
}
?>
