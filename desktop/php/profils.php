<?php
if (!isConnect()) {
	throw new Exception('{{Error 401 Unauthorized');
}

$notifyTheme = array(
	'info' => '{{Bleu}}',
	'error' => '{{Rouge}}',
	'success' => '{{Vert}}',
	'warning' => '{{Jaune}}',
);

$homePage = array(
	'core::dashboard' => '{{Dashboard}}',
	'core::view' => '{{Vue}}',
	'core::plan' => '{{Design}}',
);
foreach (plugin::listPlugin() as $pluginList) {
	if ($pluginList->isActive() == 1 && $pluginList->getDisplay() != '') {
		$homePage[$pluginList->getId() . '::' . $pluginList->getDisplay()] = $pluginList->getName();
	}
}
?>
<legend>{{Profil}}</legend>

<div class="panel-group" id="accordionConfiguration">
    <input style="display: none;" class="userAttr form-control" data-l1key="id" />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionConfiguration" href="#config_themes">
                    Thèmes
                </a>
            </h3>
        </div>
        <div id="config_themes" class="panel-collapse collapse in">
            <div class="panel-body">
                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{Desktop}}</label>
                            <div class="col-sm-2">
                                <select class="userAttr form-control" data-l1key="options" data-l2key="bootstrap_theme">
                                    <option value="">Défaut</option>
                                    <option value="bootable">Bootable</option>
                                    <option value="cerulean">Cerulean</option>
                                    <option value="cosmo">Cosmo</option>
                                    <option value="cyborg">Cyborg</option>
                                    <option value="darkly">Darkly</option>
                                    <option value="flatly">Faltly</option>
                                    <option value="journal">Journal</option>
                                    <option value="lumen">Lumen</option>
                                    <option value="paper">Paper</option>
                                    <option value="readable">Readable</option>
                                    <option value="sandstone">Sandstone</option>
                                    <option value="simplex">Simplex</option>
                                    <option value="spacelab">Spacelab</option>
                                    <option value="superhero">Superhero</option>
                                    <option value="slate">Slate</option>
                                    <option value="united">United</option>
                                    <option value="yeti">Yeti</option>
                                </select>
                            </div>
                            <div class="col-sm-7" id="div_imgThemeDesktop" style="height: 450px;">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{Mobile couleur}}</label>
                            <div class="col-sm-2">
                                <select class="userAttr form-control" data-l1key="options" data-l2key="mobile_theme_color">
                                    <option value="amber">Ambre</option>
                                    <option value="blue">Bleu</option>
                                    <option value="blue-grey">Bleu-gris</option>
                                    <option value="brown">Marron</option>
                                    <option value="cyan">Cyan</option>
                                    <option value="deep-orange">Orange foncé</option>
                                    <option value="deep-purple">Violet foncé</option>
                                    <option value="green">Vert</option>
                                    <option value="grey">Gris</option>
                                    <option value="indigo">Indigo</option>
                                    <option value="light-blue">Bleu clair</option>
                                    <option value="light-green">Vert clair</option>
                                    <option value="lime">Citron</option>
                                    <option value="orange">Orange</option>
                                    <option value="pink">Rose</option>
                                    <option value="purple">Violet</option>
                                    <option value="red">Rouge</option>
                                    <option value="teal">Bleu-vert foncé</option>
                                    <option value="yellow">Jaune</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{Graphique Desktop}}</label>
                            <div class="col-sm-2">
                                <select class="userAttr form-control" data-l1key="options" data-l2key="desktop_highcharts_theme">
                                    <option value="">Défaut</option>
                                    <option value="dark-blue">Dark-blue</option>
                                    <option value="dark-green">Dark-green</option>
                                    <option value="dark-unica">Dark-unica</option>
                                    <option value="gray">Gray</option>
                                    <option value="grid-light">Grid-light</option>
                                    <option value="grid">Grid</option>
                                    <option value="sand-signika">Sand-signika</option>
                                    <option value="skies">Skies</option>
                                </select>
                            </div>
                            <label class="col-sm-3 control-label">{{Graphique mobile}}</label>
                            <div class="col-sm-2">
                                <select class="userAttr form-control" data-l1key="options" data-l2key="mobile_highcharts_theme">
                                    <option value="">Défaut</option>
                                    <option value="dark-blue">Dark-blue</option>
                                    <option value="dark-green">Dark-green</option>
                                    <option value="dark-unica">Dark-unica</option>
                                    <option value="gray">Gray</option>
                                    <option value="grid-light">Grid-light</option>
                                    <option value="grid">Grid</option>
                                    <option value="sand-signika">Sand-signika</option>
                                    <option value="skies">Skies</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionConfiguration" href="#config_interface">
                    Interface
                </a>
            </h3>
        </div>
        <div id="config_interface" class="panel-collapse collapse">
            <div class="panel-body">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>{{Général}}</legend>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{Masquer les menus automatiquement}}</label>
                            <div class="col-sm-1">
                                <input type="checkbox" class="userAttr bootstrapSwitch" data-on-color="danger" data-off-color="success" data-off-text="Oui" data-on-text="Non" data-l1key="options" data-l2key="doNotAutoHideMenu"/>
                            </div>
                        </div>


                        <legend>Page par défaut</legend>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{Desktop}}</label>
                            <div class="col-sm-2">
                                <select class="userAttr form-control" data-l1key="options" data-l2key="homePage">
                                    <?php
