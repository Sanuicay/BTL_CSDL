<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","BTL_DATABASE");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$search = $_POST['search'];
$search = str_replace(' ', '', $search);
$search = str_replace('(', '', $search);
$search = str_replace(')', '', $search);
$search = str_replace(';', '', $search);
$search = str_replace('.', '', $search);
$search = strtolower($search);

$sortby = $_POST['sortby'];

// Fetch employee data: EmployeeID, EmployeeName (concat from FirstName and LastName), StartDate, Status, SuperiorName (using SuperiorID, same ID from account table)
// SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName, e.StartDate, e.Status, CONCAT(sa.FirstName, ' ', sa.LastName) AS SuperiorName
// FROM Employee e
// INNER JOIN Account a ON e.EmployeeID = a.AccountID
// LEFT JOIN Employee s ON e.SuperiorID = s.EmployeeID
// LEFT JOIN Account sa ON s.EmployeeID = sa.AccountID;

if ($sortby == "ID") {
    $sql = "SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName, e.StartDate, e.Status, CONCAT(sa.FirstName, ' ', sa.LastName) AS SuperiorName
            FROM Employee e
            INNER JOIN Account a ON e.EmployeeID = a.AccountID
            LEFT JOIN Employee s ON e.SuperiorID = s.EmployeeID
            LEFT JOIN Account sa ON s.EmployeeID = sa.AccountID
            WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(a.FirstName, ' ', a.LastName)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
            ORDER BY EmployeeID ASC;";
    $result = mysqli_query($con, $sql);
} else if ($sortby == "Date") {
    $sql = "SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName, e.StartDate, e.Status, CONCAT(sa.FirstName, ' ', sa.LastName) AS SuperiorName
            FROM Employee e
            INNER JOIN Account a ON e.EmployeeID = a.AccountID
            LEFT JOIN Employee s ON e.SuperiorID = s.EmployeeID
            LEFT JOIN Account sa ON s.EmployeeID = sa.AccountID
            WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(a.FirstName, ' ', a.LastName)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
            ORDER BY StartDate DESC;";
    $result = mysqli_query($con, $sql);
} else if ($sortby == "Status") {
    $sql = "SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName, e.StartDate, e.Status, CONCAT(sa.FirstName, ' ', sa.LastName) AS SuperiorName
            FROM Employee e
            INNER JOIN Account a ON e.EmployeeID = a.AccountID
            LEFT JOIN Employee s ON e.SuperiorID = s.EmployeeID
            LEFT JOIN Account sa ON s.EmployeeID = sa.AccountID
            WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(a.FirstName, ' ', a.LastName)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
            ORDER BY Status ASC;";
    $result = mysqli_query($con, $sql);
} else if ($sortby == "SuperiorName") {
    // seach by superior name
    $sql = "SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName, e.StartDate, e.Status, COALESCE(CONCAT(sa.FirstName, ' ', sa.LastName), 'No Superior') AS SuperiorName
            FROM Employee e
            INNER JOIN Account a ON e.EmployeeID = a.AccountID
            LEFT JOIN Employee s ON e.SuperiorID = s.EmployeeID
            LEFT JOIN Account sa ON s.EmployeeID = sa.AccountID
            WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(sa.FirstName, ' ', sa.LastName)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
            ORDER BY EmployeeName ASC;";
    $result = mysqli_query($con, $sql);
} else {
    $sql = "SELECT e.EmployeeID, CONCAT(a.FirstName, ' ', a.LastName) AS EmployeeName, e.StartDate, e.Status, CONCAT(sa.FirstName, ' ', sa.LastName) AS SuperiorName
            FROM Employee e
            INNER JOIN Account a ON e.EmployeeID = a.AccountID
            LEFT JOIN Employee s ON e.SuperiorID = s.EmployeeID
            LEFT JOIN Account sa ON s.EmployeeID = sa.AccountID
            WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(a.FirstName, ' ', a.LastName)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
            ORDER BY EmployeeID ASC;";
    $result = mysqli_query($con, $sql);
}

            


