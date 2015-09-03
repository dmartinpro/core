<?php
header('Content-type: text/cache-manifest');
require_once dirname(__FILE__) . "/core/php/core.inc.php";

$js_file = array(
	'3rdparty/highstock/highcharts-more.js',
	'3rdparty/highstock/highstock.js',
	'3rdparty/highstock/themes/dark-blue.js',
	'3rdparty/highstock/themes/dark-green.js',
	'3rdparty/highstock/themes/dark-unica.js',
	'3rdparty/highstock/themes/gray.js',
	'3rdparty/highstock/themes/grid-light.js',
	'3rdparty/highstock/themes/grid.js',
	'3rdparty/highstock/themes/sand-signika.js',
	'3rdparty/highstock/themes/skies.js',
	'3rdparty/jquery/jquery.min.js',
	'3rdparty/jquery.mobile/jquery.mobile.min.js',
	'3rdparty/jquery.mobile/nativedroid2.js',
	'3rdparty/wow/wow.min.js',
	'3rdparty/waves/waves.min.js',
	'3rdparty/jquery.utils/jquery.utils.js',
	'3rdparty/jquery.ui/jquery-ui.min.js',
	'core/js/cmd.class.js',
	'core/js/private.class.js',
	'core/js/core.js',
	'core/js/eqLogic.class.js',
	'core/js/user.class.js',
	'core/js/history.class.js',
	'core/js/config.class.js',
	'core/js/jeedom.class.js',
	'core/js/object.class.js',
	'core/js/plugin.class.js',
	'core/js/view.class.js',
	'core/js/message.class.js',
	'core/js/scenario.class.js',
	'core/js/plan.class.js',
	'3rdparty/jquery.packery/jquery.packery.js',
	//'3rdparty/responsivevoices/responsivevoices.js',
);
if (file_exists(dirname(__FILE__) . '/mobile/custom/custom.js')) {
	$js_file[] = 'mobile/custom/custom.js';
}

$other_file = array(
	'core/php/icon.inc.php',
	'3rdparty/jquery.mobile/css/font-awesome.min.css',
	'3rdparty/jquery.mobile/jquery.mobile.min.css',
	'3rdparty/jquery.mobile/css/nativedroid2.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.amber.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.blue.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.blue-grey.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.cyan.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.deep-orange.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.deep-purple.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.grey.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.indigo.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.light-blue.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.light-green.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.lime.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.orange.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.pink.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.purple.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.red.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.teal.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.yellow.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.brown.css',
	'3rdparty/jquery.mobile/css/nativedroid2.color.green.css',
	'3rdparty/jquery.mobile/css/fonts.css',
	'3rdparty/jquery.mobile/css/flexboxgrid.min.css',
	'3rdparty/jquery.mobile/css/material-design-iconic-font.min.css',
	'3rdparty/waves/waves.min.css',
	'core/css/core.css',
	'3rdparty/jquery.utils/jquery.utils.css',
	'mobile/css/commun.css',
	'3rdparty/jquery.mobile/css/fonts/roboto/Roboto-Regular-webfont.woff',
	'3rdparty/font-awesome/fonts/fontawesome-webfont.woff2?v=4.4.0',
	'3rdparty/font-awesome/css/font-awesome.min.css',
	'3rdparty/jquery.mobile/images/ajax-loader.gif',
	'3rdparty/jquery.mobile/css/fonts/roboto/Roboto-Thin-webfont.woff',
	'3rdparty/jquery.mobile/css/fonts/roboto/Roboto-Light-webfont.woff',
	'core/img/logo-jeedom-petit-nom-couleur-128x128.png',
	'core/img/logo-jeedom-sans-nom-couleur-25x25.png',
	'3rdparty/jquery.mobile/css/fonts/fontawesome-webfont.woff2?v=4.3.0',
	'//fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic',
	'//fonts.gstatic.com/s/robotodraft/v4/0xES5Sl_v6oyT7dAKuoni44P5ICox8Kq3LLUNMylGO4.woff2',
	'//fonts.gstatic.com/s/robotodraft/v4/u0_CMoUf3y3-4Ss4ci-VwbBojE9J5UnpMtv5N3zfxwk.woff2',
	'//fonts.googleapis.com/css?family=Roboto:400,300,500,400italic,700,900',
	'//fonts.gstatic.com/s/robotodraft/v4/u0_CMoUf3y3-4Ss4ci-VwYlIZu-HDpmDIZMigmsroc4.woff2',
);
if (file_exists(dirname(__FILE__) . '/mobile/custom/custom.css')) {
	$other_file[] = 'mobile/custom/custom.css';
}

