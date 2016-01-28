
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
			<label for="mail"> E-mail </label><br />
			<input name="mail" type="email" id="mail"/><br />
			<em><strong>Attention : </strong> <?php echo gettext("vous recevrez vos identifiants de connexion avec cet e-mail"); ?></em>
		</p>
		<p>
			<label><?php echo gettext("Pays"); ?></label><br />
			<select name="pays">
				<optgroup label=<?php echo gettext("Afrique"); ?>>
					<option value="afriqueDuSud"><?php echo gettext("Afrique Du Sud"); ?></option>
					<option value="algerie"><?php echo gettext("Algerie"); ?></option>
					<option value="angola"> Angola </option>
					<option value="benin"> Benin </option>
					<option value="botswana"> Botswana ></option>
					<option value="burkina"> Burkina </option>
					<option value="burundi"> Burundi </option>
					<option value="cameroun"><?php echo gettext("Cameroun");?></option>
					<option value="capVert"><?php echo gettext("Cap-Vert");?></option>
					<option value="republiqueCentre-Africaine"><?php echo gettext("Republique Centre-Africaine"); ?></option>
					<option value="comores"><?php echo gettext("Comores");?></option>
					<option value="republiqueDemocratiqueDuCongo"><?php echo gettext("Republique Democratique Du Congo");?></option>
					<option value="congo"> Congo </option>
					<option value="coteIvoire"><?php echo gettext("Cote d'Ivoire"); ?></option>
					<option value="djibouti"> Djibouti </option>
					<option value="egypte"><?php echo gettext("Egypte"); ?></option>
					<option value="ethiopie"><?php echo gettext("Ethiopie");?></option>
					<option value="erythrée"><?php echo gettext("Erythree");?></option>
					<option value="gabon"> Gabon </option>
					<option value="gambie"><?php echo gettext("Gambie"); ?></option>
					<option value="ghana"> Ghana </option>
					<option value="guinee"><?php echo gettext("Guinee"); ?></option>
					<option value="guinee-Bisseau"><?php echo gettext("Guinee-Bisseau"); ?></option>
					<option value="guineeEquatoriale"><?php echo gettext("Guinee Equatoriale"); ?></option>
					<option value="kenya"> Kenya </option>
					<option value="lesotho"> Lesotho </option>
					<option value="liberia"> Liberia </option>
					<option value="libye"><?php echo gettext("Libye"); ?></option>
					<option value="madagascar"> Madagascar </option>
					<option value="malawi"> Malawi </option>
					<option value="mali"> Mali </option>
					<option value="maroc"> Maroc </option>
					<option value="maurice"> Maurice </option>
					<option value="mauritanie"><?php echo gettext("Mauritanie"); ?></option>
					<option value="mozambique"> Mozambique </option>
					<option value="namibie"><?php echo gettext("Namibie"); ?></option>
					<option value="niger"> Niger </option>
					<option value="nigeria"> Nigeria </option>
					<option value="ouganda"><?php echo gettext("Ouganda"); ?></option>
					<option value="rwanda"> Rwanda </option>
					<option value="saoTomeEtPrincipe"><?php echo gettext("Sao Tome-et-Principe"); ?></option>
					<option value="senegal"> Senegal </option>
					<option value="seychelles"> Seychelles </option>
					<option value="sierra"> Sierra </option>
					<option value="somalie"><?php echo gettext("Somalie"); ?></option>
					<option value="soudan"><?php echo gettext("Soudan"); ?></option>
					<option value="swaziland"> Swaziland </option>
					<option value="tanzanie"><?php echo gettext("Tanzanie"); ?></option>
					<option value="tchad"><?php echo gettext("Tchad"); ?></option>
					<option value="togo"> Togo </option>
					<option value="tunisie"><?php echo gettext("Tunisie"); ?></option>
					<option value="zambie"><?php echo gettext("Zambie"); ?></option>
					<option value="zimbabwe"> Zimbabwe </option>
				</optgroup>
				<optgroup label=<?php echo gettext("Amerique");?>>
					<option value="antiguaEtBarbuda"><?php echo gettext("Antigua-et-Barbuda"); ?></option>
					<option value="argentine"><?php echo gettext("Argentine"); ?></option>
					<option value="bahamas"> Bahamas </option>
					<option value="barbade"><?php echo gettext("Barbade"); ?></option>
					<option value="belize"> Belize </option>
					<option value="bolivie"><?php echo gettext("Bolivie"); ?></option>
					<option value="bresil"><?php echo gettext("Bresil"); ?></option>
					<option value="canada"> Canada </option>
					<option value="chili"><?php echo gettext("Chili"); ?></option>
					<option value="colombie"><?php echo gettext("Colombie"); ?></option>
					<option value="costaRica"> Costa Rica </option>
					<option value="cuba"> Cuba </option>
					<option value="republiqueDominicaine"><?php echo gettext("Republique Dominicaine"); ?></option>
					<option value="dominique"><?php echo gettext("Dominique"); ?></option>
					<option value="equateur"><?php echo gettext("Equateur"); ?></option>
					<option value="etatsUnis"><?php echo gettext("Etats-Unis"); ?></option>
					<option value="grenade"><?php echo gettext("Grenade"); ?></option>
					<option value="guatemala"> Guatemala </option>
					<option value="guyana"> Guyana </option>
					<option value="haiti"> Haïti </option>
					<option value="honduras"> Honduras </option>
					<option value="jamaique"><?php echo gettext("Jamaique"); ?></option>
					<option value="mexique"><?php echo gettext("Mexique"); ?></option>
					<option value="nicaragua"> Nicaragua </option>
					<option value="panama"> Panama </option>
					<option value="paraguay"> Paraguay </option>
					<option value="perou"><?php echo gettext("Perou"); ?></option>
					<option value="saintCristopheEtNieves"><?php echo gettext("Saint-Christophe-et-Nieves"); ?></option>
					<option value="sainteLucie"><?php echo gettext("Sainte-Lucie"); ?></option>
					<option value="saintVincentEtLesGrenadines"><?php echo gettext("Saint-Vincent-et-les-Grenadines"); ?></option>
					<option value="salvador"> Salvador </option>
					<option value="suriname"> Suriname </option>
					<option value="triniteEtTobago"><?php echo gettext("Trinite-et-Tobago"); ?></option>
					<option value="uruguay"> Uruguay </option>
					<option value="venezuela"> Venezuela </option>
				</optgroup>
				<optgroup label=<?php echo gettext("Asie");?>>
					<option value="afghanistan"> Afghanistan </option>
					<option value="arabieSaoudite"><?php echo gettext("Arabie Saoudite"); ?></option>
					<option value="armenie"><?php echo gettext("Armenie"); ?></option>
					<option value="azerbaidjan"><?php echo gettext("Azerbaidjan"); ?></option>
					<option value="bahrein"><?php echo gettext("Bahrein"); ?></option>
					<option value="bangladesh"> Bangladesh </option>
					<option value="bhoutan"><?php echo gettext("Bhoutan"); ?></option>
					<option value="birmanie"><?php echo gettext("Birmanie"); ?></option>
					<option value="brunei"> Brunei </option>
					<option value="cambodge"><?php echo gettext("Cambodge"); ?></option>
					<option value="chine"><?php echo gettext("Chine"); ?></option>
					<option value="coreeDuSud"><?php echo gettext("Coree Du Sud"); ?></option>
					<option value="coreeDuNord"><?php echo gettext("Coree Du Nord"); ?></option>
					<option value="emiratsArabeUnis"><?php echo gettext("Emirats Arabe Unis"); ?></option>
					<option value="georgie"><?php echo gettext("Georgie"); ?></option>
					<option value="inde"><?php echo gettext("Inde"); ?></option>
					<option value="indonesie"><?php echo gettext("Indonesie"); ?></option>
					<option value="iraq"> Iraq </option>
					<option value="iran"> Iran </option>
					<option value="israel">"Israël"</option>
					<option value="japon"><?php echo gettext("Japon"); ?></option>
					<option value="jordanie"><?php echo gettext("Jordanie"); ?></option>
					<option value="kazakhstan"> Kazakhstan </option>
					<option value="kirghistan"> Kirghistan </option>
					<option value="koweit"><?php echo gettext("Koweit"); ?></option>
					<option value="laos"> Laos </option>
					<option value="liban"><?php echo gettext("Liban"); ?></option>
					<option value="malaisie"><?php echo gettext("Malaisie"); ?></option>
					<option value="maldives"> Maldives </option>
					<option value="mongolie"><?php echo gettext("Mongolie"); ?></option>
					<option value="nepal"> Nepal </option>
					<option value="oman"> Oman </option>
					<option value="ouzbekistan"><?php echo gettext("Ouzbekistan"); ?></option>
					<option value="pakistan"> Pakistan </option>
					<option value="philippines"> Philippines </option>
					<option value="qatar"> Qatar </option>
					<option value="singapour"><?php echo gettext("Singapour"); ?></option>
					<option value="sriLanka"> Sri Lanka </option>
					<option value="syrie"><?php echo gettext("Syrie"); ?></option>
					<option value="tadjikistan"><?php echo gettext("Tadjikistan"); ?></option>
					<option value="taiwan"> Taïwan </option>
					<option value="thailande"><?php echo gettext("Thailande"); ?></option>
					<option value="timorOriental"><?php echo gettext("Timor oriental"); ?></option>
					<option value="turkmenistan"> Turkmenistan </option>
					<option value="turquie"><?php echo gettext("Turquie"); ?></option>
					<option value="vietNam"> VietNam </option>
					<option value="yemen"> Yemen </option>
				</optgroup>
				<optgroup label=<?php echo gettext("Europe");?>>
					<option value="allemagne"><?php echo gettext("Allemagne"); ?></option>
					<option value="albanie"><?php echo gettext("Albanie"); ?></option>
					<option value="andorre"> Andorre </option>
					<option value="autriche"><?php echo gettext("Autriche"); ?></option>
					<option value="bielorussie"><?php echo gettext("Bielorussie"); ?></option>
					<option value="belgique"><?php echo gettext("Belgique"); ?></option>
					<option value="bosnieHerzegovine"><?php echo gettext("Bosnie-Herzegovine"); ?></option>
					<option value="bulgarie"><?php echo gettext("Bulgarie"); ?></option>
					<option value="croatie"><?php echo gettext("Croatie"); ?></option>
					<option value="danemark"><?php echo gettext("Danemark"); ?></option>
					<option value="espagne"><?php echo gettext("Espagne"); ?></option>
					<option value="estonie"><?php echo gettext("Estonie"); ?></option>
					<option value="finlande"><?php echo gettext("Finlande"); ?></option>
					<option value="france"> France </option>
					<option value="grece"><?php echo gettext("Grece"); ?></option>
					<option value="hongrie"><?php echo gettext("Hongrie"); ?></option>
					<option value="irlande"><?php echo gettext("Irlande"); ?></option>
					<option value="islande"><?php echo gettext("Islande"); ?></option>
					<option value="italie"><?php echo gettext("Italie"); ?></option>
					<option value="lettonie"><?php echo gettext("Lettonie"); ?></option>
					<option value="liechtenstein"> Liechtenstein </option>
					<option value="lituanie"><?php echo gettext("Lituanie"); ?></option>
					<option value="luxembourg"> Luxembourg </option>
					<option value="exRepubliqueYougoslaveDeMacedoine"><?php echo gettext("Ex-Republique Yougoslave de Macedoine"); ?></option>
					<option value="malte"><?php echo gettext("Malte"); ?></option>
					<option value="moldavie"><?php echo gettext("Moldavie"); ?></option>
					<option value="monaco"> Monaco </option>
					<option value="norvege"><?php echo gettext("Norvege"); ?></option>
					<option value="paysBas"><?php echo gettext("Pays-Bas"); ?></option>
					<option value="pologne"><?php echo gettext("Pologne"); ?></option>
					<option value="portugal"> Portugal </option>
					<option value="roumanie"><?php echo gettext("Roumanie"); ?></option>
					<option value="royaumeUni"><?php echo gettext("Royaume-Uni"); ?></option>
					<option value="russie"><?php echo gettext("Russie"); ?></option>
					<option value="saintMarin"><?php echo gettext("Saint-Marin"); ?></option>
					<option value="serbieEtMontenegro"><?php echo gettext("Serbie-et-Montenegro"); ?></option>
					<option value="slovaquie"><?php echo gettext("Slovaquie"); ?></option>
					<option value="slovenie"><?php echo gettext("Slovenie"); ?></option>
					<option value="suede"><?php echo gettext("Suede"); ?></option>
					<option value="suisse"><?php echo gettext("Suisse"); ?></option>
					<option value="republiqueTcheque"><?php echo gettext("Republique Tcheque"); ?></option>
					<option value="ukraine"> Ukraine </option>
					<option value="vatican"> Vatican </option>
				</optgroup>
				<optgroup label=<?php echo gettext("Oceanie");?>>
					<option value="australie"><?php echo gettext("Australie"); ?></option>
					<option value="fidji"><?php echo gettext("Fidji"); ?></option>
					<option value="kiribati"> Kiribati </option>
					<option value="marshall"> Marshall </option>
					<option value="micronesie"><?php echo gettext("Micronesie"); ?></option>
					<option value="nauru"> Nauru </option>
					<option value="nouvelleZelande"><?php echo gettext("Nouvelle-Zelande"); ?></option>
					<option value="palaos"> Palaos </option>
					<option value="papouasieNouvelleGuinee"><?php echo gettext("Papouasie-Nouvelle-Guinee"); ?></option>
					<option value="salomon"> Salomon </option>
					<option value="samoa"> Samoa </option>
					<option value="tonga"> Tonga </option>
					<option value="tuvalu"> Tuvalu </option>
					<option value="vanuatu"> Vanuatu </option>
				</optgroup>
			</select>
		</p>
		<p>
			<label for="dateDeb"><?php echo gettext("Date de debut"); ?></label><br />
			<input name="dateDeb" type="text" id="dateDeb"/>
		</p>
		<p>
			<label for="formation"> Formation </label><br />
			<input name="formation" type="text" id="formation"/>
		</p>
		<p>
			<label for="genre"><?php echo gettext("Genre"); ?></label><br />
			<input name="genre" type="text" id="genre"/>
		</p>
		<p>
			<label for="parentes"><?php echo gettext("Parentes"); ?></label><br />
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
		<?php echo anchor('sessions/connexion',echo gettext("Vous possedez deja un compte ?")) ?>
	</p>
</div>
