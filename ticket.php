<?php
$link = mysqli_connect("localhost", 'root', '','ticket');
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>ticket</title>
    <style>
table, th, td {
    border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
  text-align: center;
}
</style>
</head>
<body>
    <div class="input-wrap">
        <form action="ticket.php" method="POST">
        고객성명 <input type="text" name="users" />
        <input type="submit" name="Submit" value="합계"/> 
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>구분</th>
                        <th colspan="2">어린이</th>
                        <th colspan="2">어른</th>
                        <th>비고</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>입장권</td>
                        <td>7.000</td>
                        <td>
                        <p><select name="ChildEntrance">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>10.000</td>
                        <td> <p><select name="AdultEntrance">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>입장</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BIG3</td>
                        <td>12.000</td>
                        <td> <p><select name="ChildBIG">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>16.000</td>
                        <td> <p><select name="AdultBIG">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>입장+놀이3종</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>자유이용권</td>
                        <td>21.000</td>
                        <td> <p><select name="ChildFreePass">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>26.000</td>
                        <td> <p><select name="AdultFreePass">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>입장+놀이자유</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>연간이용권</td>
                        <td>70.000</td>
                        <td> <p><select name="ChildAnnualPass">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>90.000</td>
                        <td> <p><select name="AdultAnnualPass">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </p></td>
                        <td>입장+놀이자유</td>
                    </tr>
                </tbody>
            </table>
       </form> 
       <div id="result"></div>

       <?php
    date_default_timezone_set('Asia/Seoul');
    $time_now = date("Y년 m월 d일 ");
    if (date("A") == "오후") {
        $time_now .= "오후";
    } else {
        $time_now .= "오전";
    }
    $time_now .= date(" g:i");
    echo $time_now;
    ?>
       <?php 
       if (!empty($_POST)) {
        $users = $_POST['users'];
        $ChildEntrance = $_POST['ChildEntrance'];
        $AdultEntrance = $_POST['AdultEntrance'];
        $ChildBIG = $_POST['ChildBIG'];
        $AdultBIG = $_POST['AdultBIG'];
        $ChildFreePass = $_POST['ChildFreePass'];
        $AdultFreePass = $_POST['AdultFreePass'];
        $ChildAnnualPass = $_POST['ChildAnnualPass'];
        $AdultAnnualPass = $_POST['AdultAnnualPass'];
       $TotalCount = ($ChildEntrance + $AdultEntrance + $ChildBIG + $AdultBIG + $ChildFreePass + $AdultFreePass + $ChildAnnualPass + $AdultAnnualPass);
       $sql=" INSERT INTO  `users` ".    
                            "(`users` , `ChildEntrance` , `AdultEntrance` , `ChildBIG` , `AdultBIG` , `ChildFreePass` , `AdultFreePass` , `ChildAnnualPass` , `AdultAnnualPass` , `TotalCount` )".
                            "VALUES ('$users','$ChildEntrance',  '$AdultEntrance',  '$ChildBIG',  '$AdultBIG',  '$ChildFreePass',  '$AdultFreePass',  '$ChildAnnualPass',  '$AdultAnnualPass')";
                            $query_result = mysqli_query($link, $sql);
    
                            echo "<br>{$users} 고객님 감사합니다.<br>";
                            if ($ChildEntrance > 0) {
                                echo "어린이 입장권 {$ChildEntrance}매<br>";
                            }
                            if ($AdultEntrance > 0) {
                                echo "어른 입장권 {$AdultEntrance}매<br>";
                            }
                            if ($ChildBIG > 0) {
                                echo "어린이 BIG3 {$ChildBIG}매<br>";
                            }
                            if ($AdultBIG > 0) {
                                echo "어른 BIG3 {$AdultBIG}매<br>";
                            }
                            if ($ChildFreePass > 0) {
                                echo "어린이 자유이용권 {$ChildFreePass}매<br>";
                            }
                            if ($AdultFreePass > 0) {
                                echo "어른 자유이용권 {$AdultFreePass}매<br>";
                            }
                            if ($ChildAnnualPass > 0) {
                                echo "어린이 연간이용권 {$ChildAnnualPass}매<br>";
                            }
                            if ($AdultAnnualPass > 0) {
                                echo "어른 연간이용권 {$AdultAnnualPass}매<br>";
                            }
                            echo "합계 {$TotalCount}매 입니다.";
    }
                mysqli_close($link);
          ?>

    </div>
</body>
</html>
