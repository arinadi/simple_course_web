<h1>LOGIN ADMIN</h1>
<? if(isset($_SESSION['notice'])){ //Cek Notice Session
    //Looping Notice
    foreach($_SESSION['notice'] as $notice){
        ?>
        <hr>
        <? if(isset($notice['title'])){?>
                <strong><?=$notice['title']?></strong><br>
            <?}?>
            <?=$notice['msg']?>
        <hr>
    <?}
}
//Hapus Notice
unset($_SESSION['notice'])
?>
<form action="<?=site_url('auth/admin')?>" method="post" accept-charset="utf-8">
    <input type="text" name="identity" autofocus="" maxlength="20" required="Harus diisi" placeholder="Username">
    <input type="password" name="password" placeholder="Password" required="Harus diisi">
    <button type="submit">Login</button>
</form>