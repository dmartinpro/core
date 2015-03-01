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

if (!isConnect('admin')) {
	throw new Exception('401 Unauthorized');
}
?>
<div class="alert alert-info">{{Vous devez activer tous les log de niveau event pour suivre en temps réel toute votre domotique}}</div>
<pre id='pre_eventlog' style='overflow: auto; height: 90%;with:90%;'></pre>


<script>
	jeedom.log.autoupdate({
		log : 'event',
		display : $('#pre_eventlog')
	});
</script>
