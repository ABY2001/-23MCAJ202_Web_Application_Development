<?php
// Initialize variables
$name = $email = $password = $confirm_password = $phone = "";
$name_err = $email_err = $password_err = $confirm_password_err = $phone_err = "";
$success_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Name is required.";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // Validate Password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Password is required.";
    } elseif (strlen($_POST["password"]) < 6) {
        $password_err = "Password must be at least 6 characters.";
    } else {
        $password = $_POST["password"];
    }

    // Confirm Password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } elseif ($_POST["confirm_password"] !== $_POST["password"]) {
        $confirm_password_err = "Passwords do not match.";
    } else {
        $confirm_password = $_POST["confirm_password"];
    }

    // If no errors, process registration
    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Normally, you would store these values in a database
        $success_message = "Registration successful!";
        // Reset form fields
        $name = $email = $password = $confirm_password = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f5f7fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
        }

        .error {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.25rem;
            display: block;
        }

        .success-message {
            color: #28a745;
            text-align: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            background: #d4edda;
            border-radius: 5px;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        .success-message.hidden {
            opacity: 0;
            height: 0;
            margin: 0;
            padding: 0;
        }

        input[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        
        <?php if (!empty($success_message)): ?>
            <p class="success-message" id="successMessage"><?= $success_message ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
                <span class="error"><?= $name_err ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
                <span class="error"><?= $email_err ?></span>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="error"><?= $password_err ?></span>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <span class="error"><?= $confirm_password_err ?></span>
            </div>

            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>

    <?php if (!empty($success_message)): ?>
    <script>
        // Hide success message after 3 seconds
        setTimeout(() => {
            const message = document.getElementById('successMessage');
            message.classList.add('hidden');
            // Reset form
            document.querySelector('form').reset();
        }, 3000);
    </script>
    <?php endif; ?>
</body>
</html>