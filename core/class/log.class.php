<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../core/php/core.inc.php';
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Logger;

class log {
	/*     * *************************Attributs****************************** */
	private static $logger = array();
	/*     * ***********************Methode static*************************** */

	public static function getLogger($_log) {
		if (isset(self::$logger[$_log])) {
			return self::$logger[$_log];
		}
		$output = "[%datetime%][%channel%][%level_name%] : %message%\n";
		$formatter = new LineFormatter($output);
		self::$logger[$_log] = new Logger($_log);
		switch (config::byKey('log::engine')) {
			case 'StreamHandler':
				$handler = new StreamHandler(self::getPathToLog($_log), config::byKey('log::level'));
				break;
			case 'SyslogHandler':
				$handler = new SyslogHandler(config::byKey('log::level'));
				break;
			case 'SyslogUdp':
				$handler = new SyslogUdpHandler(config::byKey('log::syslogudphost'), config::byKey('log::syslogudpport'));
				break;
			default:
				$handler = new StreamHandler(self::getPathToLog($_log), config::byKey('log::level'));
				break;
		}
		$handler->setFormatter($formatter);
		self::$logger[$_log]->pushHandler($handler);
		return self::$logger[$_log];
	}

	/**
	 * Ajoute un message dans les log et fait en sorte qu'il n'y
	 * ai jamais plus de 1000 lignes
	 * @param string $_type type du message à mettre dans les log
	 * @param string $_message message à mettre dans les logs
	 */
	public static function add($_log, $_type, $_message, $_logicalId = '') {
		if (trim($_message) == '') {
			return;
		}
		$logger = self::getLogger($_log);
		switch (strtolower($_type)) {
			case 'debug':
				$logger->addDebug($_message);
				break;
			case 'info':
				$logger->addInfo($_message);
				break;
			case 'notice':
				$logger->addNotice($_message);
				break;
			case 'warning':
				$logger->addWarning($_message);
				break;
			case 'error':
				$logger->addError($_message);
				if (config::byKey('addMessageForErrorLog') == 1) {
					@message::add($_log, $_message, '', $_logicalId);
				}
				break;
			case 'alert':
				$logger->addAlert($_message);
				break;
		}
	}

	public static function chunk($_log = '') {
		if ($_log != '') {
			$path = self::getPathToLog($_log);
			if (is_file($path)) {
				self::chunkLog($path);
			}
			return;
		}
		$logs = ls(dirname(__FILE__) . '/../../log/', '*');
		foreach ($logs as $log) {
			$path = dirname(__FILE__) . '/../../log/' . $log;
			if (is_file($path)) {
				self::chunkLog($path);
			}
		}
		$logs = ls(dirname(__FILE__) . '/../../log/scenarioLog', '*');
		foreach ($logs as $log) {
			$path = dirname(__FILE__) . '/../../log/scenarioLog/' . $log;
			if (is_file($path)) {
				self::chunkLog($path);
			}
		}
	}

	public static function chunkLog($_path) {
		if (strpos($_path, '.htaccess') !== false) {
			return;
		}
		$maxLineLog = config::byKey('maxLineLog');
		if ($maxLineLog < 200) {
			$maxLineLog = 200;
		}
		shell_exec('sudo chmod 777 ' . $_path . ' ;echo "$(tail -n ' . $maxLineLog . ' ' . $_path . ')" > ' . $_path);
		@chown($_path, 'www-data');
		@chgrp($_path, 'www-data');
		@chmod($_path, 0777);
	}

	public static function getPathToLog($_log = 'core') {
		return dirname(__FILE__) . '/../../log/' . $_log;
	}

	/**
	 * Vide le fichier de log
	 */
	public static function clear($_log) {
		if (config::byKey('log::engine') != 'StreamHandler') {
			return;
		}
		if (strpos($_log, '.htaccess') !== false) {
			return;
		}
		$path = self::getPathToLog($_log);
		if (!file_exists($path) || !is_file($path)) {
			return;
		}
		shell_exec('sudo chmod 777 ' . $path . ';cat /dev/null > ' . $path);
		return true;
	}

	/**
	 * Vide le fichier de log
	 */
	public static function remove($_log) {
		if (config::byKey('log::engine') != 'StreamHandler') {
			return;
		}
		$path = self::getPathToLog($_log);
		if (!file_exists($path) || !is_file($path)) {
			return;
		}
		if (strpos($_log, '.htaccess') !== false) {
			return;
		}
		if (strpos($_log, 'nginx.error') !== false || strpos($_log, 'http.error') !== false) {
			shell_exec('sudo chmod 777 ' . $path . ';cat /dev/null > ' . $path);
			return;
		}
		shell_exec('sudo chmod 777 ' . $path);
		unlink($path);
		return true;
	}

	public static function removeAll() {
		if (config::byKey('log::engine') != 'StreamHandler') {
			return;
		}
		$logs = ls(dirname(__FILE__) . '/../../log/', '*');
		foreach ($logs as $log) {
			$path = dirname(__FILE__) . '/../../log/' . $log;
			if (!file_exists($path) || !is_file($path)) {
				continue;
			}
			if (strpos($log, '.htaccess') !== false) {
				continue;
			}
			if (strpos($log, 'nginx.error') !== false || strpos($log, 'http.error') !== false) {
				shell_exec('sudo chmod 777 ' . $path . ';cat /dev/null > ' . $path);
				continue;
			}
			shell_exec('sudo chmod 777 ' . $path);
			unlink($path);
		}
		$logs = ls(dirname(__FILE__) . '/../../log/scenarioLog', '*');
		foreach ($logs as $log) {
			$path = dirname(__FILE__) . '/../../log/scenarioLog/' . $log;
			if (!file_exists($path) || !is_file($path)) {
				continue;
			}
			if (strpos($log, '.htaccess') !== false) {
				continue;
			}
			if (strpos($log, 'nginx.error') !== false || strpos($log, 'http.error') !== false) {
				shell_exec('sudo chmod 777 ' . $path . ';cat /dev/null > ' . $path);
				continue;
			}
			shell_exec('sudo chmod 777 ' . $path);
			unlink($path);
		}
		return true;
	}

	/**
	 * Renvoi les x derniere ligne du fichier de log
	 * @param int $_maxLigne nombre de ligne voulu
	 * @return string Ligne du fichier de log
	 */
	public static function get($_log = 'core', $_begin, $_nbLines) {
		self::chunk($_log);
		$replace = array(
			'&gt;' => '>',
			'&apos;' => '',
		);
		$page = array();
		if (!file_exists($_log) || !is_file($_log)) {
			$path = self::getPathToLog($_log);
			if (!file_exists($path)) {
				return false;
			}
		} else {
			$path = $_log;
		}
		$log = new SplFileObject($path);
		if ($log) {
			$log->seek($_begin); //Seek to the begening of lines
			$linesRead = 0;
			while ($log->valid() && $linesRead != $_nbLines) {
				$line = trim($log->current()); //get current line
				if ($line != '') {
					array_unshift($page, $line);
				}
				$log->next(); //go to next line
				$linesRead++;
			}
		}
		return $page;
	}

	public static function liste() {
		if (config::byKey('log::engine') != 'StreamHandler') {
			return array();
		}
		$return = array();
		foreach (ls(dirname(__FILE__) . '/../../log/', '*') as $log) {
			if (!is_dir(dirname(__FILE__) . '/../../log/' . $log)) {
				$return[] = $log;
			}
		}
		return $return;
	}

	/*     * *********************Methode d'instance************************* */

	/*     * **********************Getteur Setteur*************************** */
}

?>
