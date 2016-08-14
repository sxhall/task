<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>闰年</title>
    </head>
    <body>
        <form method="post" action="">
            <input type="text" name="year" placeholder="输入年份" value="<?php
            //保存输入的值
            if(isset($_POST["year"])) {
                echo $_POST["year"];
            }?>">
            <button type="submit" name="submit">点我判断是不是闰年</button>
        </form>
    </body>
    <?php
        if(isset($_POST["year"])) {
            $year = $_POST["year"];
            if(!is_numeric($year)) {
                echo "年份必须是数字";
            } else {
                $year = $year - 0;
                if(!is_int($year)) {
                    echo "年份必须是整数";
                } else if($year < 1) {
                    echo "年份必须大于0";
                } else if($year > 9999) {
                    echo "年份不能超过四位数";
                } else {
                    //不是世纪年
                    if($year % 100) {
                        if($year % 4) {
                            echo "平年";
                        } else {
                            echo "闰年";
                        }
                    }
                    //世纪年
                    else {
                        if($year % 400) {
                            echo "平年";
                        } else {
                            if($year % 3200) {
                                echo "闰年";
                            } else {
                                echo "平年";
                            }
                        }
                    }
                }
            }
        }
    ?>
</html>