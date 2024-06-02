<?php

include("db_connection.php");

session_start();

$userId = $_SESSION['userId']; // Assuming the user ID is stored in session

// Fetch user data
$query = "
SELECT 
    e.name, e.username, e.password, e.dateOfJoining, e.status, 
    d.departmentName, d.headOfDepartment, 
    (e.baseSalary + s.bonuses - s.deductions) AS totalSalary
FROM Employee e
LEFT JOIN Salary s ON e.employeeId = s.employeeId
LEFT JOIN Department d ON e.departmentId = d.departmentId
WHERE e.employeeId =?;
";


$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId); // "i" indicates an integer parameter
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

// Update user data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $updateQuery = "
    UPDATE Employee 
    SET username =?, password =?
    WHERE employeeId =?;
    ";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssi", $username, $password, $userId); // "s" for string, "i" for integer
    $stmt->execute();

    // Refresh the data
    $stmt->execute([$userId]);
    $userData = $stmt->get_result()->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">User Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Personal Details Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Personal Details</h2>
                
                <form action="">
                    <p>Name: <?php echo htmlspecialchars($userData['name']);?></p>
                    <p>Username: <?php echo htmlspecialchars($userData['username']);?></p>
                    
                    <!-- Change the password -->
                    <div>
                         <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($userData['password']);?>" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                    </div>
                    &nbsp;
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Update</button>
                    </div>
                </form>

            </div>

            <!-- Department and Salary Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Department and Salary</h2>
                <p>Department: <?php echo htmlspecialchars($userData['departmentName']);?></p>
                <p>Head of Department: <?php echo htmlspecialchars($userData['headOfDepartment']);?></p>
                <p>Total Salary: <?php echo htmlspecialchars($userData['totalSalary']);?></p>
            </div>
            <!-- Active Status and Joining Date Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Active Status and Joining Date</h2>
                <p>Department: <?php echo htmlspecialchars($userData['departmentName']);?></p>
                <p>Active Status: <?php echo htmlspecialchars($userData['status']);?></p>
                <p>Joining Date: <?php echo htmlspecialchars($userData['dateOfJoining']);?></p>
            </div>
        </div>
        <!-- Leave Request Form -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Apply for Leave</h2>
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="from_date" class="block text-sm font-medium text-gray-700">From Date:</label>
                    <input type="date" id="from_date" name="from_date" required class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="to_date" class="block text-sm font-medium text-gray-700">To Date:</label>
                    <input type="date" id="to_date" name="to_date" required class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Reason:</label>
                    <textarea id="reason" name="reason" rows="4" required class="w-full mt-1 p-2 border border-gray-300 rounded-md"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Request</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


