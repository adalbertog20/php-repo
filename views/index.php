<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Home Page
    <hr />
    <div>
        <?php if (!empty($invoice)): ?>
            Invoice ID:
            <?= $invoice['id'] ?> <br />
            Invoice Amount:
            <?= $invoice['amount'] ?> <br />
            User:
            <?= $invoice['full_name'] ?> <br />
        <?php endif ?>
    </div>
</body>

</html>