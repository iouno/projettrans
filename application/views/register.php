<?php require "localization.php"; ?>
<h1><?php echo_("Inscription"); ?></h1>

<div class="content">
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
		<p><?php echo gettext("Veuillez renseigner tous les champs afin de valider votre inscription"); ?></p>
		<p>
			<label for="nom"><?php echo gettext("Nom"); ?></label><br />
			<input name="nom" type="text" id="nom"/><br />
			<?php if(isset($msg_erreur)): ?><strong><?php echo gettext($msg_erreur); ?></strong><?php endif; ?>
		</p>
		<p>
			<label for="mail"><?php echo gettext("E-mail"); ?></label><br />
			<input name="mail" type="email" id="mail"/><br />
			<em><strong>Attention : </strong> <?php echo gettext("vous ressevrez vos identifiants de connexion avec cet e-mail"); ?></em>
		</p>
		<p>
			<label><?php echo gettext("Pays"); ?></label><br />
			<select name="pays">
				<optgroup label=<?php echo gettext("Afrique"); ?>>
					<option value="afriqueDuSud"><?php echo gettext("Afrique Du Sud"); ?></option>
					<option value="algerie"><?php echo gettext("Alg&#233;rie"); ?></option>
					<option value="angola"><?php echo gettext("Angola");?></option>
					<option value="benin"><?php echo gettext("B&#233;nin");?></option>
					<option value="botswana"><?php echo gettext("Botswana");?></option>
					<option value="burkina"><?php echo gettext("Burkina");?></option>
					<option value="burundi"><?php echo gettext("Burundi");?></option>
					<option value="cameroun"><?php echo gettext("Cameroun");?></option>
					<option value="capVert"><?php echo gettext("Cap-Vert");?></option>
					<option value="republiqueCentre-Africaine"><?php echo gettext("R&#233;publique Centre-Africaine"); ?></option>
					<option value="comores"><?php echo gettext("Comores");?></option>
					<option value="republiqueDemocratiqueDuCongo"><?php echo gettext("R&#233;publique D&#233;mocratique Du Congo");?></option>
					<option value="congo"><?php echo gettext("Congo");?></option>
					<option value="coteIvoire"><?php echo gettext("C&#244;te d'Ivoire"); ?></option>
					<option value="djibouti"><?php echo gettext("Djibouti");?></option>
					<option value="egypte"><?php echo gettext("&#201;gypte"); ?></option>
					<option value="ethiopie"><?php echo gettext("&#201;thiopie");?></option>
					<option value="erythrée"><?php echo gettext("&#201;rythr&#233;e");?></option>
					<option value="gabon"><?php echo gettext("Gabon"); ?></option>
					<option value="gambie"><?php echo gettext("Gambie"); ?></option>
					<option value="ghana"><?php echo gettext("Ghana"); ?></option>
					<option value="guinee"><?php echo gettext("Guin&#233;e"); ?></option>
					<option value="guinee-Bisseau"><?php echo gettext("Guin&#233;e-Bisseau"); ?></option>
					<option value="guineeEquatoriale"><?php echo gettext("Guin&#233;e &#201;quatoriale"); ?></option>
					<option value="kenya"><?php echo gettext("Kenya"); ?></option>
					<option value="lesotho"><?php echo gettext("Lesotho"); ?></option>
					<option value="liberia"><?php echo gettext("Liberia"); ?></option>
					<option value="libye"><?php echo gettext("Libye"); ?></option>
					<option value="madagascar"><?php echo gettext("Madagascar"); ?></option>
					<option value="malawi"><?php echo gettext("Malawi"); ?></option>
					<option value="mali"><?php echo gettext("Mali"); ?></option>
					<option value="maroc"><?php echo gettext("Maroc"); ?></option>
					<option value="maurice"><?php echo gettext("Maurice"); ?></option>
					<option value="mauritanie"><?php echo gettext("Mauritanie"); ?></option>
					<option value="mozambique"><?php echo gettext("Mozambique"); ?></option>
					<option value="namibie"><?php echo gettext("Namibie"); ?></option>
					<option value="niger"><?php echo gettext("Niger"); ?></option>
					<option value="nigeria"><?php echo gettext("Nigeria"); ?></option>
					<option value="ouganda"><?php echo gettext("Ouganda"); ?></option>
					<option value="rwanda"><?php echo gettext("Rwanda"); ?></option>
					<option value="saoTomeEtPrincipe"><?php echo gettext("Sao Tom&#233;-et-Principe"); ?></option>
					<option value="senegal"><?php echo gettext("S&#233;n&#233;gal"); ?></option>
					<option value="seychelles"><?php echo gettext("Seychelles"); ?></option>
					<option value="sierra"><?php echo gettext("Sierra"); ?></option>
					<option value="somalie"><?php echo gettext("Somalie"); ?></option>
					<option value="soudan"><?php echo gettext("Soudan"); ?></option>
					<option value="swaziland"><?php echo gettext("Swaziland"); ?></option>
					<option value="tanzanie"><?php echo gettext("Tanzanie"); ?></option>
					<option value="tchad"><?php echo gettext("Tchad"); ?></option>
					<option value="togo"><?php echo gettext("Togo"); ?></option>
					<option value="tunisie"><?php echo gettext("Tunisie"); ?></option>
					<option value="zambie"><?php echo gettext("Zambie"); ?></option>
					<option value="zimbabwe"><?php echo gettext("Zimbabwe"); ?></option>
				</optgroup>
				<optgroup label=<?php echo gettext("Am&#233;rique");?>>
					<option value="antiguaEtBarbuda"><?php echo gettext("Antigua-et-Barbuda"); ?></option>
					<option value="argentine"><?php echo gettext("Argentine"); ?></option>
					<option value="bahamas"><?php echo gettext("Bahamas"); ?></option>
					<option value="barbade"><?php echo gettext("Barbade"); ?></option>
					<option value="belize"><?php echo gettext("Belize"); ?></option>
					<option value="bolivie"><?php echo gettext("Bolivie"); ?></option>
					<option value="bresil"><?php echo gettext("Br&#233;sil"); ?></option>
					<option value="canada"><?php echo gettext("Canada"); ?></option>
					<option value="chili"><?php echo gettext("Chili"); ?></option>
					<option value="colombie"><?php echo gettext("Colombie"); ?></option>
					<option value="costaRica"><?php echo gettext("Costa Rica"); ?></option>
					<option value="cuba"><?php echo gettext("Cuba"); ?></option>
					<option value="republiqueDominicaine"><?php echo gettext("R&#233;publique Dominicaine"); ?></option>
					<option value="dominique"><?php echo gettext("Dominique"); ?></option>
					<option value="equateur"><?php echo gettext("&#201;quateur"); ?></option>
					<option value="etatsUnis"><?php echo gettext("&#201;tats-Unis"); ?></option>
					<option value="grenade"><?php echo gettext("Grenade"); ?></option>
					<option value="guatemala"><?php echo gettext("Guatemala"); ?></option>
					<option value="guyana"><?php echo gettext("Guyana"); ?></option>
					<option value="haiti"><?php echo gettext("Ha&#239;ti"); ?></option>
					<option value="honduras"><?php echo gettext("Honduras"); ?></option>
					<option value="jamaique"><?php echo gettext("Jama&#239;que"); ?></option>
					<option value="mexique"><?php echo gettext("Mexique"); ?></option>
					<option value="nicaragua"><?php echo gettext("Nicaragua"); ?></option>
					<option value="panama"><?php echo gettext("Panama"); ?></option>
					<option value="paraguay"><?php echo gettext("Paraguay"); ?></option>
					<option value="perou"><?php echo gettext("P&#233;rou"); ?></option>
					<option value="saintCristopheEtNieves"><?php echo gettext("Saint-Cristophe-et-Ni&#233;v&#232;s"); ?></option>
					<option value="sainteLucie"><?php echo gettext("Sainte-Lucie"); ?></option>
					<option value="saintVincentEtLesGrenadines"><?php echo gettext("Saint-Vincent-et-les-Grenadines"); ?></option>
					<option value="salvador"><?php echo gettext("Salvador"); ?></option>
					<option value="suriname"><?php echo gettext("Suriname"); ?></option>
					<option value="triniteEtTobago"><?php echo gettext("Trinit&#233;-et-Tobago"); ?></option>
					<option value="uruguay"><?php echo gettext("Uruguay"); ?></option>
					<option value="venezuela"><?php echo gettext("Venezuela"); ?></option>
				</optgroup>
				<optgroup label=<?php echo gettext("Asie");?>>
					<option value="afghanistan"><?php echo gettext("Afghanistan"); ?></option>
					<option value="arabieSaoudite"><?php echo gettext("Arabie Saoudite"); ?></option>
					<option value="armenie"><?php echo gettext("Arm&#233;nie"); ?></option>
					<option value="azerbaidjan"><?php echo gettext("Azerba&#239;djan"); ?></option>
					<option value="bahrein"><?php echo gettext("Bahre&#239;n"); ?></option>
					<option value="bangladesh"><?php echo gettext("Bangladesh"); ?></option>
					<option value="bhoutan"><?php echo gettext("Bhoutan"); ?></option>
					<option value="birmanie"><?php echo gettext("Birmanie"); ?></option>
					<option value="brunei"><?php echo gettext("Brun&#233;i"); ?></option>
					<option value="cambodge"><?php echo gettext("Cambodge"); ?></option>
					<option value="chine"><?php echo gettext("Chine"); ?></option>
					<option value="coreeDuSud"><?php echo gettext("Cor&#233;e Du Sud"); ?></option>
					<option value="coreeDuNord"><?php echo gettext("Cor&#233;e Du Nord"); ?></option>
					<option value="emiratsArabeUnis"><?php echo gettext("&#201;mirats Arabe Unis"); ?></option>
					<option value="georgie"><?php echo gettext("G&#233;orgie"); ?></option>
					<option value="inde"><?php echo gettext("Inde"); ?></option>
					<option value="indonesie"><?php echo gettext("Indon&#233;sie"); ?></option>
					<option value="iraq"><?php echo gettext("Iraq"); ?></option>
					<option value="iran"><?php echo gettext("Iran"); ?></option>
					<option value="israel"><?php echo gettext("Isra&#235;l"); ?></option>
					<option value="japon"><?php echo gettext("Japon"); ?></option>
					<option value="jordanie"><?php echo gettext("Jordanie"); ?></option>
					<option value="kazakhstan"><?php echo gettext("Kazakhstan"); ?></option>
					<option value="kirghistan"><?php echo gettext("Kirghistan"); ?></option>
					<option value="koweit"><?php echo gettext("Kowe&#239;t"); ?></option>
					<option value="laos"><?php echo gettext("Laos"); ?></option>
					<option value="liban"><?php echo gettext("Liban"); ?></option>
					<option value="malaisie"><?php echo gettext("Malaisie"); ?></option>
					<option value="maldives"><?php echo gettext("Maldives"); ?></option>
					<option value="mongolie"><?php echo gettext("Mongolie"); ?></option>
					<option value="nepal"><?php echo gettext("N&#233;pal"); ?></option>
					<option value="oman"><?php echo gettext("Oman"); ?></option>
					<option value="ouzbekistan"><?php echo gettext("Ouzb&#233;kistan"); ?></option>
					<option value="pakistan"><?php echo gettext("Pakistan"); ?></option>
					<option value="philippines"><?php echo gettext("Philippines"); ?></option>
					<option value="qatar"><?php echo gettext("Qatar"); ?></option>
					<option value="singapour"><?php echo gettext("Singapour"); ?></option>
					<option value="sriLanka"><?php echo gettext("Sri Lanka"); ?></option>
					<option value="syrie"><?php echo gettext("Syrie"); ?></option>
					<option value="tadjikistan"><?php echo gettext("Tadjikistan"); ?></option>
					<option value="taiwan"><?php echo gettext("Ta&#239;wan"); ?></option>
					<option value="thailande"><?php echo gettext("Tha&#239;lande"); ?></option>
					<option value="timorOriental"><?php echo gettext("Timor oriental"); ?></option>
					<option value="turkmenistan"><?php echo gettext("Turkm&#233;nistan"); ?></option>
					<option value="turquie"><?php echo gettext("Turquie"); ?></option>
					<option value="vietNam"><?php echo gettext("Vi&#234;t Nam"); ?></option>
					<option value="yemen"><?php echo gettext("Yemen"); ?></option>
				</optgroup>
				<optgroup label=<?php echo gettext("Europe");?>>
					<option value="allemagne"><?php echo gettext("Allemagne"); ?></option>
					<option value="albanie"><?php echo gettext("Albanie"); ?></option>
					<option value="andorre"><?php echo gettext("Andorre"); ?></option>
					<option value="autriche"><?php echo gettext("Autriche"); ?></option>
					<option value="bielorussie"><?php echo gettext("Bi&#233;lorussie"); ?></option>
					<option value="belgique"><?php echo gettext("Belgique"); ?></option>
					<option value="bosnieHerzegovine"><?php echo gettext("Bosnie-Herz&#233;govine"); ?></option>
					<option value="bulgarie"><?php echo gettext("Bulgarie"); ?></option>
					<option value="croatie"><?php echo gettext("Croatie"); ?></option>
					<option value="danemark"><?php echo gettext("Danemark"); ?></option>
					<option value="espagne"><?php echo gettext("Espagne"); ?></option>
					<option value="estonie"><?php echo gettext("Estonie"); ?></option>
					<option value="finlande"><?php echo gettext("Finlande"); ?></option>
					<option value="france"><?php echo gettext("France"); ?></option>
					<option value="grece"><?php echo gettext("Gr&#232;ce"); ?></option>
					<option value="hongrie"><?php echo gettext("Hongrie"); ?></option>
					<option value="irlande"><?php echo gettext("Irlande"); ?></option>
					<option value="islande"><?php echo gettext("Islande"); ?></option>
					<option value="italie"><?php echo gettext("Italie"); ?></option>
					<option value="lettonie"><?php echo gettext("Lettonie"); ?></option>
					<option value="liechtenstein"><?php echo gettext("Liechtenstein"); ?></option>
					<option value="lituanie"><?php echo gettext("Lituanie"); ?></option>
					<option value="luxembourg"><?php echo gettext("Luxembourg"); ?></option>
					<option value="exRepubliqueYougoslaveDeMacedoine"><?php echo gettext("Ex-R&#233;publique Yougoslave de Mac&#233;doine"); ?></option>
					<option value="malte"><?php echo gettext("Malte"); ?></option>
					<option value="moldavie"><?php echo gettext("Moldavie"); ?></option>
					<option value="monaco"><?php echo gettext("Monaco"); ?></option>
					<option value="norvege"><?php echo gettext("Norv&#232;ge"); ?></option>
					<option value="paysBas"><?php echo gettext("Pays-Bas"); ?></option>
					<option value="pologne"><?php echo gettext("Pologne"); ?></option>
					<option value="portugal"><?php echo gettext("Portugal"); ?></option>
					<option value="roumanie"><?php echo gettext("Roumanie"); ?></option>
					<option value="royaumeUni"><?php echo gettext("Royaume-Uni"); ?></option>
					<option value="russie"><?php echo gettext("Russie"); ?></option>
					<option value="saintMarin"><?php echo gettext("Saint-Marin"); ?></option>
					<option value="serbieEtMontenegro"><?php echo gettext("Serbie-et-Mont&#233;n&#233;gro"); ?></option>
					<option value="slovaquie"><?php echo gettext("Slovaquie"); ?></option>
					<option value="slovenie"><?php echo gettext("Slov&#233;nie"); ?></option>
					<option value="suede"><?php echo gettext("Su&#232;de"); ?></option>
					<option value="suisse"><?php echo gettext("Suisse"); ?></option>
					<option value="republiqueTcheque"><?php echo gettext("R&#233;publique Tch&#232;que"); ?></option>
					<option value="ukraine"><?php echo gettext("Ukraine"); ?></option>
					<option value="vatican"><?php echo gettext("Vatican"); ?></option>
				</optgroup>
				<optgroup label=<?php echo gettext("Oc&#233;anie");?>>
					<option value="australie"><?php echo gettext("Australie"); ?></option>
					<option value="fidji"><?php echo gettext("Fidji"); ?></option>
					<option value="kiribati"><?php echo gettext("Kiribati"); ?></option>
					<option value="marshall"><?php echo gettext("Marshall"); ?></option>
					<option value="micronesie"><?php echo gettext("Micron&#233;sie"); ?></option>
					<option value="nauru"><?php echo gettext("Nauru"); ?></option>
					<option value="nouvelleZelande"><?php echo gettext("Nouvelle-Z&#233;lande"); ?></option>
					<option value="palaos"><?php echo gettext("Palaos"); ?></option>
					<option value="papouasieNouvelleGuinee"><?php echo gettext("Papouasie-Nouvelle-Guin&#233;e"); ?></option>
					<option value="salomon"><?php echo gettext("Salomon"); ?></option>
					<option value="samoa"><?php echo gettext("Samoa"); ?></option>
					<option value="tonga"><?php echo gettext("Tonga"); ?></option>
					<option value="tuvalu"><?php echo gettext("Tuvalu"); ?></option>
					<option value="vanuatu"><?php echo gettext("Vanuatu"); ?></option>
				</optgroup>
			</select>
		</p>
		<p>
			<label for="dateDeb"><?php echo gettext("Date de d&#233;but"); ?></label><br />
			<input name="dateDeb" type="text" id="dateDeb"/>
		</p>
		<p>
			<label for="formation"><?php echo gettext("Formation"); ?></label><br />
			<input name="formation" type="text" id="formation"/>
		</p>
		<p>
			<label for="genre"><?php echo gettext("Genre"); ?></label><br />
			<input name="genre" type="text" id="genre"/>
		</p>
		<p>
			<label for="parentes"><?php echo gettext("Parent&#233;s"); ?></label><br />
			<input name="parentes" type="text" id="parentes"/>
		</p>
		<p>
			<label for="site"><?php echo gettext("Site web"); ?></label><br />
			<input name="site" type="text" id="site"/>
		</p>
		<p>
			<input type="submit" value=<?php echo gettext("S'inscrire");?> class="button" />
		</p>
	</form>
	<p>
		<?php echo anchor('sessions/connexion',echo gettext("Vous poss&#233;dez d&#233;j&#224; un compte ?")) ?>
	</p>
</div>
