<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <style>
        /* CSS Styles */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            margin-bottom: 100px;
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            text-align: center;
            color: #333;
        }

        .profile-container p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .profile-container strong {
            font-weight: bold;
            color: #333;
        }

        .profile-container a {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .profile-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>Profile Information</h2>
    <p><strong>First Name: Nampally</strong> <?= $user['fname'] ?></p>
    <p><strong>Last Name: Akhila</strong> <?= $user['lname'] ?></p>
    <p><strong>Email: akhilanampally954@gmail.com</strong> <?= $user['email'] ?></p>
    <!--add more fields here -->
</div>

</body>
</html>

