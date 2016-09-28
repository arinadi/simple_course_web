<h1>LOGIN STUDENT</h1>
<? if(isset($_SESSION['notice'])){ //Cek Notice Session
    //Looping Notice
    foreach($_SESSION['notice'] as $notice){
        ?>
            <? if(isset($notice['title'])){?>
            <hr>
                <strong><?=$notice['title']?></strong><br>
            <?}?>
            <?=$notice['msg']?>
        <hr>
    <?}
}
//Hapus Notice
unset($_SESSION['notice'])
?>
<form action="<?=site_url('auth/student')?>" method="post" accept-charset="utf-8">
    <input type="text" name="identity" autofocus="" maxlength="100" required="Harus diisi"placeholder="Email">
    <input type="password" name="password" placeholder="Password" required="Harus diisi">
    <button type="submit">Login</button>
</form>