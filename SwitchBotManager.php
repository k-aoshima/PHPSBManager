<?php

require 'httpControl.php';
$httpControl = httpControl::getInstance();
$getScene = $httpControl::GetSecene();
$bodyResult = $getScene['body'];

if(isset($bodyResult)){
    $keyList = array();
    $valueList = array();
    $seceneIdList = array();
    $count = 0;
    foreach($bodyResult as $key => $value){
        array_push($keyList, $key);
        array_push($valueList, $value['sceneName']);
        array_push($seceneIdList, $value['sceneId']);
    }
    $keyList = json_encode($keyList);
    $valueList = json_encode($valueList);
    $seceneIdList = json_encode($seceneIdList);
    echo '</pre>';
}else{
    echo 'シーン取得失敗';
    echo '<br>';
    echo '再読み込みを実行してください';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Design.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwitchBotForm</title>
</head>
<body>
    <!-- <a href="" class="original-button">ボタン</a> -->
    <script type="text/javascript">
        let sceneValue = <?php echo $valueList; ?>;
        let sceneKey = <?php echo $keyList; ?>;
        let sceneIdList = <?php echo $seceneIdList; ?>

        buttonAdd(sceneValue.length);
        function buttonAdd(addButtonCount){
            for(let i = 0; i < addButtonCount; i++){
                const sectionTag = document.createElement('section');
                document.body.appendChild(sectionTag);
                const aTag = document.createElement('a');
                aTag.className = 'original-button';
                aTag.href = "";
                aTag.innerHTML = sceneValue[i];
                aTag.addEventListener('click', {sceneKey: sceneKey[i], handleEvent: buttonClick});
                sectionTag.appendChild(aTag);

            }
        }

        function buttonClick(e){
            console.log(sceneIdList[this.sceneKey]);
            fetch('request.php', { // 第1引数に送り先
                method: 'POST', // メソッド指定
                headers: { 'Content-Type': 'application/json' }, // jsonを指定
                body: JSON.stringify(sceneIdList[this.sceneKey]) // json形式に変換して添付
            })
            .then(response => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
            .then(res => {
                alert(res); // 返ってきたデータ
            });
        }
    </script>
</body>
</html>