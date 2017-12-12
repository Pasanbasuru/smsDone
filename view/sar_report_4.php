<?php
	 @session_start();
        if(!isset($_SESSION['user'])){
            header("Location:../index.php");
        }
	   

?>
<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "sms");
$output = '';
if(isset($_POST["export"]))
{

 $search = substr(Date('Y'), 0);
 $query = "SELECT * FROM student where index_no LIKE '".$search.".'%'";
 
 $result = mysqli_query($connect, $query);
 if(count($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Address</th>  
                         <th>City</th>  
       <th>Postal Code</th>
       <th>Country</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["username"].'</td>  
                         <td>'.$row["first_name"].'</td>  
                         <td>'.$row["last_name"].'</td>  
       <td>'.$row["type"].'</td>  
       <td>'.$row["nic"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "sms");

$sql = "SELECT * FROM `student` WHERE SUBSTRING(index_no,3,1)=1";
$result = mysqli_query($connect, $sql);


?>




<!DOCTYPE html>
<html>


<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../view/css/style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="test/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>

<body class="home">
    
                    <h2 align="center">CS students</h2><br /> 
                    <table class="table table-bordered">
                     <tr>  
                                         <th>Index NO</th>  
                                         <th>First Name</th>  
                                         <th>Mid Name</th>  
                       <th>Last Name</th>
                       <th>Gender</th>
                                    </tr>
                     <?php
                     while($row = mysqli_fetch_array($result))  
                     {  
                        echo '  
                       <tr>  
                         <td>'.$row["index_no"].'</td>
                         <td>'.$row["first_name"].'</td>  
                         <td>'.$row["mid_name"].'</td>  
                         <td>'.$row["last_name"].'</td>  
                           
                         <td>'.$row["gender"].'</td>
                       </tr>  
                        ';  
                     }
                     ?>
                    </table>
                    <br />
                    <form method="post" action="#">
                     <input type="submit" name="export" class="btn btn-success" value="Export" />
                    </form>
                   
    

</body>

</html>
