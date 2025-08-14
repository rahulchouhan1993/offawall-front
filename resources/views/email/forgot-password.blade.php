<table align="center" cellspacing="0" cellpedding="0" style="background-color: #151515; border:1px solid #f2f2f2; width: 100%; max-width: 400px; font-family: Arial, Helvetica, sans-serif;" width="100%">
    <tr>
        <td style="background-color: #151515; padding:30px 0 0 0" bgcolor="#151515">
            <table cellspacing="0" cellpedding="0" width="100%">
                <tr>
                    <td style="text-align: center; padding:0 0 30px 0" align="center">
                        <a href="#">
                            <img src="https://offawall.com/images/logo.png" alt="">
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td style="padding: 25px 25px 25px 25px;">
            <table cellspacing="0" cellpedding="0" width="100%">
                <tr>
                    <td style="padding: 0 0 20px 0;">
                        <p style="margin: 1px; font-size: 14px; color: #ffffff;">Hi {{ $user['name'] ?? '' }},</p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0 0 20px 0;">
                        <p style="margin: 1px; font-size: 14px; color: #ffffff;">We’ve generated a temporary password for your account to help you sign in securely.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>


    <tr>
        <td style="padding:20px 20px 20px 20px; background-color: #000;" bgcolor="#2E4D91">
            <table cellspacing="0" cellpedding="0" width="100%">
                <tr>
                    <td style="padding: 0 0 20px 0; max-width: 150px;">
                        <p style="margin: 1px; font-size: 14px; color: #4ef953;">Temporary Password:</p>
                    </td>

                    <td style="padding: 0 0 20px 0">
                        <p style="margin: 1px; font-size: 14px; color: #ffffff;">{{$newPassword}}</p>
                    </td>
                </tr>

               

            </table>
        </td>
    </tr>



    <tr>
        <td style="padding: 25px 25px 25px 25px;">
            <table cellspacing="0" cellpedding="0" width="100%">
               


                <tr>
                    <td style="padding: 0 0 20px 0;">
                        <p style="margin: 1px; font-size: 14px; color: #ffffff;">Please use the above password to log in to your account. For your security, we recommend changing this password immediately after logging in.</p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0 0 20px 0;">
                        <p style="margin: 1px; font-size: 14px; color: #ffffff;">Warm regards, <br> <span style="color:4ef953; padding-top:8px;display: block;">Offawall Team</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="border-top:1px solid #ffffff33; padding:10px 10px 0 0">
                        <table cellspacing="0" cellpedding="0" width="100%" >
                            <tr>
                                <td align="center" style="text-align: center;">
                                    <p style="margin: 1px; font-size: 12px; color: #ffffff;">Copyright 2025 © All Right Reserved.</p>
                                    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>


</table>