<?php
include('header.php');
?>
<?php
include 'db.php';

// 取得所有使用者資料
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

// 處理訊息
$message = $_GET['message'] ?? '';
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>管理使用者</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }

        th,
        td {
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>管理使用者</h1>
    <?php if ($message) : ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>操作</th>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Password</th>
                <th>Permission</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <form action="manage_users_process.php" method="post">
                            <td>
                                <input type="hidden" name="User_ID" value="<?= $row['User_ID'] ?>">
                                <button type="submit" name="update">更新</button>
                                <button type="submit" name="delete" onclick="return confirm('確定要刪除這個紀錄嗎?')">刪除</button>
                            </td>
                            <td><?= $row['User_ID'] ?></td>
                            <td><input type="text" name="User_first_name" value="<?= htmlspecialchars($row['User_first_name']) ?>"></td>
                            <td><input type="text" name="User_last_name" value="<?= htmlspecialchars($row['User_last_name']) ?>"></td>
                            <td><input type="text" name="User_gender" value="<?= htmlspecialchars($row['User_gender']) ?>"></td>
                            <td><input type="email" name="User_email" value="<?= htmlspecialchars($row['User_email']) ?>"></td>
                            <td><input type="date" name="User_birthday" value="<?= htmlspecialchars($row['User_birthday']) ?>"></td>
                            <td><input type="text" name="User_passwd" value="<?= htmlspecialchars($row['User_passwd']) ?>"></td>
                            <td><input type="text" name="User_permission" value="<?= htmlspecialchars($row['User_permission']) ?>"></td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">無資料</td>
                </tr>
            <?php endif; ?>
            <tr>
                <form action="manage_users_process.php" method="post">
                    <td><button type="submit" name="add">新增</button></td>
                    <td></td>
                    <td><input type="text" name="User_first_name" required></td>
                    <td><input type="text" name="User_last_name" required></td>
                    <td><input type="text" name="User_gender" required></td>
                    <td><input type="email" name="User_email" required></td>
                    <td><input type="date" name="User_birthday" required></td>
                    <td><input type="text" name="User_passwd" required></td>
                    <td><input type="text" name="User_permission" required></td>
                </form>
            </tr>
        </tbody>
    </table>
</body>

</html>