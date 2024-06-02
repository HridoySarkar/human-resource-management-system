<?php

include("scripts/db_connection.php");


$job_id = $_GET['job_id'];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Apply for Job</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-5">Apply for Job</h2>
        <form action="scripts/submit_job_application.php" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded shadow-md">
            <input type="hidden" name="job_id" value="<?= $job_id ?>">
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Gender</label>
                <select name="gender" class="w-full border border-gray-300 p-2 rounded" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="No Mention">No Mention</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Address</label>
                <textarea name="address" class="w-full border border-gray-300 p-2 rounded" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Salary Expectation</label>
                <input type="text" name="salary_expectation" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Upload CV (PDF only)</label>
                <input type="file" name="cv" accept="application/pdf" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Submit Application</button>
        </form>
    </div>
</body>

</html>