<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<?php
include("db_connection.php");

// Fetch total employee count
$result = $conn->query("SELECT COUNT(*) AS count FROM employee");
$employeeCount = $result->fetch_assoc()['count'];

// Fetch all employees information based on department
$result = $conn->query("SELECT * FROM employee");
$employeeInfo = '';
while ($row = $result->fetch_assoc()) {
    $employeeInfo .= "<p>{$row['name']} - {$row['departmentId']}</p>";
}

// Fetch leave requests
$result = $conn->query("SELECT * FROM leave_requests");
$leaveRequests = '';
while ($row = $result->fetch_assoc()) {
    $status = $row['status'] == 0 ? 'Pending' : ($row['status'] == 1 ? 'Approved' : 'Rejected');
    $leaveRequests .= "
        <div>
            <p>{$row['reason']} ({$status})</p>
        </div>
    ";
}

// Fetch total earnings
$result = $conn->query("SELECT SUM(baseSalary) AS total FROM salary");
$totalEarnings = $result->fetch_assoc()['total'];

// Fetch attendances with employee names
$query = "
    SELECT a.employeeId, a.date, e.name 
    FROM attendance a
    JOIN employee e ON a.employeeId = e.employeeId
";
$result = $conn->query($query);
$attendances = '';
while ($row = $result->fetch_assoc()) {
    $attendances .= "<p>{$row['name']} - {$row['date']}</p>";
}
$data['attendances'] = $attendances;


// Fetch holidays calendar
$result = $conn->query("SELECT * FROM holidays");
$calendar = '';
while ($row = $result->fetch_assoc()) {
    $calendar .= "<p>{$row['date']} - {$row['description']}</p>";
}

// Fetch employee salaries
/*
$result = $conn->query("SELECT * FROM salary");
$employeeSalaries = '';
while ($row = $result->fetch_assoc()) {
    $employeeSalaries .= "<p>{$row['employeeId']} - {$row['baseSalary']}</p>";
}
*/

$query = "
    SELECT s.employeeId, s.baseSalary, e.name
    FROM salary s
    JOIN employee e ON s.employeeId = e.employeeId
";
$result = $conn->query($query);
$employeeSalaries = "";
while($row = $result->fetch_assoc()) {
    $employeeSalaries .= "<p>{$row['name']} => {$row['baseSalary']}</p>";
}
$data['employeeSalaries'] = $employeeSalaries;


// Fetch projects
$result = $conn->query("SELECT * FROM services");
$projects = '';
while ($row = $result->fetch_assoc()) {
    $status = $row['Status'] == 0 ? 'On going' : 'Completed';
    $projects .= "<p>{$row['ProjectName']} - {$status}</p>";
}

// Fetch clients
$result = $conn->query("SELECT * FROM clients");
$clients = '';
while ($row = $result->fetch_assoc()) {
    $clients .= "<p>{$row['name']} - {$row['contactInfo']}</p>";
}

// Fetch departments
$result = $conn->query("SELECT * FROM department");
$departments = '';
while ($row = $result->fetch_assoc()) {
    $departments .= "<p>{$row['departmentName']}</p>";
}

// Fetch jobs applied
$result = $conn->query("SELECT * FROM applicants");
$jobsApplied = '';
while ($row = $result->fetch_assoc()) {
    $jobsApplied .= "<p>{$row['name']} applied for {$row['job_id']}</p>";
}

// Fetch contact info
$result = $conn->query("SELECT * FROM contacts");
$contactInfo = '';
while ($row = $result->fetch_assoc()) {
    $contactInfo .= "<p>{$row['contactPerson']} - {$row['department']} - {$row['phoneNumber']}</p>";
}

$conn->close();
?>

<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-8 text-center">Admin Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <a href="view_data.php?type=employees" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Employees</h2>
            <p>Total Employees: <?= $employeeCount ?></p>
        </a>

        <a href="view_data.php?type=leave_requests" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Leave Requests</h2>
            <div><?= $leaveRequests ?></div>
        </a>

        <a href="view_data.php?type=total_earnings" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Total Earnings</h2>
            <p>$<?= $totalEarnings ?></p>
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <a href="view_data.php?type=attendances" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Attendances</h2>
            <div><?= $attendances ?></div>
        </a>

        <a href="view_data.php?type=calendar" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Calendar</h2>
            <div><?= $calendar ?></div>
        </a>

        <a href="view_data.php?type=employee_salaries" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Employees Salary</h2>
            <div><?= $employeeSalaries ?></div>
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <a href="view_data.php?type=projects" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Projects</h2>
            <div><?= $projects ?></div>
        </a>

        <a href="view_data.php?type=clients" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Clients</h2>
            <div><?= $clients ?></div>
        </a>

        <a href="view_data.php?type=departments" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Departments</h2>
            <div><?= $departments ?></div>
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <a href="view_data.php?type=jobs_applied" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Jobs Applied</h2>
            <div><?= $jobsApplied ?></div>
        </a>

        <a href="view_data.php?type=contacts" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Contact</h2>
            <div><?= $contactInfo ?></div>
        </a>
    </div>
</div>

</body>
</html>
