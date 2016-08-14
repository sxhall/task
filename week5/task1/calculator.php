<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>计算器</title>
    <link rel="stylesheet" type="text/css" href="./calculator.css">
</head>
<body>
    <div class="input-box" id="input-box">
            <!-- 提交表单的时候先执行fullEmpty();这个方法,如果这个方法返回的是false则将不提交表单 -->
            <form method="post" action="" onsubmit="return fullEmpty();">
                <h3>PHP版简单计算器</h3>
                <input type="text" name="a" id="a">
                <select name="oprt" id="oprt">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                    <option value="%">%</option>
                </select>
                <input type="text" name="b" id="b">
                <button type="submit" name="submit">计算</button>
            </form>
    </div>
    <div class="result" id="result"></div>
</body>
<script src="./calculator.js"></script>
<?php
    if(isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["oprt"])) {
        $a = $_POST["a"]; //第一个参加运算的数
        $b = $_POST["b"]; //第二个参加运算的数
        $oprt = $_POST["oprt"]; //运算符

        function yunsuan($a, $b, $oprt){
            // $a = $_POST["a"]; //第一个参加运算的数
            // $b = $_POST["b"]; //第二个参加运算的数
            // $oprt = $_POST["oprt"]; //运算符
            $r = ""; //运算结果

            //输入框记忆功能
            echo "<script>".
                "a.value = '{$a}';".
                "b.value = '{$b}';".
                "oprt.value = '{$oprt}';".
                "</script>";

            if (!is_numeric($a) || !is_numeric($b)) {
                $r = "运算符两边必须是数字";
            } else {
                $a = $a - 0; //把小数点可以省略的0去掉
                $b = $b - 0;

                switch($oprt) {
                    case "+":
                        $r = $a + $b;
                        break;

                    case "-":
                        $r = $a - $b;
                        break;

                    case "*":
                        $r = $a * $b;
                        break;

                    case "/":
                        if($b == 0) {
                            $r = "除数不能为0";
                        } else {
                            $r = $a / $b;
                            $r = round($r, 2);
                        }
                        break;

                    case "%":
                        if(!is_int($a) || !is_int($b)) {
                            $r = "求余运算符两边必须是整数";
                        } else if($b == 0) {
                            $r = "除数不能为0";
                        } else {
                            $r = $a % $b;
                        }
                        break;

                    default:
                        break;
                }
            }

            //如果运算结果是数字,说明输入正常,否则提示输入错误信息
            if(is_numeric($r)) {
                echo "<script>result.innerHTML = '{$a} {$oprt} {$b} = {$r}';</script>";
            } else {
                echo "<script>result.innerHTML = '{$r}';</script>";
            }
        }

        yunsuan($a, $b, $oprt);
    }
?>
</html>























