<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->e($title); ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <?=$this->section('css')?>
</head>
<body>
    <div id="header">
        <?=$this->insert('partials/header')?>
    </div>
    <div class="container">
        <?=$this->section('content')?>
    </div>

    <script src="app.js"></script>
    <?=$this->section('scripts')?>

</body>
</html>