foreach ($homePage as $key => $value) {
	echo "<option value='$key'>$value</option>";
}
?>
                               </select>
                           </div>
                           <label class="col-sm-1 control-label">{{Mobile}}</label>
                           <div class="col-sm-2">
                            <select class="userAttr form-control" data-l1key="options" data-l2key="homePageMobile">
                                <option value="home">{{Accueil}}</option>
                                <?php
foreach ($homePage as $key => $value) {
	echo "<option value='$key'>$value</option>";
}
?>
                           </select>
                       </div>
                   </div>
                   <legend>{{Objet par défaut sur le dashboard}}</legend>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">{{Desktop}}</label>
                    <div class="col-sm-2">
                        <select class="userAttr form-control" data-l1key="options" data-l2key="defaultDashboardObject">
                            <?php
foreach (object::all() as $object) {
	echo "<option value='" . $object->getId() . "'>" . $object->getName() . "</option>";
}
?>
                       </select>
                   </div>
                   <label class="col-sm-1 control-label">{{Mobile}}</label>
                   <div class="col-sm-2">
                    <select class="userAttr form-control" data-l1key="options" data-l2key="defaultMobileObject">
                        <?php
foreach (object::all() as $object) {
	echo "<option value='" . $object->getId() . "'>" . $object->getName() . "</option>";
}
?>
                   </select>
               </div>
           </div>
           <legend>{{Vue par défaut}}</legend>
           <div class="form-group">
            <label class="col-sm-3 control-label">{{Desktop}}</label>
            <div class="col-sm-2">
                <select class="userAttr form-control" data-l1key="options" data-l2key="defaultDesktopView">
                    <?php
foreach (view::all() as $view) {
	echo "<option value='" . $view->getId() . "'>" . $view->getName() . "</option>";
}
?>
               </select>
           </div>
           <label class="col-sm-1 control-label">{{Mobile}}</label>
           <div class="col-sm-2">
            <select class="userAttr form-control" data-l1key="options" data-l2key="defaultMobileView">
                <?php
foreach (view::all() as $view) {
	echo "<option value='" . $view->getId() . "'>" . $view->getName() . "</option>";
}
?>
           </select>
       </div>
   </div>
   <legend>{{Design par défaut}}</legend>
   <div class="form-group">
    <label class="col-sm-3 control-label">{{Desktop}}</label>
    <div class="col-sm-2">
        <select class="userAttr form-control" data-l1key="options" data-l2key="defaultDashboardPlan">
            <?php
