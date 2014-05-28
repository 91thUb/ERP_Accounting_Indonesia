<div class="row">
    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3><?php echo number_format(tAccount::getTotalAssets(Yii::app()->settings->get("System", "cCurrentPeriod")), 0, ",", ".") ?></h3>
                    <h6 align="center" ><font COLOR="#999">Total Activa/Passiva</font></h6></td>
            </tr>
        </table>
    </div>

    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3><?php echo number_format(tAccount::getTotalSalesHppExpense(Yii::app()->settings->get("System", "cCurrentPeriod"), 5), 0, ",", ".") ?></h3>
                    <h6 align="center" ><font COLOR="#999">Total Sales / Omzet</font></h6></td>
            </tr>
        </table>
    </div>

    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3><?php echo number_format(tAccount::netprofit(Yii::app()->settings->get("System", "cCurrentPeriod")), 0, ",", ".") ?></h3>
                    <h6 align="center" ><font COLOR="#999">Net Income</font></h6></td>
            </tr>
        </table>
    </div>

    <?php /*
      <div class="span2">
      <table width="100%">
      <tr bgcolor="EAEFFF">
      <td  align="center"><h3>.</h3>
      <h6 align="center" ><font COLOR="#999">Reserved</font></h6></td>
      </tr>
      </table>
      </div>
     */ ?>

</div>

<br/>

<div class="row">
    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3><?php echo number_format(tAccount::getTotalPerAccount(Yii::app()->settings->get("System", "cCurrentPeriod"), 2), 0, ",", ".") ?></h3>
                    <h6 align="center" ><font COLOR="#999">Total Aktiva Lancar</font></h6></td>
            </tr>
        </table>
    </div>

    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3><?php echo number_format(tAccount::getTotalPerAccount(Yii::app()->settings->get("System", "cCurrentPeriod"), 20), 0, ",", ".") ?></h3>
                    <h6 align="center" ><font COLOR="#999">Total Hutang Lancar</font></h6></td>
            </tr>
        </table>
    </div>

    <div class="span3">
        <table width="100%">
            <tr bgcolor="EAEFFF">
                <td  align="center"><h3><?php echo number_format(tAccount::getTotalPerAccount(Yii::app()->settings->get("System", "cCurrentPeriod"), 26), 0, ",", ".") ?></h3>
                    <h6 align="center" ><font COLOR="#999">Modal</font></h6></td>
            </tr>
        </table>
    </div>

    <?php /*
      <div class="span2">
      <table width="100%">
      <tr bgcolor="EAEFFF">
      <td  align="center"><h3>.</h3>
      <h6 align="center" ><font COLOR="#999">Reserved</font></h6></td>
      </tr>
      </table>
      </div>
     */ ?>

</div>

<br/>
