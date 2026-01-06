<?php
require_once '../core/Auth.php';

if (!Auth::isLoggedIn()) {
    header('Location: ../views/auth/login.php');
    exit;
}

$user = Auth::getUser();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Scrum System</title>
    <style>
        body { font-family: Arial; max-width: 1000px; margin: 0 auto; padding: 20px; }
        .header { background: #1f2937; color: white; padding: 20px; border-radius: 5px; margin-bottom: 30px; }
        .menu { background: #f3f4f6; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .menu a { margin-right: 15px; text-decoration: none; color: #2563eb; }
        .card { background: white; border: 1px solid #e5e7eb; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .logout { float: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Scrum Project Management</h1>
        <p>Welcome, <?php echo htmlspecialchars($user['name']); ?> (<?php echo $user['role']; ?>)</p>
        <a class="logout" href="logout.php">Logout</a>
    </div>
    
    <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="../views/projects/index.php">Projects</a>
        <a href="../views/tasks/index.php">Tasks</a>
        <a href="../views/auth/profile.php">Profile</a>
        <?php if ($user['role'] === 'admin'): ?>
            <a href="../views/admin/index.php">Admin</a>
        <?php endif; ?>
    </div>
    
    <div class="card">
        <h2>Quick Stats</h2>
        <p>Your role: <strong><?php echo $user['role']; ?></strong></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    </div>
    
    <div class="card">
        <h2>What's Next?</h2>
        <ul>
            <li>Create a new project (Project Managers & Admins)</li>
            <li>View your assigned tasks</li>
            <li>Check project progress</li>
            <li>Update your profile</li>
        </ul>
    </div>
    
    <div class="card">
        <h2>System Status</h2>
        <p>✅ Authentication System: Working</p>
        <p>⏳ Project Management: Coming soon</p>
        <p>⏳ Task Management: Coming soon</p>
        <p>⏳ Notifications: Coming soon</p>
    </div>
</body>
</html>