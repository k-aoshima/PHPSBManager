SwitchBotManager
====
SwitchBotを活用したWebアプリケーションです。
<br>SwitchBotの利用規約は以下に基づきます。</br>
https://www.switchbot.jp/pages/terms-of-service

## Description
赤外線家電を一括管理できる"SwitchBotハブミニ"という商品を制御することができるアプリです。SwitchBotはスマートフォンアプリでの操作のみが対象のため、PCからも家電を操作できるようにアプリを作成しました。ブラウザからの操作はもちろん、RaspberryPiに構築したDBに保管しているため自宅のWi-fiに接続したスマホやタブレットからの操作が可能になっています。

システムの構成は以下画像の通りです。自宅のraspberryPiにサーバーを構築し、ソースをアップします。

![SBSystemImg](https://user-images.githubusercontent.com/66909211/179437214-27be3753-7d95-41f9-ab89-54bf207fd0f6.png)

## Demo
SwitchBotに登録されているデータを元にボタンを動的に生成、ボタンを押下することで、SwitchBotの機能を実行します。

![SwitchBotApp_detail](https://user-images.githubusercontent.com/66909211/179437225-d80c4326-8df4-4224-8fd5-83fa69872129.png)

## Licence

[MIT](https://github.com/tcnksm/tool/blob/master/LICENCE)
