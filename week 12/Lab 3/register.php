<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Register</h1>
    <form action="submit.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name">
            <?php if (!empty($errors['first_name'])): ?>
                <span class="error"><?= $errors['first_name'] ?></span>
            <?php endif; ?>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name">
            <?php if (!empty($errors['last_name'])): ?>
                <span class="error"><?= $errors['last_name'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <?php if (!empty($errors['email'])): ?>
                <span class="error"><?= $errors['email'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="country">Country:</label>
            <select id="country" name="country">
                <option value="">-- Select --</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="UK">UK</option>
                <option value="Australia">Australia</option>
            </select>
            <?php if (!empty($errors['country'])): ?>
                <span class="error"><?= $errors['country'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            <?php if (!empty($errors['gender'])): ?>
                <span class="error"><?= $errors['gender'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label>Skills:</label>
            <input type="checkbox" name="skills[]" value="HTML"> HTML
            <input type="checkbox" name="skills[]" value="CSS"> CSS
            <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript
            <input type="checkbox" name="skills[]" value="PHP"> PHP
            <?php if (!empty($errors['skills'])): ?>
                <span class="error"><?= $errors['skills'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <?php if (!empty($errors['username'])): ?>
                <span class="error"><?= $errors['username'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php if (!empty($errors['password'])): ?>
                <span class="error"><?= $errors['password'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="department">Department:</label>
            <input type="text" name="department" id="department" placeholder="Open Source">
            <?php if (!empty($errors['department'])): ?>
                <span class="error"><?= $errors['department'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="captcha">CAPTCHA:</label>
            <p><strong>Sh68So</strong></p>
            <input type="text" name="captcha" id="captcha" placeholder="Enter the code above">
            <?php if (!empty($errors['captcha'])): ?>
                <span class="error"><?= $errors['captcha'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group">
            <label for="images">Upload Images:</label>
            <input type="file" id="images" name="images[]" multiple >
            <?php if (!empty($errors['images'])): ?>
                <span class="error"><?= $errors['images'] ?></span>
            <?php endif; ?>
        </div>

        <div class="input-group-btn">
            <input type="submit" value="Register">
            <input type="reset" value="Reset">
        </div>
    </form>
</div>
</body>
</html>