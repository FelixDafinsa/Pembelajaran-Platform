<?php
session_start();
// Periksa apakah pengguna sudah login, jika tidak, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil daftar tugas dari session (contoh sederhana, bisa disesuaikan dengan kebutuhan)
$tasks = isset($_SESSION['tasks']) ? $_SESSION['tasks'] : array();

// Fungsi untuk menandai tugas sebagai selesai
function completeTask($taskId) {
    global $tasks;
    foreach ($tasks as &$task) {
        if ($task['id'] == $taskId) {
            $task['completed'] = true;
            break;
        }
    }
    $_SESSION['tasks'] = $tasks;
}

// Fungsi untuk menghapus tugas
function deleteTask($taskId) {
    global $tasks;
    foreach ($tasks as $key => $task) {
        if ($task['id'] == $taskId) {
            unset($tasks[$key]);
            break;
        }
    }
    $_SESSION['tasks'] = $tasks;
}

// Fungsi untuk memperbarui tugas
function updateTask($taskId, $newTask) {
    global $tasks;
    foreach ($tasks as &$task) {
        if ($task['id'] == $taskId) {
            $task['task'] = $newTask;
            break;
        }
    }
    $_SESSION['tasks'] = $tasks;
}

// Proses form untuk menambahkan tugas
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'add':
            if (isset($_POST['task'])) {
                // Proses form untuk menambahkan tugas
                $task = $_POST['task'];
                $new_task = array('id' => uniqid(), 'task' => $task, 'completed' => false);
                $_SESSION['tasks'][] = $new_task;
            }
            break;
        case 'complete':
            if (isset($_POST['task_id'])) {
                // Proses form untuk menyelesaikan tugas
                $task_id = $_POST['task_id'];
                completeTask($task_id);
            }
            break;
        case 'delete':
            if (isset($_POST['task_id'])) {
                // Proses form untuk menghapus tugas
                $task_id = $_POST['task_id'];
                deleteTask($task_id);
            }
            break;
        case 'update':
            if (isset($_POST['task_id']) && isset($_POST['new_task'])) {
                // Proses form untuk memperbarui tugas
                $task_id = $_POST['task_id'];
                $new_task = $_POST['new_task'];
                updateTask($task_id, $new_task);
            }
            break;
    }
    // Redirect kembali ke halaman utama setelah memproses form
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Logout</a>
    <h2>To-Do List</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo $task['task']; ?>
                <?php if ($task['completed']): ?>
                    <span style="color: green;">(Completed)</span>
                <?php else: ?>
                    <form action="index.php" method="post" style="display: inline;">
                        <input type="hidden" name="action" value="complete">
                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                        <input type="submit" value="Complete">
                    </form>
                <?php endif; ?>
                <form action="index.php" method="post" style="display: inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                    <input type="submit" value="Delete">
                </form>
                <form action="index.php" method="post" style="display: inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                    <input type="text" name="new_task" value="<?php echo $task['task']; ?>">
                    <input type="submit" value="Update">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- Form untuk menambahkan tugas -->
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="task">Add Task:</label>
        <input type="text" name="task" id="task" required>
        <input type="submit" value="Add">
    </form>
</body>
</html>
