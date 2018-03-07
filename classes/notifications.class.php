<?php

/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 12/01/2018
 * Time: 06:04 AM
 */
class Notification
{

    public function sendEmail($userlogin, $msg,$subject){
        $uname = trim($userlogin);
        $subject = $subject;
        $headers_info = "From:erp@p2pfinance.com \r\n";
        $headers_info .= "Reply-To: noreply@p2pfinance.com \r\n";
        $headers_info .= "MIME-Version: 1.0\r\n";
        $headers_info .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $finalMsg = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="700" >
    <tr>
        <td align="center" bgcolor="#70bbd9" style="padding: 0 0 0 0;">
            <img src="http://test.p2pfinance.com/img/banner.png" alt="GTUC ERP" height="100"  style="display: block;" />
        </td>
    </tr>
    <tr>
        <td bgcolor="#f7efd4" style="padding: 10px;">';
        $finalMsg .= $msg;
        $finalMsg .= ' </td>
    </tr>
    <tr>
        <td bgcolor="#000033" style="padding: 0 0 0 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style=" margin-left: 5px;">
                <tr style="width: 100%;">
                <td style="padding-right: 5px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="color:#00CCFF">
                        </td>
                </tr>
                <tr>
                   <td style="color:#00CCFF"> Email:<a href="mailto: info@p2pfinance.com"> </a></td>
                </tr>
                </table>
                </td>
                <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="color:#00CCFF">Website:<a href="#"></a></td>
                </tr>
                <tr>
                    <td style="color:#00CCFF">
                         </td>
                 </tr>
                </table>
                </td>
                </tr>
            </table>
        </td>
   
    </tr>
</table>';
        $check = mail($uname, $subject, $finalMsg, $headers_info);

        $valuesArray['receiver'] = $userlogin;
        $valuesArray['msg'] = $msg;
        $table = "emaillog";
        $sql = MySQL::BuildSQLInsert($table,$valuesArray);
        $this->Query($sql);
        return $check;
    }
}