<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));
    // echo json_encode($json->fname . " " . $json->lname);

    $firstName = trim($json->firstName);
    $lastName = trim($json->lastName);
    $userType = trim($json->userType);
    $data = [];
    if (!empty($firstName) && !empty($lastName) && !empty($userType)) {
        require_once('./connect_db.php');

        $sql = "SELECT *
            FROM user 
            WHERE firstName = '$firstName' 
            AND lastName = '$lastName'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO user (firstName, lastName, userType) 
            VALUES ('$firstName', '$lastName', '$userType')";

            if ($conn->query($sql) === TRUE) {
                $msg = "New record created successfully";
                // $data = ["first_name"=>$fn, "last_name"=>$ln];
                // array_push($data, $fn, $ln, $msg);
                $data["firstName"] = $firstName;
                $data["firstName"] = $firstName;
                $data["lastName"] = $lastName;
                $data["userType"] = $userType;
            } else
                $msg = "Error: " . $sql . "<br>" . $conn->error;
        } else
            $msg = "this person exist";

        $conn->close();
    } else
        $msg = "please enter the data";

    $data["message"] = $msg;
    echo json_encode($data); // $data=[first_name=>$fn,last_name=>$ln,$message=>$msg]
}
