<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Inoki Shaw"/>
        <meta name="keywords" content="Lego;Robot;Creation;Shanghai University"/>
        <meta name="description" content="Shanghai University Creation Club Official Website"/>

        <title>上海大学创幻社</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
            require_once("./ui/header.php");
        ?>
        <div class="container" role="main">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>联系方式</h2></div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>项目</th>
                                    <th></th>
                                    <th>注释</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    require_once("./api/database.php");
    $result = $database->query("SELECT * FROM contact WHERE lang = 0");
    while ($row = mysql_fetch_array($result)){
        echo "<tr>\n";
        echo "  <td>".$row["name"]."</td>";
        echo "  <td>".$row["value"]."</td>";
        echo "  <td>".$row["note"]."</td>";
        echo "</tr>\n";
    }
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
    