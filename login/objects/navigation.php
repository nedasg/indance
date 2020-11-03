<?php
if (isset($_SESSION['user_name'])) {
    switch ($_SESSION['user_name']) {
        case 'Aurimas Anužis':
            $img_url = 'images/aurimas.jpg';
            break;
        case 'Nedas Grigaliūnas':
            $img_url = 'images/nedas.jpg';
            break;
        case 'Elena Leonova':
            $img_url = 'images/elena.jpg';
            break;
        case 'Aira Anužė':
            $img_url = 'images/aira.jpg';
            break;
        default:
            break;
    }
}
?>
<div class="navigation">
    <ul>
        <?php if (isset($_SESSION['user_name'])): ?>
            <li><img class="user-icon" src="images/logo.png" title="Čia INDANCE!" alt="INDANCE Šokių Pramogos"></li>
            <li><a href="/login/currentregs.php">Currentregs</a></li>
            <li><a href="/login/editregs.php">Newreg</a></li>
            <li><a href="/login/logout.php">Logout</a></li>
            <li><img class="user-icon" src="<?php print $img_url; ?>" title="Čia tu!" alt="<?php print $_SESSION['user_name']; ?>"></li>
        <?php else: ?>
            <li><a href="/login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</div>