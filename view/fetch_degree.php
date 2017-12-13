<?php


session_start();
$connect = mysqli_connect("localhost", "root", "", "sms");
$output = '';

if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM degree 
  WHERE name LIKE '%".$search."%'
  OR description LIKE '%".$search."%' 
  OR duration LIKE '%".$search."%' 
  OR start_year LIKE '%".$search."%' 
 ";
}
else
{
    $query = "
  SELECT * FROM degree ORDER BY degree_id
 ";
}
$result = mysqli_query($connect, $query);
if(count($result) > 0)
{
    $output .= '


   <table class="table" >
    <tr>
     <th>Name</th>
     <th>Description</th>
     <th>Duration</th>
     <th>Start Year</th>
     <th>Edit</th>
     
     
    </tr>
 ';

    
    while($row = mysqli_fetch_assoc($result))
    {
       
        $user_id=$row["degree_id"];
        $output .= '
   
    
   <tr>
    
    <td>'.$row["name"].'</td>
    <td>'.$row["description"].'</td>
    <td>'.$row["duration"].'</td>
    <td>'.$row["start_year"].'</td>

    <td >
        <button class="btn btn-basic" data-toggle="modal""><a href="../controller/sar_controller.php?edit_id='.$row["degree_id"].'">Edit</a></button>
    </td>

    
   </tr>
   


       <!-- Edit Modal -->
    <div  id="e" class="modal fade" role="dialog">
                <div class="modal-content">
                    <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Edit Form</h4>
                </div>
                    <div class="modal-body">
                        <form id="userForm" class="form-horizontal" action="../controller/sar_controller.php" method="post">
                            
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2">First Name :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="firstname" value="'.$row["name"].'" type="text" name="firstname" placeholder="Type first name here" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Last Name :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="lastname" value="'.$row["description"].'" type="text" name="lastname" placeholder="Type last name here" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="area" value="'.$row["duration"].'" name="area" placeholder="Enter area here" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Type :</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" value="'.$row["start_year"].'" id="email" name="email" placeholder="Enter email here" required />
                                </div>
                            </div>


                            
                            

                            <div class="modal-footer">
                                <button type="button"  class="add-project" data-dismiss="modal">Edit</button> 
                                <button type="button"  class="cancel" data-dismiss="modal">Close</button> 
                                
                            </div>


                        </form>
                    </div>
                </div>
            </div>


  ';
    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}
