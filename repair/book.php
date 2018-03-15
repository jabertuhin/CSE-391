<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">

<head>
    <title>Repair!</title>
</head>

<body>
    <div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

        <form action="message.php" method="POST">
            <table>
                <th>Your Information:</th>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" required="required" name="name" /></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" required="required" name="address" /></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" required="required" name="phone_number" /></td>
                </tr>
                <tr>
                    <td>Car License:</td>
                    <td><input type="text" required="required" name="car_license" /></td>
                </tr>
                <tr>
                    <td>Engine Number:</td>
                    <td><input type="text" required="required" name="engine_number" /></td>
                </tr>
                <tr>
                    <td>Appoinment Date:</td>
                    <td><input type="date" required="required" name="date" /></td>
                </tr>
                <tr>
                    <td>Mechanic</td>
                    <td>
                        <select name="mechanic">
                        <?php
                             require 'connect.php';
                             $sql_query = "SELECT * from mechanic";
                             $result = mysqli_query($conn, $sql_query);
                             echo mysqli_num_rows($result);
                            
                             while($row = mysqli_fetch_assoc($result)) {                                                                 
                                 echo "<option value=\"".$row['ID']."\">".$row['name']."</option>";                                 
                             }
                             mysqli_close($conn);
                        ?>                                                    
                        </select>
                    </td>
                </tr>

            </table>
            <input type="submit" value="submit" />
        </form>

    </div>
</body>

</html>
