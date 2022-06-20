<?php
$connection = new mysqli("localhost","root","","assignment");
if($connection==false){
    die("error.could not connect to the server".mysqli_connect_error());
}

$names = $_POST["names"];
$yoe = $_POST["yoe"];
$yog = $_POST["yog"];
$hae = $_POST["hae"];
$hag = $_POST["hag"];
$teacher = $_POST["teacher"];
$results = $_POST["results"];
$oc = $_POST["oc"];
$addresss = $_POST["addresss"];
$numbers = $_POST["numbers"];
$email = $_POST["email"];
$pasword = $_POST["pasword"];


$sql=" INSERT INTO alumni(names,yoe,yog,hae,hag,teacher,results,oc,addresss,numbers,email,pasword)
VALUES('$names','$yoe','$yog','$hae','$hag','$teacher','$results','$oc','$addresss','$numbers','$email','$pasword')";

if(mysqli_query($connection,$sql)){
    echo "records added";
}else{
    echo "error".$sql.mysqli_error($connection);
}

?>

<table border ="1" cellspacing="0" cellpadding="8">
  <tr>
    <th>SN</th>
  <th>names</th>
        <th>yoe</th>
        <th>yog</th>
        <th>hae</th>
        <th>hag</th>
        <th>teacher</th>
        <th>results</th>
        <th>oc</th>
        <th>addresss</th>
        <th>numbers</th>
        <th>email</th>
  </tr>

  <?php
$mysquery = "SELECT * FROM alumni";
$result = $connection ->query($mysquery);



if(mysqli_num_rows($result) > 0){
    $sn=1;
    while($data = mysqli_fetch_assoc($result)){
        ?>
        <tr>
        <td><?php echo $sn; ?></td>
            <td><?php echo $data["names"];?></td>
            <td><?php echo $data["yoe"];?></td>
            <td><?php echo $data["yog"];?></td>
            <td><?php echo $data["hae"];?></td>
            <td><?php echo $data["hag"];?></td>
            <td><?php echo $data["teacher"];?></td>
            <td><?php echo $data["results"];?></td>
            <td><?php echo $data["oc"];?></td>
            <td><?php echo $data["addresss"];?></td>
            <td><?php echo $data["numbers"];?></td>
            <td><?php echo $data["email"];?></td>
        </tr>
        </tr><?php
  $sn++;}}else {?>
  <tr>
    <td colspan="11">No data found</td>
  </tr><?php }
?>
</table>