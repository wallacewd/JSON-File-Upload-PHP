<?php
                  // JSON File Uploader
                  // Initially created to upload the test paramaters for multiple stock-trading bots running at the same time.
                  // You can a json file with anyname and it will automatically re-write a set json file in that directory
                  // This is useful if you are calling a static json url but need to update the values in the file frequently
                  // Best used for internal use only or to learn/build off of.
                  // Dan Wallace
if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {

                  // Upload Error
            
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            
        }else {
                  // Print details
                 
             echo "File Upload: " . $_FILES["file"]["name"] . "<br/>";
             echo "File Type: " . $_FILES["file"]["type"] . "<br/>";
             echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br/>";
             
                  // Check if the file exists
                 
             if (file_exists("uploads/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
            
             }else {     
 
                  // You can change the name of the static JSON file here  
            $storagename = "json_update.json";
                
                  // Save file in folder "upload" 
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $storagename);
            echo "File Path: " . "uploads/" . $_FILES["file"]["name"] . "<br />";
            
            }
            
        }
        
     } else {
             echo "No file was selected. Try again. <br />";
             
     }
     
}
?>
