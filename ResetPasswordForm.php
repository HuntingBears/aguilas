<?php
$allowed_ops = "ResetPasswordForm";
require_once "./setup/config.php";
require_once "./libraries/Locale.inc.php";
require_once "./themes/$app_theme/header.php";
?>

<h2><?= _("Reset Password") ?></h2>

<p>
<?= _("Please complete the following form to automatically generate a new password for your user.") ?>
</p>

<form method='post' action='ResetPasswordMail.php'>
    <table>
        <tr>
            <td class="px160">
                <?= _("Username") ?>
            </td>
            <td class="px120">
                <?= _("e.g., Us3r") ?>
            </td>
            <td class="px640">
                <span id="uid_js">
                    <input type='text' name='uid' id='uid' class="input5" />
                    <span class="textfieldRequiredMsg">
<?= _("You cannot leave empty fields.") ?>
                    </span>
                    <span class="textfieldMaxCharsMsg">
<?= _("You exceeded the limit of 60 characters.") ?>
                    </span>
                    <span class="textfieldMinCharsMsg">
                        <?= _("Username must have at least 3 characters.") ?>
                    </span>
                </span>
            </td>
        </tr>
        <tr>
            <td class="px160">
                <?= _("E-Mail") ?>
            </td>
            <td class="px120">
                <?= _("e.g., user@email.com") ?>
            </td>
            <td class="px640">
                <span id="mail_js">
                    <input type='text' name='mail' id='mail' class="input5" />
                    <span class="textfieldRequiredMsg">
                        <?= _("You cannot leave empty fields.") ?>
                    </span>
                    <span class="textfieldMaxCharsMsg">
                        <?= _("You exceeded the limit of 60 characters.") ?>
                    </span>
                    <span class="textfieldInvalidFormatMsg">
                        <?= _("Invalid Format.") ?>
                    </span>
                </span>
            </td>
        </tr>
        <tr>
            <td class="px160">
                <?= _("Captcha") ?>
            </td>
            <td class="px120">
                <img alt="captcha" src="Captcha.inc.php" border="0" />
            </td>
            <td class="px640">
                <span id="image_captcha_js">
                    <input name='image_captcha' id='image_captcha' class="input5" />
                    <span class="textfieldRequiredMsg">
                        <?= _("You cannot leave empty fields.") ?>
                    </span>
                    <span class="textfieldMaxCharsMsg">
                        <?= _("You exceeded the limit of 8 characters.") ?>
                    </span>
                </span>
            </td>
        </tr>
    </table>
    <input type='submit' value="<?= _("SEND") ?>" class="boton" />
</form>
<script type="text/javascript">
var uid_var = new Spry.Widget.ValidationTextField("uid_js", "none", {validateOn:["blur"], maxChars:60});
var mail_var = new Spry.Widget.ValidationTextField("mail_js", "email", {validateOn:["blur"], maxChars:60});
var image_captcha_var = new Spry.Widget.ValidationTextField("image_captcha_js", "none", {validateOn:["blur"], maxChars:8});
</script>
<?php
require_once "./themes/$app_theme/footer.php";
?>
