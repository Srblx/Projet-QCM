<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="profile-nav col-md-3">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="./Content/img/logo.png" alt="">
                    </a>
                    <h1>
                        <?= $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>
                    </h1>
                </div>

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><i class="fa fa-user"></i> Profile</li>
                </ul>
            </div>
        </div>
        <div class="profile-info col-md-9">
            <div class="panel">
                <div class="bio-graph-heading">
                    <b> Retrouvez ici tout le nombres de quizz que vous avez réalisé. </b>
                </div>
                <div class="panel-body bio-graph-info">
                    <h1 class="titre_profil_utilisateur"><b>Profil Utilisateur :</b></h1>
                    <div class="row" id="tableau_profil_info">
                        <div class="bio-row">
                            <p><span><b>Nom :</b></span>
                                <?= $_SESSION['nom']; ?>
                            </p>
                        </div>
                        <div class="bio-row">
                            <p><span><b>Prenom :</b></span>
                                <?= $_SESSION['prenom']; ?>
                            </p>
                        </div>
                        <div class="bio-row">
                            <p><span><b>Pseudo :</b></span>
                                <?= $_SESSION['pseudo']; ?>
                            </p>
                        </div>
                        <div class="bio-row">
                            <p><span><b>Email :</b></span>
                                <?= $_SESSION['mail']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container_information_quizz">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body d-flex align-items-center justify-content-center">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100"
                                            height="100px">

                                        </canvas><input class="knob" data-width="100" data-height="100"
                                            data-displayprevious="true" data-thickness=".2"
                                            value="<?= $questionnaire_user_html[0]->total ?>" data-fgcolor="#ec7c12"
                                            data-bgcolor="#e8e8e8"
                                            style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: #ec7c12; padding: 0px; -webkit-appearance: none; background: none;">
                                    </div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="red text-center">Quizz HTLM </h4>

                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body d-flex align-items-center justify-content-center">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100"
                                            height="100px"></canvas><input class="knob" data-width="100"
                                            data-height="100" data-displayprevious="true" data-thickness=".2"
                                            value="<?= $questionnaire_user_css[0]->total ?>" data-fgcolor="#4691e2"
                                            data-bgcolor="#e8e8e8"
                                            style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color:#4691e2; padding: 0px; -webkit-appearance: none; background: none;">
                                    </div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="terques text-center">Quizz CSS </h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body d-flex align-items-center justify-content-center">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100"
                                            height="100px"></canvas><input class="knob" data-width="100"
                                            data-height="100" data-displayprevious="true" data-thickness=".2"
                                            value="<?= $questionnaire_user_js[0]->total ?>" data-fgcolor="#f6da0c"
                                            data-bgcolor="#e8e8e8"
                                            style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: #f6da0c; padding: 0px; -webkit-appearance: none; background: none;">
                                    </div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="green text-center">Quizz JavaScript</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-body d-flex align-items-center justify-content-center">
                                <div class="bio-chart">
                                    <div style="display:inline;width:100px;height:100px;"><canvas width="100"
                                            height="100px"></canvas><input class="knob" data-width="100"
                                            data-height="100" data-displayprevious="true" data-thickness=".2"
                                            value="<?= $questionnaire_user_php[0]->total ?>" data-fgcolor="#30537c"
                                            data-bgcolor="#e8e8e8"
                                            style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: #30537c; padding: 0px; -webkit-appearance: none; background: none;">
                                    </div>
                                </div>
                                <div class="bio-desk">
                                    <h4 class="purple text-center">Quizz PHP</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>