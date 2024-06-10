<?php
include('db_config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    #info {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ccc;
    }
</style>
</head>
<body>
    <header>
        <nav>
    <div class="header">
        <h1></h1>
        <div class="user-info">
            <?php if (isset($_SESSION['User_first_name'])) : ?>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['User_first_name']); ?>!</span>
                <ul>
                    <?php if (isset($_SESSION['User_permission']) && $_SESSION['User_permission'] == 1) : ?>
                        <!-- 使用者權限為1時顯示的選單 -->
                        <ul>
                            <li><a href="admin.php">管理首頁</a></li>
                            <li><a href="manage_locations.php">管理景點</a></li>
                            <li><a href="manage_trails.php">管理步道</a></li>
                            <li><a href="manage_users.php">管理使用者</a></li>
                            <li><a href="manage_departments.php">管理部門</a></li>
                        </ul>
                    <?php else : ?>
                        <!-- 其他使用者顯示的選單 -->
                        <ul>
                        <li><a href="index.php">首頁</a></li>
                        <li><a href="trails.php">步道地圖</a></li>
                        <li><a href="leaflet.php">林道地圖</a></li>   
                        <li><a href="news.php">最新消息</a></li>
                            <li><a href="weather.php">天氣預報</a></li>
                            <li><a href="note.php">筆記</a></li>
                            <li><a href="logout.php">登出</a></li>
                            <!-- 已登入時顯示的其他標籤 -->
                        </ul>
                    <?php endif; ?>
                    <li><a href="logout.php">登出</a></li>
                </ul>
            <?php else : ?>
                <ul>
                <li><a href="index.php">首頁</a></li>    
                <li><a href="trails.php">步道地圖</a></li>
                    <li><a href="leaflet.php">林道地圖</a></li>
                    <li><a href="news.php">最新消息</a></li>
                    <li><a href="weather.php">天氣預報</a></li>
                </ul>
                <a href="login.php">登入</a>
                <a href="register.php">註冊</a>
                <!-- 未登入時顯示的其他標籤 -->
            <?php endif; ?>
        </div>
        <li>
            <form method="GET" action="results.php">
                <input type="text" id="search" name="search" placeholder="輸入景點名稱或描述">
                <input type="submit" value="查詢">
            </form>
        </li>
    </div>
    </nav>
    </header>
</body>

</html>