foreach (planHeader::all() as $plan) {
	echo "<option value='" . $plan->getId() . "'>" . $plan->getName() . "</option>";
}
?>
       </select>
   </div>
   <label class="col-sm-1 control-label">{{Mobile}}</label>
   <div class="col-sm-2">
    <select class="userAttr form-control" data-l1key="options" data-l2key="defaultMobilePlan">
        <?php
foreach (planHeader::all() as $plan) {
	echo "<option value='" . $plan->getId() . "'>" . $plan->getName() . "</option>";
}
?>
   </select>
</div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">{{Plein écran}}</label>
    <div class="col-sm-1">
        <input type="checkbox" class="userAttr bootstrapSwitch" data-l1key="options" data-l2key="defaultPlanFullScreen" />
    </div>
</div>

<legend>{{Dashboard}}</legend>
<div class="form-group">
    <label class="col-sm-3 control-label">{{Déplier le panneau des scénarios}}</label>
    <div class="col-sm-1">
        <input type="checkbox" class="userAttr bootstrapSwitch" data-l1key="options" data-l2key="displayScenarioByDefault"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">{{Déplier le panneau des objets}}</label>
    <div class="col-sm-1">
        <input type="checkbox" class="userAttr bootstrapSwitch" data-l1key="options" data-l2key="displayObjetByDefault"/>
    </div>
</div>
<legend>{{Vue}}</legend>
<div class="form-group">
    <label class="col-sm-3 control-label">{{Déplier le panneau des vues}}</label>
    <div class="col-sm-1">
        <input type="checkbox" class="userAttr bootstrapSwitch" data-l1key="options" data-l2key="displayViewByDefault"/>
    </div>
</div>
</fieldset>
</form>
</div>
</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionConfiguration" href="#config_notification">
                {{Notifications}}
            </a>
        </h3>
    </div>
    <div id="config_notification" class="panel-collapse collapse">
        <div class="panel-body">
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{Notifier des évènements}}</label>
                        <div class="col-sm-3">
                            <select class="userAttr form-control" data-l1key="options" data-l2key="notifyEvent">
                                <?php
foreach ($notifyTheme as $key => $value) {
	echo "<option value='$key'>$value</option>";
}
?>
                           </select>
                       </div>
                   </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">{{Notifier nouveau message}}</label>
                    <div class="col-sm-3">
                        <select class="userAttr form-control" data-l1key="options" data-l2key="notifyNewMessage">
                            <?php
foreach ($notifyTheme as $key => $value) {
	echo "<option value='$key'>$value</option>";
}
?>
                       </select>
                   </div>
               </div>
           </fieldset>
       </form>
   </div>
</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionConfiguration" href="#config_other">
                {{Autre}}
            </a>
        </h3>
    </div>
    <div id="config_other" class="panel-collapse collapse">
        <div class="panel-body">
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-lg-2 col-md-3 col-sm-4 col-xs-6 control-label">{{Mot de passe}}</label>
                        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
                            <input type="password" class="userAttr form-control" data-l1key="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-md-3 col-sm-4 col-xs-6 control-label">{{Retapez le mot de passe}}</label>
                        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
                            <input type="password" class="form-control" id="in_passwordCheck" />
                        </div>
                    </div>
                    <div class="form-group expertModeVisible">
                        <label class="col-lg-2 col-md-3 col-sm-4 col-xs-6 control-label">{{Clef API}}</label>
                        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
                            <span class="label label-info userAttr" style="font-size : 1em;" data-l1key="hash" ></span>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-3">
                            <a class="btn btn-default form-control" id="bt_genUserKeyAPI"><i class="fa fa-refresh"></i> {{Générer}}</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<br/>
<div class="form-actions">
    <a class="btn btn-success" id="bt_saveProfils"><i class="fa fa-check-circle icon-white"></i> {{Sauvegarder}}</a>
</div>
</div>
<?php include_file("desktop", "profils", "js");?>