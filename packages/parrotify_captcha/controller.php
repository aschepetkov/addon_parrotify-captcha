<?php     defined('C5_EXECUTE') or die(_("Access Denied."));

class ParrotifyCaptchaPackage extends Package {
    protected $pkgHandle = 'parrotify_captcha';
    protected $appVersionRequired = '5.5';
    protected $pkgVersion = '1.0';

    public function getPackageName() {
        return t('Parrotify Captcha');
    }

    public function getPackageDescription() {
        return t('Protect your site from spam and earn money with Parrotify captcha plugin');
    }

    public function install() {
        $pkg = parent::install();

        Loader::model('system/captcha/library');
        SystemCaptchaLibrary::add('parrotify_captcha', t('Parrotify Captcha'), $pkg);

    }

	public function uninstall() {
        Loader::model('system/captcha/library');
        $activeCaptcha = SystemCaptchaLibrary::getActive();

        if (($activeCaptcha) && ($activeCaptcha->getSystemCaptchaLibraryHandle() == 'parrotify_captcha')) {
            $dbs = Loader::db();
            $dbs->Execute('update SystemCaptchaLibraries set sclIsActive=1 where sclHandle = ?', 'securimage');
        }

        parent::uninstall();
	}
}
?>