<?php

// Echo out HTML directly from PHP. This HTML forms the structure for a new contact entry form.
echo "

    <form onsubmit='return false'>  
    <div class='controls row'>
            <button class='btn-back' onclick='go_back()'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>
            <h3>New Contact</h3>
    </div>  
    <table class='details'>
        <tr>
            <td class='detail-caption'>Full Name</td>
            <td class='detail-content'><input type='text' name='txt_full_name' id='txt_full_name'></td>
        </tr>
        <tr>
            <td class='detail-caption'>Email Address</td>
            <td class='detail-content'><input type='email' name='email_address' id='email_address'></td>
        </tr>
        <tr>
            <td class='detail-caption'>Mobile number</td>
            <td class='detail-content'><input type='text' name='txt_mobile_number' id='txt_mobile_number'></td>
        </tr>
        <tr>
            <td class='detail-caption'>Address</td>
            <td class='detail-content'>
            <textarea name='txt_address' id='txt_address' cols='30' rows='5'></textarea>
            </td>
        </tr>
    </table>

    <div class='controls'>
        <button onclick='clear_fields()'>Clear</button>
        <button onclick='save_contact()'>Save</button>
    </div>
    </form>

";

?>