<?php
$con = mysqli_connect("localhost:3307", "root", "", "BTL_DATABASE");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //check null for all fields except ID
    if (empty($_POST['username']) || empty($_POST['new-password']) || empty($_POST['confirm-password']) || empty($_POST['ho']) || empty($_POST['ten']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['start_date']) || empty($_POST['status']) || empty($_POST['superiorID']))
    {
        echo "Vui lòng nhập đầy đủ thông tin!";

    }
    else 
    {
        //get the input
        $username = $_POST['username'];
        $employeeID = $_POST['ID'];
        $password = $_POST['new-password'];
        $confirm_password = $_POST['confirm-password'];
        $ho = $_POST['ho'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $start_date = $_POST['start_date'];
        $employee_status = $_POST['status'];
        $SuperiorID = $_POST['superiorID'];

        //check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "Email không hợp lệ!";
            exit();
        }

        //check if the phone number is valid, start with 0 and have 10-11 digits
        if (!preg_match('/^[0][0-9]{9,10}$/', $phone))
        {
            echo "Số điện thoại không hợp lệ!";
            exit();
        }

        //check if password is valid, at least 9 characters
        if (strlen($password) < 9)
        {
            echo "Mật khẩu phải có ít nhất 9 ký tự!";
            exit();
        }

        //check if the username already exists
        $query = "SELECT Username FROM account";
        $result = mysqli_query($con,$query);
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result))
            {
                if ($row['Username'] == $username)
                {
                    echo "Tên đăng nhập đã tồn tại!";
                    exit();
                }
            }
        }

        //check if the password and confirm password match
        if ($password != $confirm_password)
        {
            echo "Mật khẩu không khớp!";
            exit();
        }

        //check if the email already exists
        $query = "SELECT Email FROM account";
        $result = mysqli_query($con,$query);
        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                if ($row['Email'] == $email)
                {
                    echo "Email đã tồn tại!";
                    exit();
                }
            }
        }

        //insert the new account into the account table: AccountID, Username, Password, Email, PhoneNumber, FirstName, LastName
        $query = "INSERT INTO account (`AccountID`, `Username`, `Password`, `Email`, `PhoneNumber`, `FirstName`, `LastName`, `Age`)
                    VALUES ('$employeeID' ,'$username', '$password', '$email', '$phone', '$ho', '$ten', 20);";
        $result = mysqli_query($con,$query);


        // CREATE TABLE IF NOT EXISTS Employee (
        // EmployeeID VARCHAR(10) PRIMARY KEY,
        // StartDate DATE NOT NULL,
        // Status VARCHAR(255) NOT NULL,
        // SuperiorID VARCHAR(10),
        // CONSTRAINT fk_Employee_SuperiorID FOREIGN KEY (SuperiorID) REFERENCES Employee(EmployeeID)
        //);
        //insert the new user into the employee table with the start date. SuperiorID is default NULL
        $query = "INSERT INTO employee (`EmployeeID`, `StartDate`, `Status`, `SuperiorID`)
                    VALUES ('$employeeID', '$start_date', '$employee_status', '$SuperiorID');";
        $result = mysqli_query($con,$query);

        echo "Thêm nhân viên thành công!";
    }
}


?>