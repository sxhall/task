<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>闰年</title>
    </head>
    <body>
        <form method="post" action="" onsubmit="return fullEmpty()">
            <input type="text" name="year" id="year" placeholder="输入年份" />
            <button type="submit" name="submit">点我判断是不是闰年</button>
        </form>
    </body>
    <script>
        var year = document.getElementById("year");

        //若输入为空，则不提交表单，弹出提示框
        function fullEmpty(){
            if(year.value.length < 1){
                alert("输入不能为空");
                return false;
            }
            return true;
        }
    </script>
    <?php
        //判断闰年函数
        function leap($year){
            if($year % 100 == 0){ //世纪年判断闰年
                if($year % 400 == 0 && $year % 3200 != 0){
                    echo "世纪年".$year."是闰年!";
                }else{
                    echo "世纪年".$year."不是闰年!";
                }
            }else{ //普通年判断闰年
                if($year % 4 == 0 && $year % 100 != 0){
                    echo "普通年".$year."是闰年！";
                }else{
                    echo "普通年".$year."不是闰年！";
                }
            }
        }

        //对输入的参数进行判断函数
        function pd($year){
                if(!is_numeric($year)) {
                    echo "年份必须是数字";
                } else {
                    $year = $year - 0; //比如：007 - 0 = 7;
                    if(!is_int($year)) {
                        echo "年份必须是整数";
                    } else if($year < 1) {
                        echo "年份必须大于0";
                    } else if($year > 9999) {
                        echo "年份不能超过四位数";
                    } else {
                        leap($year); //对符合的参数调用leap($year)函数进行闰年的判断
                    }
                }
            }

        //程序从这里开始
        if(isset($_POST["year"])) {
            $year = $_POST["year"];
            echo "<script>year.value = '{$year}';</script>";  //记忆输入的内容
            pd($year);
        }
        
    ?>
</html>