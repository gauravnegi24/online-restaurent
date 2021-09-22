<?php
    include_once('connection.php');
    
    if(isset($_POST['readrecord'])){
        $fetch = mysqli_query($connection, "SELECT * FROM item_table WHERE item_status = 'not_available'");

        if(mysqli_num_rows($fetch) > 0){
            $i = 1;
            while ($trashed = mysqli_fetch_array($fetch)){
                echo   '<tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$trashed["item_name"].'</td>
                            <td>'.$trashed["item_unit"].'</td>
                            <td>'.$trashed["total_item"].'</td>
                            <td><a href="restore.php?id='. $trashed['item_id'] .'" class="btn btn-sm btn-outline-success"><i class="fas fa-undo-alt"></i> Restore</a>&nbsp;
						    <a href="delete.php?id='. $trashed['item_id'] .'" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</a></td>
                        </tr>';
                $i++;
            }
        }
        else{
            echo '<br><br>
                    <tr><td colspan="4"><h3 style="color:crimson;">
                    Sorry no trashed available.!</h3></td></tr>';
        }
    }
?>