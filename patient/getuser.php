<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/15/2020
 * Time: 3:45 PM
 */
    include '../php/config.php';

    if(ISSET($_POST['search_one'])){
        $search = $_POST['search_one'];
        $query = $connect->query("SELECT * FROM doctors WHERE (types LIKE '%".$search."%') OR (first_name LIKE '%".$search."%') ORDER BY first_name ASC");
        $rows = $query->num_rows;

        if($rows > 0){
    //        $fetch = mysqli_fetch_assoc($query);
        }else{
            echo "
                    <tr>
                        <td colspan='12' class='text-center text-danger'>No Data Found!</td>
                    </tr>
                ";
        }
    }

?>

<?php while ($row = mysqli_fetch_assoc($query)){?>
    <p><?php echo $row['first_name'];?></p>
<?php }?>