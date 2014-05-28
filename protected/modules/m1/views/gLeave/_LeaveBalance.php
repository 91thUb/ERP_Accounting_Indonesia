<div class="row">
    <div class="span5">
        <div class="well" style="text-align: center">
            <h3><?php echo $model->companyfirst->start_date ?></h3>
            <h6><font COLOR="#999">Join Date</font></h6>
        </div>
    </div>

    <div class="span4">
        <div class="well" style="text-align: center">
            <h3><?php echo (isset($model->leaveBalance)) ? $model->leaveBalance->balance : 0 ?></h3>
            <h6><font COLOR="#999">Balance</font></h6>
        </div>
    </div>

</div>
