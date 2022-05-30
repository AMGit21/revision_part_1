<?php

class user
{
    public $id;
    public $firstName;
    public $lastName;
    public $userType;
}

require_once('./connect_db.php');
$sql = "SELECT id, firstName, lastName, userType FROM user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = [];
    // output data of each row
    for ($i = 0; $row = $result->fetch_assoc(); $i++) {
        $user = new user();
        $user->id = $row['id'];
        $user->firstName = $row['firstName'];
        $user->lastName = $row['lastName'];
        $user->userType = $row['userType'];
        array_push($data, $user);
    }
}
// $data["sub_count"] = $result->num_rows;
$conn->close();
echo json_encode($data);
