<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo APP_NAME; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
    
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>

	<!-- BLOQUE CON LA INFORMACIÓN SOBRE EL DEBUG -->
    <div class="debug-helper-box">
        DEBUG HELPER: <?php echo str_replace('%viewName%', $filename, $texts['view.location']); ?>
    </div>
    
    <div class='title-box'>
        <a href="<?php echo URL; ?>"><?php echo APP_NAME; ?></a>
    </div>

    <div class="header">
        <div class="header_left_box">
        <ul id="menu">
            <li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>"><?php echo $texts['index']; ?></a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>help"><?php echo $texts['help']; ?></a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "overview")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>overview"><?php echo $texts['overview']; ?></a>
            </li>
            <?php if (Session::get('user_logged_in') == true):?>
	            <li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
	                <a href="<?php echo URL; ?>dashboard"><?php echo $texts['dashboard']; ?></a>
	            </li>
	            <li <?php if ($this->checkForActiveController($filename, "note")) { echo ' class="active" '; } ?> >
	                <a href="<?php echo URL; ?>note"><?php echo $texts['my.notes']; ?></a>
	            </li>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile"><?php echo $texts['my.account']; ?></a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/changeaccounttype"><?php echo $texts['change.account']; ?></a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername"><?php echo $texts['edit.username']; ?></a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail"><?php echo $texts['edit.email']; ?></a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout"><?php echo $texts['logout']; ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <!-- for not logged in users -->
            <?php if (Session::get('user_logged_in') == false):?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index"><?php echo $texts['login']; ?></a>
                </li>
            <?php endif; ?>
        </ul>
        </div>

        <?php if (Session::get('user_logged_in') == true): ?>
            <div class="header_right_box">
                <div class="namebox">
                    <?php echo $texts['welcome'] . " " . Session::get('user_name'); ?> !
                </div>
            </div>
        <?php endif; ?>

        <div class="clear-both"></div>
    </div>
