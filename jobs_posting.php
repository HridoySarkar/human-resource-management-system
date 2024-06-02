<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Job Posting</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <div class="columns-3"></div>
        <div class="columns-6">
            <h2 class="text-2xl font-bold mb-5">Post a New Job</h2>

            <form action="scripts/job_posting.php" method="post" class="bg-white p-8 rounded shadow-md">
                <div class="mb-4">
                    <label class="block text-gray-700">Position Name</label>
                    <input type="text" name="position_name" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Vacancy</label>
                    <input type="number" name="vacancy" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Deadline</label>
                    <input type="date" name="deadline" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Years of Experience</label>
                    <input type="number" name="experience_years" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Location</label>
                    <input type="text" name="location" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Salary Range</label>
                    <input type="text" name="salary_range" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Job Type</label>
                    <select name="job_type" class="w-full border border-gray-300 p-2 rounded" required>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Intern">Intern</option>
                        <option value="Contractual">Contractual</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Qualifications</label>
                    <textarea name="qualifications" class="w-full border border-gray-300 p-2 rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Benefits</label>
                    <textarea name="benefits" class="w-full border border-gray-300 p-2 rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Educational Requirement</label>
                    <textarea name="education_requirement" class="w-full border border-gray-300 p-2 rounded" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Post Job</button>
            </form>
        </div>
        <div class="columns-3"></div>
    </div>


</body>

</html>