// if ($sortby == "Name") {
//     $sql = "SELECT `Employee`.`EmployeeID`, CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`) AS `EmployeeName`, `Employee`.`StartDate`, `Employee`.`Status`, CONCAT(`Superior`.`FirstName`, ' ', `Superior`.`LastName`) AS `SuperiorName`
//             FROM `Employee`
//             LEFT JOIN `Employee` AS `Superior` ON `Employee`.`SuperiorID` = `Superior`.`EmployeeID`
//             WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
//             ORDER BY `EmployeeName` ASC;";
//     $result = mysqli_query($con, $sql);
// } else if ($sortby == "Date") {
//     $sql = "SELECT `Employee`.`EmployeeID`, CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`) AS `EmployeeName`, `Employee`.`StartDate`, `Employee`.`Status`, CONCAT(`Superior`.`FirstName`, ' ', `Superior`.`LastName`) AS `SuperiorName`
//             FROM `Employee`
//             LEFT JOIN `Employee` AS `Superior` ON `Employee`.`SuperiorID` = `Superior`.`EmployeeID`
//             WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
//             ORDER BY `StartDate` DESC;";
//     $result = mysqli_query($con, $sql);
// } else if ($sortby == "Status") {
//     $sql = "SELECT `Employee`.`EmployeeID`, CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`) AS `EmployeeName`, `Employee`.`StartDate`, `Employee`.`Status`, CONCAT(`Superior`.`FirstName`, ' ', `Superior`.`LastName`) AS `SuperiorName`
//             FROM `Employee`
//             LEFT JOIN `Employee` AS `Superior` ON `Employee`.`SuperiorID` = `Superior`.`EmployeeID`
//             WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
//             ORDER BY `Status` ASC;";
//     $result = mysqli_query($con, $sql);
// } else if ($sortby == "SuperiorName") {
//     // seach by superior name
//     $sql = "SELECT `Employee`.`EmployeeID`, 
//             CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`) AS `EmployeeName`, 
//             `Employee`.`StartDate`, 
//             `Employee`.`Status`, 
//             COALESCE(CONCAT(`Superior`.`FirstName`, ' ', `Superior`.`LastName`), 'No Superior') AS `SuperiorName`
//             FROM `Employee`
//             LEFT JOIN `Employee` AS `Superior` ON `Employee`.`SuperiorID` = `Superior`.`EmployeeID`
//             WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(`Superior`.`FirstName`, ' ', `Superior`.`LastName`)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
//             ORDER BY `EmployeeName` ASC;";
//     $result = mysqli_query($con, $sql);
// } else {
//     $sql = "SELECT `Employee`.`EmployeeID`, CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`) AS `EmployeeName`, `Employee`.`StartDate`, `Employee`.`Status`, CONCAT(`Superior`.`FirstName`, ' ', `Superior`.`LastName`) AS `SuperiorName`
//             FROM `Employee`
//             LEFT JOIN `Employee` AS `Superior` ON `Employee`.`SuperiorID` = `Superior`.`EmployeeID`
//             WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(LOWER(CONCAT(`Employee`.`FirstName`, ' ', `Employee`.`LastName`)), ' ', ''), '(', ''), ')', ''), ';', ''), '.', '') LIKE '%{$search}%'
//             ORDER BY `EmployeeName` ASC;";
//     $result = mysqli_query($con, $sql);
// }
    

if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên Nhân viên</th>
                    <th>Ngày vào làm</th>
                    <th>Trạng thái</th>
                    <th>Quản lý</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr onclick=\"redirectToDetailsPage('".$row['EmployeeID']."')\">
                <td>".$i."</td>
                <td>".$row['EmployeeID']."</td>
                <td>".$row['EmployeeName']."</td>
                <td>".$row['StartDate']."</td>
                <td>".$row['Status']."</td>
                <td>".$row['SuperiorName']."</td>
                <td><a href=\"database_scripts/confirmation_2.php?id={$row['EmployeeID']}\">Xóa</a></td>
            </tr>";
        $i++;
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No results found";
}

mysqli_close($con);
?>