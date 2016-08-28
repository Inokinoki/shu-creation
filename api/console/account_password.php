<?php
    require_once("level.php");
    $level = new LevelSystem(0, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
?>
<div class="page-header">
  <h3>修改密码</h3>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="password_form">
        <form>
            <div class="form-group">
                <label>旧密码：</label>
                <input name="old-password" id="old-password" type="password" class="form-control" placeholder="验证旧密码">
            </div>
            <div class="form-group">
                <label>新密码：</label>
                <input name="new-password" id="new-password" type="password" class="form-control" placeholder="输入新密码">
            </div>
            <div class="form-group">
                <label>确认密码：</label>
                <input name="confirm-password" id="confirm-password" type="password" class="form-control" placeholder="再次输入密码">
            </div>
        </form>
        <div id="wrong-tip"></div>
        <button class="btn btn-danger" id="comfirm-button" onclick="modifyPassword();">修改</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3>说明</h3>
            </div>
            <div class="panel-body">
                <p>在这里您可以修改您的账户在本网站的密码，
                但是我们不推荐您这么做，这会导致您在本网站的密码与上海大学统一认证系统密码不一致，
                可能会造成密码遗忘等后果。</p>
            </div>
        </div>
    </div>
</div>
<?php
    } else {
        require_once("no_permission.php");
    }
?>