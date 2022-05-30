<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));

    $firstName = trim($json->firstName);
    $lastName = trim($json->lastName);
    $userType = trim($json->userType);
    $id = trim($json->id);
    $data = [];
    if (!empty($firstName) && !empty($lastName) && !empty($userType)) {
        require_once('./connect_db.php');

        $sql = "UPDATE user 
            set firstName = '$firstName',
            lastName = '$lastName',
            userType = '$userType' WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            $msg = "updated successfully";
        } else
            $msg = "Error: " . $sql . "<br>" . $conn->error;
    } else
        $msg = "this person doesn't exist";

    $conn->close();
} else
    $msg = "please enter the data";

$data["message"] = $msg;
echo json_encode($data);
