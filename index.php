<?php
include 'header.php';
?>
<div id="main-content">
    <?php
    $connection = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");
    $sql  = "SELECT * FROM `student` JOIN studentclass WHERE student.sclass = studentclass.cid order by sid;";
    $result = mysqli_query($connection, $sql) or die("Invalid Query");

    echo "<pre>";
    print_r(mysqli_num_rows($result));
    echo "</pre>";
    if (mysqli_num_rows($result) > 0) {


    ?>
        <h2>All Records</h2>
        <table cellpadding="7px">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                //this method returns an associtive array (colomns as key value) 
                ?>
                <tr>
                    <td><?php echo $row['sid']; ?></td>
                    <td><?php echo $row['sname']; ?></td>
                    <td><?php echo $row['saddress']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['sphone']; ?></td>
                    <td>
                        <a href='edit.php'>Edit</a>
                        <a href='delete-inline.php'>Delete</a>
                    </td>
                </tr>
                <?php } 
                ?>
            </tbody>
        </table>
    <?php } ?>
</div>
</div>
</body>

</html>
