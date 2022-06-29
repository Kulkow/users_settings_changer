<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование настройки</title>
</head>
<body>
<form method="post">
    <label for="email"></label>
    <input value="" id="email" name="email"/>
    <button>Save</button>
</form>
<?php if (!empty($result['providers']) && !empty($result['request_id'])): ?>
    <?php foreach ($result['providers'] as $provider): ?>
        <a href="/user_setting/send/<?php echo $result['request_id'] ?>/<?php echo $provider ?>">Подтвердить измениния
            по <?php echo $provider ?></a>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
