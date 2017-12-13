<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "sms");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT first_name,last_name FROM student 
  WHERE index_no=$search
 ";
 $result = mysqli_query($connect, $query);

     if(mysqli_num_rows($result) > 0)
    {
      foreach ($result as $user) {
        $output .= $user["first_name"].' '.$user["last_name"];

      }
     echo $output;
    }
    else
    {
     echo 'Index Number not found';
    }
}
else
{
 // $query = "
 //  SELECT * FROM student ORDER BY s_id
 // ";
}

