<style>
    .nav{
        list-style: ;
        margin: 3px;
        padding: 0 10px;
    }
    .nav > li{
        display: inline;
        margin: 0;
        padding: 2px 10px;
    }
</style>
<ul class="nav">
    <li><a href="<?=site_url('admin')?>">Dashboard</a></li>
    <li><a href="<?=site_url('admin/form/'.$_SESSION['login']['user_id'])?>">Profile</a></li>
    <li><a href="<?=site_url('set_course')?>">Course</a></li>
    <li><a href="<?=site_url('set_student')?>">Student</a></li>
    <li><a href="<?=site_url('set_instructur')?>">Instructur</a></li>
    <li><a href="<?=site_url('set_payment')?>">Payment</a></li>
    <li><a href="<?=site_url('admin/table')?>">Admin</a></li>
    <li><a href="<?=site_url('auth/logout')?>">Logout</a></li>
</ul>   

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