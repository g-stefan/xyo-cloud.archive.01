<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if ($this->isError("error")) {
    $msg_lang = "error_unknown";
    $msg_txt = "";
    $err = $this->getError("error");
    if ($err) {
        if (is_array($err)) {
            reset($err);
            $msg_lang = key($err);
            $msg_txt = current($err);
        } else {
            $msg_lang = $err;
        }
    }
?>
    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td style="border:1px solid #800000;background-color:#FFE0E0;width:auto;margin:8px 8px 8px 8px;padding:8px 8px 8px 8px;">
                    <img src="<?php echo $this->pathBase; ?>media/sys/images/process-stop-32.png"
                         alt="<?php $this->eLanguage("alt_error"); ?>"
                         style="width:32px;height:32px;float:left;margin-right:8px;"
                         />
                    <span style="color:#800000;font-weight:bold;font-size:16px;"><?php $this->eLanguage($msg_lang); ?></span><br/>
                    <span style="color:#000040;font-weight:bold;font-size:12px;"><?php echo $msg_txt; ?></span><br/>
                    <div style="height:1px;overflow:hidden;width:320px;clear:both;" ></div>
                </td>
        </tbody>
    </table>
<?php
};