$root_dir = dirname(__FILE__) . '/core/css/icon/';
foreach (ls($root_dir, '*') as $dir) {
	if (is_dir($root_dir . $dir) && file_exists($root_dir . $dir . '/style.css')) {
		$other_file[] = 'core/css/icon/' . $dir . 'style.css';
		foreach (ls($root_dir . $dir . '/fonts', '*') as $font) {
			$other_file[] = 'core/css/icon/' . $dir . 'fonts/' . $font;
		}
	}
}
?>
CACHE MANIFEST

CACHE:
/socket.io/socket.io.js?1.2.1
<?php
foreach (plugin::listPlugin(true) as $plugin) {
	foreach (ls(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/core/template/mobile', '*') as $file) {
		if (is_dir(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/core/template/mobile/' . $file)) {
			foreach (ls(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/core/template/mobile/' . $file, '*') as $file2) {
				if (strpos($file2, '.js') !== false) {
					$js_file[] = 'plugins/' . $plugin->getId() . '/core/template/mobile/' . $file . $file2;
				} elseif (strpos($file2, '.css') !== false || strpos($file2, '.png') !== false || strpos($file2, '.jpg') !== false) {
					$other_file[] = 'plugins/' . $plugin->getId() . '/core/template/mobile/' . $file . $file2;
				}
			}
		} elseif (strpos($file, '.js') !== false) {
			$js_file[] = 'plugins/' . $plugin->getId() . '/core/template/mobile/' . $file;
		} elseif (strpos($file, '.css' || strpos($file, '.png') !== false || strpos($file, '.jpg') !== false) !== false) {
			$other_file[] = 'plugins/' . $plugin->getId() . '/core/template/mobile/' . $file;
		}
	}
	if ($plugin->getMobile() != '') {
		if (file_exists(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/doc/images/' . $plugin->getId() . '_icon.png')) {
			$other_file[] = 'plugins/' . $plugin->getId() . '/doc/images/' . $plugin->getId() . '_icon.png';
		}
		if (method_exists($plugin->getId(), 'mobileManifest')) {
			$plugin_id = $plugin->getId();
			try {
				$plugin_id::mobileManifest();
			} catch (Exception $e) {
				log::add($plugin_id, 'error', __('Erreur sur la fonction mobileManifest du plugin : ', __FILE__) . $e->getMessage());
			}
		}
		foreach (ls(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/mobile/js', '*.js') as $file) {
			echo "\n";
			if (file_exists(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/mobile/js/' . $file)) {
				echo '#' . md5_file(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/mobile/js/' . $file);
				echo "\n";
			}
			echo 'core/php/getJS.php?file=plugins/' . $plugin->getId() . '/mobile/js/' . $file . "\n";
		}
		foreach (ls(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/mobile/html', '*.html') as $file) {
			echo "\n";
			if (file_exists(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/mobile/html/' . $file)) {
				echo '#' . md5_file(dirname(__FILE__) . '/plugins/' . $plugin->getId() . '/mobile/html/' . $file);
				echo "\n";
			}
			echo 'index.php?v=m&ajax=1&p=' . substr($file, 0, -5) . '&m=' . $plugin->getId() . "\n";
		}
	}
}

foreach ($js_file as $file) {
	echo "\n";
	if (file_exists(dirname(__FILE__) . '/' . $file)) {
		echo '#' . md5_file(dirname(__FILE__) . '/' . $file);
		echo "\n";
	}
	echo 'core/php/getJS.php?file=' . $file;
	echo "\n";
	echo 'core/php/getJS.php?file=' . $file . '&md5=' . md5_file(dirname(__FILE__) . '/' . $file);
	echo "\n";
}
foreach ($other_file as $file) {
	echo "\n";
	if (file_exists(dirname(__FILE__) . '/' . $file)) {
		echo '#' . md5_file(dirname(__FILE__) . '/' . $file);
		echo "\n";
	}
	echo $file;
	echo "\n";
}
foreach (ls('mobile/js', '*.js') as $file) {
	echo "\n";
	if (file_exists(dirname(__FILE__) . '/mobile/js/' . $file)) {
		echo '#' . md5_file(dirname(__FILE__) . '/mobile/js/' . $file);
		echo "\n";
	}
	echo 'core/php/getJS.php?file=mobile/js/' . $file;
	echo "\n";
}
foreach (ls('mobile/html', '*.html') as $file) {
	echo "\n";
	if (file_exists(dirname(__FILE__) . '/mobile/html/' . $file)) {
		echo '#' . md5_file(dirname(__FILE__) . '/mobile/html/' . $file);
		echo "\n";
	}
	echo 'index.php?v=m&ajax=1&p=' . substr($file, 0, -5);
	echo "\n";
}

?>

NETWORK:
*

FALLBACK:
/ mobile/html/fallback.html
