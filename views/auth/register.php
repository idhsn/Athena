<!DOCTYPE html>
<html>
<head>
    <title>Register - Scrum System</title>
    <style>
        body { font-family: Arial; max-width: 400px; margin: 50px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { background: #10b981; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        .success { color: green; margin-bottom: 15px; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h2>Create Account</h2>
    
    <?php if (isset($_GET['success'])): ?>
        <div class="success">Account created! <a href="login.php">Login here</a></div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="error">Registration failed. Try again.</div>
    <?php endif; ?>
    
    <form method="POST" action="/Athena/AI/scrum_project/public/register.php">
        <div class="form-group">
            <label>Full Name:</label>
            <input type="text" name="full_name" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required minlength="6">
        </div>
        <div class="form-group">
            <label>Role:</label>
            <select name="role">
                <option value="team_member">Team Member</option>
                <option value="project_manager">Project Manager</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit">Register</button>
    </form>
    
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>