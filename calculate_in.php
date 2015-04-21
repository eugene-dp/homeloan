
<?php
$amount=$_POST['lAmount'];
$interest=$_POST['Interest'];
$months=$_POST['Years'];
$months=$months*12;
?>
<table width="920" border="0" cellspacing="0" align="center" height="39">
  <tr>
    <td width="43"><span>No.</span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('Payment Number',110)";
onMouseout="hideddrivetip()" /></td>
    <td width="100"><span>PaymentDate</span></span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<srrong>Payment Date:</strong> This calculator assumes that the payments are made at the END of each period.',300)";
onMouseout="hideddrivetip()" /></td>
    <td width="100"><span>Interest Rate</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Current Annual Interest Rate:</strong><br>For a variable or adjustable-rate mortgages (ARM), this column indicates what the current annual interest rate is for each payment period.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="90"><span>InterestDue</span> </td>
    <td width="95"><span>PaymentDue</span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Payment:</strong><br> The required payment that includes both interest and principal.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="110"><span>ExtraPayments</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Extra Payments (Prepayments)</strong><br>(Assumes no penalties for making prepayments on the principal) <br><br>  The amounts in the Extra Payments column are based on the inputs chosen in the Extra Payments section above. To manually enter extra payments, use the Additional Payment column.<br> <br> The complication of the formula in this column comes from having to prevent overpaying on the last few payments. For example, if you normally make a sizable annual extra payment, the formula must make sure that your last annual payment isnt more than the balance due. If it is, then the extra payment is adjusted to bring the balance exactly to zero.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="135"><span>Additional Payment</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Additional Principal Payment</strong><br>(Assumes no penalties for making prepayments on the principal)<br><br>This column gives you complete flexibility in making additional payments. Use the Extra Payments to schedule regular extra payments. The Additional Payment column is for the occasional lump sum or irregularly scheduled prepayments.<br><br>You can enter a negative value here if you want to cancel a regularly scheduled extra payment. If you enter a negative value and you end up not paying the interest due, then your balance will increase, resulting in negative amortization (paying interest on interest).',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="90"><span>PrincipalPaid</span></td>
    <td width="110"><span>Balance</span></td>
    <td><span>Year</span></td>
  </tr>
</table>
<table width="930" border="0" cellspacing="0" align="left">

<?php
$CP=12;
$extraPayment=0;
$previousBalance=$amount;
for($i=1;$i<=$months;$i++)
{
$dueInterest=round(((pow((1+($interest/100)/12),(12/12)))-1)*$previousBalance,2);
$duePayment=$interest+($interest/pow((1+$interest),120)-1)*$amount;
?>

  <tr align="center" bgcolor="#f2f2f2">
    <td width="30"><?php echo $i; ?></td>
    <td width="70">11/30/2010</td>
    <td width="75"><?php echo $interest."%"; ?></td>
    <td width="70"><?php echo $dueInterest; ?></td>
    <td width="80"><?php echo $duePayment; ?></td>
    <td width="70">0.00</td>
    <td width="90">&nbsp;</td>
    <td width="50">401.46</td>
    <td width="90">1,293,090.19</td>
    <td width="30">&nbsp;</td>
  </tr>
  
<?php
}
?>
</table>
