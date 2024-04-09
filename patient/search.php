<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/9/2020
 * Time: 4:48 PM
 */

require_once '../php/config.php';

if(ISSET($_POST['search'])){
    $search = $_POST['search'];
    $query = $connect->query("SELECT * FROM doctors WHERE (category LIKE '%".$search."%') OR (first_name LIKE '%".$search."%') ORDER BY first_name ASC");
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

<?php while ($fetch = mysqli_fetch_assoc($query)){?>
    <tr>
        <td class="text-capitalize"><?php echo $fetch['first_name'];?> <?php echo $fetch['last_name'];?></td>
        <td class="text-capitalize"><?php echo $fetch['category'];?></td>
        <td><?php echo $fetch['phone'];?></td>

        <td><?php echo $fetch['schedule'];?></td>
        <td><?php echo number_format($fetch['charge'], 2);?></td>
        <td>
            <a href="confirm_book.php?book=<?php echo $fetch['doctor_id'];?>" target="_blank" class="btn btn-success">Book Now</a>
        </td>
        <td>
            <a href="doctor_profile.php?doctor_id=<?php echo $fetch['doctor_id']?>" target="_blank" class="btn btn-primary">View Profile</a>
        </td>

    </tr>
<?php } ?>