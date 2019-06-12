<?php echo $header; ?>

<?php echo $content_top; ?>
<?php //echo $content_bottom; ?>
<?php $this->load->model('tool/image'); ?>
		<!-- MAIN_SPECIALIZATION =========================================================================-->
		<div class="container-fluid specialization-layout">
			<div class="hh2"><?php /*echo $text_spec;*/?><?php translate('НАШИ СПЕЦИАЛИЗАЦИИ', 'НАШІ СПЕЦІАЛІЗАЦІЇ', 'Our focus areas'); ?></div>
			<div class="container main-specialization">
				<div class="row">

					<div class="resize center column">
						<a href="#" class="button start tomograph active"> <div class="center"><img src="/img/tmograph-main.svg?ver=1.0"  alt="<?php echo $text_tom; ?>"></div> <?php echo $text_tom; ?></a>
						<a href="#" class="button start spine"><div class="center"><img src="/img/spine-white.svg?ver=1.0" alt="<?php echo $text_ort; ?>"></div><?php echo $text_ort; ?></a>
						<a href="#" class="button start sport"><div class="center"><img src="/img/spine-white.svg?ver=1.0" alt=""></div><?php translate('СПОРТИВНАЯ ТРАВМА', 'СПОРТИВНА ТРАВМА', 'SPORTS INJURY'); ?></a>
					</div>

				<!-- TOMOGRAPH_BLOCK =========================================================================================-->
					<div class="tomograph-block " >
						<div class="tomograph-block-large hidden-sm hidden-xs" data-mcs-theme="light-thin">

							<div class="col-md-6">
							<div class="tomograph-text-large">
								<?php translate('<p>«Прогресс наук и машин - это полезное средство,
								но единственной целью цивилизации является развитие человека» 
								Эннио Флайано
								</p><p>А в медицине целью прогресса является сохранение здоровья человека и поиск
									оптимальных и эффективных путей диагностики болезней. Да, несколько столетий назад
									ставили диагнозы, имея под рукой только стетоскоп и определенные знания. Однако новая
									эра в диагностической медицине началась с 1896 г., когда немецкий физик Вильгельм Конрад
									Рентген случайно открыл лучи, проникающие через книгу, доску, бумагу, а также через
									органы и ткани человеческого организма. Позже одним из замечательных достижений ХХ века
									явилась разработка метода рентгеновской компьютерной томографии (КТ) – настоящего
									прорыва в диагностической радиологии. </p>
								<p>Сущностью метода КТ является формирование изображения практически всех отделов
									человеческого организма при прохождении пучка рентгеновских лучей через тело пациента в
									разных направлениях.
								</p>
								<p>Диагностический процесс с использованием компьютерной томографии требует колоссальных
									знаний от врача-рентгенолога. Специалист должен разбираться в анатомии, владеть
									информацией о признаках тех или иных болезней. Результатом кропотливой работы является
									диагностика заболеваний, в том числе и на достаточно ранней стадии, что позволяет
									сохранить здоровье, а в ряде случаев, и жизнь пациента.
								</p>',

								'<p>«Прогрес наук і машин - це корисний засіб,
									але єдиною метою цивілізації є розвиток людини »
									Енніо Флайано
								</p>
								<p>А в медицині метою прогресу є збереження здоров’я людини й пошук оптимальних та
									ефективних шляхів діагностики хвороб. Так, кілька століть тому ставили діагнози, маючи
									під рукою лише стетоскоп і певні знання. Однак нова ера в діагностичній медицині
									почалася з 1896 р, коли німецький фізик Вільгельм Конрад Рентген випадково відкрив
									промені, які проникають через книгу, дошку, папір, а також через органи й тканини
									людського організму. Пізніше одним з чудових досягнень ХХ століття стала розробка методу
									рентгенівської комп’ютерної томографії (КТ) - справжнього прориву в діагностичній
									радіології.
								</p>
								<p>Сутністю методу КТ є формування зображення практично всіх відділів людського організму
									під час проходження пучка рентгенівських променів через тіло пацієнта в різних
									напрямках.
								</p>
								<p>Діагностичний процес із використанням комп’ютерної томографії вимагає колосальних знань
									від лікаря-рентгенолога. Спеціаліст повинен розбиратися в анатомії, володіти інформацією
									про ознаки тих чи інших хвороб. Результатом кропіткої роботи є діагностика захворювань,
									у тому числі й на досить ранній стадії, що дозволяє зберегти здоров’я, а в багатьох
									випадках, і життя пацієнта.
								</p>',

								'<p> CT scan (Spiral Computed Tomography) is one of the most modern and informative methods
									of investigation of the human body, which has been used in clinical practice since 1988
									when Siemens Medical Systems presented the first spiral CT machine.

								</p>
								<p> The basis for CT scan is X-ray and computer data processing. Spiral scanning involves
									two processes performed simultaneously: continuous rotation of the source (X-ray tube
									which generates radiation around the patient’s body) and continuous movement of the
									table with the patient. The trajectory of the movement of the X-ray tube along the
									moving table becomes a spiral.

								</p>
								<p> Spiral scanning technology allowed to shorten the CT diagnosis time and significantly
									minimized the affect of the radiation on the patient.

								</p>
								<p> The CT creates sections across and at length of any part of the human body with the
									interval up to 0.5 mm, which allows to examine the topography of the organs, location,
									character and age of the source, its impact on the surrounding tissue, and to create a
									3-D orientation of the pathology process.

								</p>'); ?>

							<!--	<?php echo $tomography_text; ?>-->
							</div>
								<div class="center specialization-feedback hidden-sm hidden-xs">
									<a href="/tomography/" class="button"><?=$text_podrobnee;?></a>
								</div>
							</div>

							<div class="col-md-6 tomograph-images">
								<div class="main-img-tomograph">
									<?php	$tomi= $this->model_tool_image->resize($tomography_image, 555, 295);
									$tomi2= $this->model_tool_image->resize($tomography_image2, 555, 295);
									$tomi3= $this->model_tool_image->resize($tomography_image3, 555, 295);
									$tomi4= $this->model_tool_image->resize($tomography_image4, 555, 295);
										//var_dump($tomi);
									?>
									<a><img src="<?php echo $tomi; ?>?ver=1.0" alt="томография харьков"></a>
								</div>
								<div class="thumbnails btw">
									<div class="tomograph-thumbnails">
										<img src="<?php echo $tomi2; ?>?ver=1.0" alt="томография">
									</div>
									<div class="tomograph-thumbnails">
										<img src="<?php echo $tomi3; ?>?ver=1.0" alt="компьютерная томография харьков">
									</div>
									<div class="tomograph-thumbnails">
										<img src="<?php echo $tomi4; ?>?ver=1.0" alt="харьков компьютерная томография">
									</div>

								</div>

							</div>
						</div>


						<div class="tomograph-slider hidden-md hidden-lg">
						<!-- TOMOGRAPH-SLIDE ==============================================================-->
							<div class="tomograph-slide">
								<div class="tomograph-wrapper center">
									<div class="layout">
										<div class="tomograph-img">
											<img src="<?php echo $tomi; ?>?ver=1.0" alt="томография">
										</div>
									</div>
								</div>
							</div>

						<!-- TOMOGRAPH-SLIDE ==============================================================-->
							<div class="tomograph-slide">
								<div class="tomograph-wrapper center">
									<div class="layout">
										<div class="tomograph-img">
											<img src="<?php echo $tomi2; ?>?ver=1.0" alt="томография харьков">
										</div>
									</div>
								</div>
							</div>

						<!-- TOMOGRAPH-SLIDE ==============================================================-->
							<div class="tomograph-slide">
								<div class="tomograph-wrapper center">
									<div class="layout">
										<div class="tomograph-img">
											<img src="<?php echo $tomi3; ?>?ver=1.0" alt="компьютерная травма">
										</div>
									</div>
								</div>
							</div>

							<!-- TOMOGRAPH-SLIDE ==============================================================-->
							<div class="tomograph-slide">
								<div class="tomograph-wrapper center">
									<div class="layout">
										<div class="tomograph-img">
											<img src="<?php echo $tomi4; ?>?ver=1.0" alt="кт харьков">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tomograph-text-min hidden-md hidden-lg">
							<?php echo $tomography_text; ?>
						</div>
						<div class="tomograph-button-min center hidden-md hidden-lg">
							<a href="/tomography/" class="button"><?=$text_podrobnee;?></a>
						</div>
					</div>


				<!-- SPINE_BLOCK =====================================================================================================-->
					<div class="spine-block hidden-block">

						<div class="spine-block-large hidden-sm hidden-xs" data-mcs-theme="light-thin">
							<div class="col-md-6">
							<div class="spine-text-large">
								<p>
									<?php translate('Заболевания скелетно-мышечной системы широко распространены во всем мире.
Приблизительно одна седьмая часть общих расходов здравоохранения приходится на
лечение пациентов со скелетно-мышечной патологией. Прогнозируется, что число
больных артритами достигнет 60 миллионов в течение следующих 10 лет. Каждый год
более чем 100 миллионов консультативных визитов к врачу и 25 миллионов посещений
пациентами отделения неотложной помощи, приходятся на заболевания скелетно-
мышечной системы.', 'Робота лікаря ортопеда-травматолога спрямована на виявлення захворювань та ушкоджень опорно-рухового апарату людини, а також порушень кістково-м’язової системи. Серед тих, що зустрічаються найчастіше: захворювання хребта та суглобів, пухлини кісток і м’яких тканин, остеопороз (зниження мінеральної щільності кісткової тканини). Лікувальна робота переважно складається з нехірургічних методів лікування захворювань хребта та суглобів, серед яких особливе місце займає ін’єкційна терапія (лікувальні блокади).
', 'Orthopaedist’s task is to diagnose conditions of the musculoskeletal system. The most frequent conditions are diseases of spine and joints, bone and soft tissue tumors, osteoporosis. The treatment of spine and joint diseases consists primarily of nonsurgical methods, especially of injection therapy.'); ?>
								</p>
								<p>
									<?php translate('Сегодня результаты научных исследований в области ортопедии и травматологии активно
внедряются в практическую деятельность и открывают большие возможности для
улучшения качества жизни пациентов. Достижения в области молекулярной медицины,
геномики и протеомики позволяют внедрять революционно новые методы лечения
артрита, неопластических процессов скелетно-мышечной системы и разнообразных видов
травм.', 'При пухлинах кістково-м’язової системи для ідентифікації характеру патологічного утворення проводяться додаткові методи дослідження, такі як комп’ютерна томографія, біопсія осередку ураження.', 'Additional methods such as CT and biopsy are used to identify the pathologic tumors of the osteo-muscular system. An appropriate lab work allows to diagnose the causes of osteoporosis and to select the most effective medical treatment with the further monitoring of the changes in bone mineral density and mineral exchange in the body.'); ?>
								</p>
								<p>
									<?php translate('В медицинском центре ООО «МДЦ-LUX» можно получить квалифицированную
консультацию врача ортопеда-травматолога, пройти курс лечения в соответствии с
действующими протоколами оказания медицинской помощи больным со
скелетно–мышечной патологией. Врач травматолог осуществляет наблюдение и лечение
пациента в течение всего периода терапии.', 'При остеопорозі – призначення адекватної лабораторної діагностики зі встановленням причини порушення, а також підбір найбільш обґрунтованого медикаментозного лікування з подальшим моніторингом зміни стану мінеральної щільності кісткової тканини і мінерального обміну в організмі.', ''); ?>
								</p>




							</div>
								<div class="center specialization-feedback hidden-sm hidden-xs">
									<a href="/orthopedics/" class="button"><?php echo $text_podrobnee; ?></a>
								</div>
							</div>
							<div class="col-md-6 spine-images">
								<?php	$orti= $this->model_tool_image->resize($orthopedics_image, 555, 295);
									$orti2= $this->model_tool_image->resize($orthopedics_image2, 555, 295);
									$orti3= $this->model_tool_image->resize($orthopedics_image3, 555, 295);
									$orti4= $this->model_tool_image->resize($orthopedics_image4, 555, 295);
										//var_dump($tomi);
									?>
								<div class="main-img-spine">
									<a><img src="<?php echo $orti; ?>?ver=1.0" alt="ортопед"></a>
								</div>
								<div class="thumbnails btw">
									<div class="spine-thumbnails">
										<img src="<?php echo $orti2; ?>?ver=1.0" alt="врач ортопед">
									</div>
									<div class="spine-thumbnails">
										<img src="<?php echo $orti3; ?>?ver=1.0" alt="доктор ортопед харьков">
									</div>
									<div class="spine-thumbnails">
										<img src="<?php echo $orti4; ?>?ver=1.0" alt="хороший врач травматолог харьков">
									</div>
								</div>
							</div>
						</div>

						<div class="spine-slider hidden-md hidden-lg">
						<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="<?php echo $orti; ?>?ver=1.0" alt="ортопед-травматолог харьков">
										</div>
									</div>
								</div>
							</div>

						<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="<?php echo $orti2; ?>?ver=1.0" alt="врач ортопед">
										</div>
									</div>
								</div>
							</div>

						<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="<?php echo $orti3; ?>?ver=1.0" alt="ортопед в Харькове">
										</div>
									</div>
								</div>
							</div>

							<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="<?php echo $orti4; ?>?ver=1.0" alt="">
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="spine-text-min hidden-md hidden-lg">
							<?php echo $orthopedics_text; ?>
						</div>
						<div class="spine-button-min center hidden-md hidden-lg">
							<a href="/orthopedics/" class="button"><?php echo $text_podrobnee; ?></a>
						</div>
					</div>
					<!-- SPORT_BLOCK =====================================================================================================-->
					<div class="sport-block hidden-block">


<div class="spine-block-large hidden-sm hidden-xs" data-mcs-theme="light-thin">
							<div class="col-md-6">
							<div class="spine-text-large">
								<p>
									<?php translate('Цели внедрения спортивной медицины в медицинском диагностическом центре ООО
«МДЦ-LUX» заключаются в определении механизмов скелетно-мышечных травм, а также
в поиске и разработке эффективных мер профилактики, диагностики и лечения этих
травм.', '', ''); ?>
								</p>
								<p>
									<?php translate('Доктора медицинского диагностического центра ООО «МДЦ-LUX» постоянно ведут
научно-исследовательскую деятельность для определения механизма заболеваний и
повреждений скелетно-мышечной системы организма человека, в частности, во время
активных занятий спортом. Они изучают все аспекты оценки, лечения и профилактики
спортивных травм, чтобы обеспечить оптимальное лечение для тех, кто занимается
спортом или фитнесом. Это помогает повысить качество жизни людей, подверженных
травмам, связанным со спортом.', '', ''); ?>
								</p>
								<p>
									<?php translate('Чтобы достичь наших целей в области исследований и обеспечить квалифицированную
помощь пациентам-спортсменам, мы сотрудничаем с Институтом патологии
позвоночника и суставов им. проф. М.И. Ситенко и Харьковской медицинской академией
последипломного образования.', '', ''); ?>
								</p>



							</div>
								<div class="center specialization-feedback hidden-sm hidden-xs">
									<a href="/sportivnaya-travma/" class="button"><?php echo $text_podrobnee; ?></a>
								</div>
							</div>
							<div class="col-md-6 spine-images">
								<?php	$orti= $this->model_tool_image->resize($orthopedics_image, 555, 295);
									$orti2= $this->model_tool_image->resize($orthopedics_image2, 555, 295);
									$orti3= $this->model_tool_image->resize($orthopedics_image3, 555, 295);
									$orti4= $this->model_tool_image->resize($orthopedics_image4, 555, 295);
										//var_dump($tomi);
									?>
								<div class="main-img-spine">
									<a><img src="<?php echo $orti; ?>?ver=1.0" alt=""></a>
								</div>
								<div class="thumbnails btw">
									<div class="spine-thumbnails">
										<img src="/image/cache/data/Foto/2V8A4385-555x370.jpg" alt="спортивная травма">
									</div>
									<div class="spine-thumbnails">
										<img src="/image/cache/data/Foto/2V8A4016-555x370.jpg" alt="спортивная травматология">
									</div>
									<div class="spine-thumbnails">
										<img src="/image/cache/data/Foto/2V8A3962-555x370.jpg" alt="лечение спорт травм">
									</div>
								</div>
							</div>
						</div>

						<div class="spine-slider hidden-md hidden-lg">
						<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="/image/cache/data/Foto/2V8A4385-555x370.jpg" alt="спортивная травма">
										</div>
									</div>
								</div>
							</div>

						<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="<?php echo $orti2; ?>?ver=1.0" alt="спортивная травматология харьков">
										</div>
									</div>
								</div>
							</div>

						<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="<?php echo $orti3; ?>?ver=1.0" alt="клиника спортивной травматологии">
										</div>
									</div>
								</div>
							</div>

							<!-- SPINE-SLIDE ==============================================================-->
							<div class="spine-slide hidden">
								<div class="spine-wrapper center">
									<div class="layout">
										<div class="spine-img">
											<img src="<?php echo $orti4; ?>?ver=1.0" alt="институт спортивной травматологии">
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="spine-text-min hidden-md hidden-lg">
							<?php echo $orthopedics_text; ?>
						</div>
						<div class="spine-button-min center hidden-md hidden-lg">
							<a href="/sportivnaya-travma/" class="button"><?php echo $text_podrobnee; ?></a>
						</div>




					</div>


				</div>
			</div>
		</div>
<!-- MAIN_ABOUT ==================================================================================-->
			<div class="container-fluid about-layout" id="about">
				<div class="container main-about">
					<div class="row">

						<!--<div class="hh2"><?php echo $text_okompanii; ?></div>-->
						<div class="hh2"><?php translate('	О КОМПАНИИ', 'ПРО КОМПАНІЮ', 'About our company'); ?></div>


						<div class="about-video-box col-xs-12 col-sm-6 pull-right">
							<div class="row">
								<div class="video-text">
									<p><?php echo $videotitle; ?></p>
								</div>
								<div class="video-button center">
									<a href="<?php echo $video; ?>">
                                            <span class="icon"><svg width="131" height="131" viewBox="0 0 131 131" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M83.0762 48.2531L56.1865 63.7778L56.1865 32.7283L83.0762 48.2531Z" fill="white"/>
<path d="M24.2812 94.7783C22.9186 94.7783 21.8385 94.318 21.041 93.3975C20.2389 92.4814 19.8379 91.2419 19.8379 89.6787C19.8379 88.1292 20.2412 86.8942 21.0479 85.9736C21.8545 85.0485 22.9323 84.5859 24.2812 84.5859C25.3294 84.5859 26.2249 84.873 26.9678 85.4473C27.7061 86.0169 28.1663 86.7757 28.3486 87.7236H27.0908C26.9131 87.113 26.569 86.6276 26.0586 86.2676C25.5482 85.903 24.9557 85.7207 24.2812 85.7207C23.3197 85.7207 22.5495 86.0807 21.9707 86.8008C21.3919 87.5208 21.1025 88.4801 21.1025 89.6787C21.1025 90.891 21.3896 91.8548 21.9639 92.5703C22.5381 93.2858 23.3128 93.6436 24.2881 93.6436C24.9854 93.6436 25.5801 93.4886 26.0723 93.1787C26.5553 92.8688 26.8949 92.4313 27.0908 91.8662H28.3486C28.1071 92.805 27.6354 93.5251 26.9336 94.0264C26.2318 94.5277 25.3477 94.7783 24.2812 94.7783ZM29.791 94.6143V87.2451H31.2197L33.8857 93.0352H33.9404L36.6133 87.2451H37.9873V94.6143H36.8047V89.3711H36.75L34.3438 94.4092H33.4277L31.0215 89.3711H30.9668V94.6143H29.791ZM42.7793 94.6826C41.7448 94.6826 40.9199 94.3431 40.3047 93.6641C39.6895 92.985 39.3818 92.0736 39.3818 90.9297C39.3818 89.7858 39.6895 88.8743 40.3047 88.1953C40.9199 87.5163 41.7448 87.1768 42.7793 87.1768C43.8138 87.1768 44.6387 87.5163 45.2539 88.1953C45.8691 88.8743 46.1768 89.7858 46.1768 90.9297C46.1768 92.0736 45.8691 92.985 45.2539 93.6641C44.6387 94.3431 43.8138 94.6826 42.7793 94.6826ZM42.7793 93.623C43.4674 93.623 44.0029 93.3861 44.3857 92.9121C44.7731 92.4336 44.9668 91.7728 44.9668 90.9297C44.9668 90.082 44.7731 89.4212 44.3857 88.9473C44.0029 88.4733 43.4674 88.2363 42.7793 88.2363C42.0911 88.2363 41.5557 88.4733 41.1729 88.9473C40.7855 89.4258 40.5918 90.0866 40.5918 90.9297C40.5918 91.7728 40.7855 92.4336 41.1729 92.9121C41.5602 93.3861 42.0957 93.623 42.7793 93.623ZM52.7871 88.2295H50.3945V94.6143H49.2188V88.2295H46.8262V87.2451H52.7871V88.2295ZM57.4766 87.1768C58.4199 87.1768 59.181 87.5208 59.7598 88.209C60.3431 88.9017 60.6348 89.8086 60.6348 90.9297C60.6348 92.0508 60.3454 92.9577 59.7666 93.6504C59.1878 94.3385 58.4336 94.6826 57.5039 94.6826C56.4238 94.6826 55.64 94.2611 55.1523 93.418H55.125V97.0752H53.9355V87.2451H55.0635V88.4414H55.0908C55.305 88.0586 55.6286 87.751 56.0615 87.5186C56.4945 87.2907 56.9661 87.1768 57.4766 87.1768ZM57.2578 93.623C57.9095 93.623 58.4313 93.3792 58.8232 92.8916C59.2197 92.3994 59.418 91.7454 59.418 90.9297C59.418 90.1185 59.2197 89.4668 58.8232 88.9746C58.4313 88.4824 57.9095 88.2363 57.2578 88.2363C56.6243 88.2363 56.1094 88.4847 55.7129 88.9814C55.3164 89.4782 55.1182 90.1276 55.1182 90.9297C55.1182 91.7318 55.3164 92.3812 55.7129 92.8779C56.1048 93.3747 56.6198 93.623 57.2578 93.623ZM64.9688 88.2227C64.39 88.2227 63.9115 88.4141 63.5332 88.7969C63.1504 89.1797 62.9385 89.6833 62.8975 90.3076H66.9512C66.9375 89.6833 66.7484 89.1797 66.3838 88.7969C66.0238 88.4141 65.5521 88.2227 64.9688 88.2227ZM68.0996 92.5088C67.9993 93.1423 67.6621 93.6618 67.0879 94.0674C66.5137 94.4775 65.8324 94.6826 65.0439 94.6826C64.0094 94.6826 63.1868 94.3477 62.5762 93.6777C61.9701 93.0078 61.667 92.1009 61.667 90.957C61.667 89.8132 61.9701 88.8971 62.5762 88.209C63.1823 87.5208 63.9867 87.1768 64.9893 87.1768C65.9736 87.1768 66.7529 87.5003 67.3271 88.1475C67.9014 88.7992 68.1885 89.681 68.1885 90.793V91.2578H62.8975V91.3262C62.8975 92.028 63.0957 92.5885 63.4922 93.0078C63.8887 93.4271 64.415 93.6367 65.0713 93.6367C65.5316 93.6367 65.9303 93.5342 66.2676 93.3291C66.6003 93.1286 66.819 92.8551 66.9238 92.5088H68.0996ZM74.7988 88.2295H72.4062V94.6143H71.2305V88.2295H68.8379V87.2451H74.7988V88.2295ZM77.123 90.5947V93.6299H78.5107C78.9938 93.6299 79.3812 93.4909 79.6729 93.2129C79.96 92.9395 80.1035 92.5726 80.1035 92.1123C80.1035 91.652 79.9577 91.2829 79.666 91.0049C79.3789 90.7314 78.9938 90.5947 78.5107 90.5947H77.123ZM75.9473 87.2451H77.123V89.6104H78.5107C79.3538 89.6104 80.026 89.8359 80.5273 90.2871C81.0286 90.7383 81.2793 91.3467 81.2793 92.1123C81.2793 92.8779 81.0286 93.4863 80.5273 93.9375C80.026 94.3887 79.3538 94.6143 78.5107 94.6143H75.9473V87.2451ZM21.2461 108.229V110.308H22.8867C23.8118 110.308 24.2744 109.957 24.2744 109.255C24.2744 108.571 23.8757 108.229 23.0781 108.229H21.2461ZM21.2461 111.292V113.63H23.2148C24.1354 113.63 24.5957 113.245 24.5957 112.475C24.5957 111.686 24.0602 111.292 22.9893 111.292H21.2461ZM20.0703 107.245H23.2285C23.9121 107.245 24.4521 107.414 24.8486 107.751C25.2406 108.088 25.4365 108.549 25.4365 109.132C25.4365 109.506 25.3203 109.845 25.0879 110.15C24.8555 110.456 24.5706 110.645 24.2334 110.718V110.772C24.6937 110.836 25.0651 111.025 25.3477 111.34C25.6257 111.654 25.7646 112.039 25.7646 112.495C25.7646 113.147 25.5391 113.664 25.0879 114.047C24.6367 114.425 24.0215 114.614 23.2422 114.614H20.0703V107.245ZM27.1934 114.614V107.245H28.3691V112.775H28.4238L32.2178 107.245H33.3936V114.614H32.2178V109.084H32.1631L28.3691 114.614H27.1934ZM40.0381 108.229H37.2422L37.0098 111.381C36.9323 112.415 36.7295 113.147 36.4014 113.575V113.63H40.0381V108.229ZM34.4121 116.562V113.63H35.0273C35.5286 113.302 35.8203 112.543 35.9023 111.354L36.1895 107.245H41.2139V113.63H42.3896V116.562H41.2822V114.614H35.5195V116.562H34.4121ZM46.4434 108.223C45.8646 108.223 45.3861 108.414 45.0078 108.797C44.625 109.18 44.4131 109.683 44.3721 110.308H48.4258C48.4121 109.683 48.223 109.18 47.8584 108.797C47.4984 108.414 47.0267 108.223 46.4434 108.223ZM49.5742 112.509C49.474 113.142 49.1367 113.662 48.5625 114.067C47.9883 114.478 47.307 114.683 46.5186 114.683C45.484 114.683 44.6615 114.348 44.0508 113.678C43.4447 113.008 43.1416 112.101 43.1416 110.957C43.1416 109.813 43.4447 108.897 44.0508 108.209C44.6569 107.521 45.4613 107.177 46.4639 107.177C47.4482 107.177 48.2275 107.5 48.8018 108.147C49.376 108.799 49.6631 109.681 49.6631 110.793V111.258H44.3721V111.326C44.3721 112.028 44.5703 112.589 44.9668 113.008C45.3633 113.427 45.8896 113.637 46.5459 113.637C47.0062 113.637 47.4049 113.534 47.7422 113.329C48.0749 113.129 48.2936 112.855 48.3984 112.509H49.5742ZM54.0859 114.683C53.0514 114.683 52.2266 114.343 51.6113 113.664C50.9961 112.985 50.6885 112.074 50.6885 110.93C50.6885 109.786 50.9961 108.874 51.6113 108.195C52.2266 107.516 53.0514 107.177 54.0859 107.177C55.1204 107.177 55.9453 107.516 56.5605 108.195C57.1758 108.874 57.4834 109.786 57.4834 110.93C57.4834 112.074 57.1758 112.985 56.5605 113.664C55.9453 114.343 55.1204 114.683 54.0859 114.683ZM54.0859 113.623C54.7741 113.623 55.3096 113.386 55.6924 112.912C56.0798 112.434 56.2734 111.773 56.2734 110.93C56.2734 110.082 56.0798 109.421 55.6924 108.947C55.3096 108.473 54.7741 108.236 54.0859 108.236C53.3978 108.236 52.8623 108.473 52.4795 108.947C52.0921 109.426 51.8984 110.087 51.8984 110.93C51.8984 111.773 52.0921 112.434 52.4795 112.912C52.8669 113.386 53.4023 113.623 54.0859 113.623Z" fill="white"/>
<rect x="0.649902" y="1.2251" width="129" height="129" stroke="white"/>
</svg>
</span>
									</a>
								</div>
								<div class="video-container">
									<?php 		$vid= $this->model_tool_image->resize($videoimage, 584, 310);
									//var_dump($vid); ?>
									<img src="<?php echo $vid; ?>?ver=1.0"></img>
								</div>
							</div>
						</div>
						<div class="about-text-box col-xs-12 col-sm-6">
							<p><?php echo $smalltext; ?></p>

							<div class="center">
								<a href="/about-us/" class="button"><?php echo $text_podrobnee; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>



		<?php if($products) { ?>

		<!-- MAIN_PUBLICATION ============================================================================-->
			<div class="container main-publication">
				<div class="row">
					<div class="hh2"><?php /*$text_last;*/ ?><?php translate('Последние публикации ', 'Останнi публiкацii', 'Latest publications'); ?></div>
					<div class="publication-slider">

						<!----start slider home page -->
						<?php foreach($products as $pub_general) { ?>
							<div class="publication-slide ">
								<div class="center">
									<div class="publication-slide-wrapper">
										<div class="publication-img">
											<a href="<?php echo $pub_general['href']; ?>">
												<img src="<?php echo $pub_general['thumb']; ?>" alt="">
											</a>
										</div>
										<div class="publication-text">
											<p>
												<a href="<?php echo $pub_general['href']; ?>"> <?php echo $pub_general['name']; ?>
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<!----end slider home page -->

					</div>
				</div>
			</div>
			<?php } ?>

			<h1 class="mdc"><?php echo $text_MDC; ?></h1>
			<?php echo $content_bottom; ?>






		<!-- MAIN_MAP ====================================================================================-->
			<div class="container-fluid main-map">
				<div class="row" >
					<div id="map"></div>
				</div>
				<div class="first-footer-box hidden-sm hidden-xs">
					<div class="hh2"><?php translate('Наш адрес', 'Наша адреса', 'Our address'); ?>:</div>
					<ul class="footer-contacts">
						<li><?php translate(html_entity_decode($this->config->get('config_address'), ENT_QUOTES, 'UTF-8'), 'Україна, м. Харків, вул. Лермонтовська, 27', 'Ukraine, Kharkiv, Lermontovskaya str., 27'); ?></li>
						<li><?php translate('Режим работы', 'Режим роботи', 'Operating mode'); ?>:</li>
						<li><?php translate('Пн - Пт', 'Пн - Пт', 'Mon - Fri'); ?>: <?php translate($this->config->get('config_budni'), 'з 8.00 до 20.00', 'from 8am to 8pm'); ?></li>
						<li><?php translate('Сб', 'Сб', 'Sat'); ?>: <?php translate($this->config->get('config_subbota'), 'з 8.00 до 16.00', 'from 8am to 4pm'); ?></li>
						<li><?php translate('Вс', 'Нд', 'Su'); ?>: <?php translate($this->config->get('config_voskresenje'), 'Вихідний', 'Day off'); ?></li>
						<li><?php translate('E-mail:', 'E-mail:', 'E-mail:'); ?> <a href="mailto:<?php echo $this->config->get('config_email'); ?>"><?php echo $this->config->get('config_email'); ?></a></li>
						<li class="start"><?php translate('Телефоны', 'Телефони', 'Phones'); ?>:
							<ul>
								<li><a href="tel:<?php echo $this->config->get('config_telephone'); ?>"><?php echo $this->config->get('config_telephone'); ?></a></li>
								<li><a href="tel:<?php echo $this->config->get('config_fax'); ?>"><?php echo $this->config->get('config_fax'); ?></a></li>
								<li><a href="tel:<?php echo $this->config->get('config_telephone3'); ?>"><?php echo $this->config->get('config_telephone3'); ?></a></li>
							</ul>
						</li>
					</ul>
					<div class="center">
						<a href="#" class="modal-trigger button" data-modal="appointment"><?=$text_zapis;?></a>
					</div>
				</div>
			</div>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgyvSYxct91cu8XXJ8q7Abq1SZvS1FaDA&callback=initMap" type="text/javascript"></script>
	<script>
		function initMap() {
		        // Styles a map in night mode.
		        var map = new google.maps.Map(document.getElementById('map'), {

		          center: {lat: 50.004644, lng: 36.258182},
		          zoom: 13,
		          scrollwheel:false,

		          styles: [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#1e88a4"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ff0000"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.icon",
        "stylers": [
            {
                "color": "#adb2e3"
            },
            {
                "saturation": "40"
            },
            {
                "lightness": "6"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "5"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "saturation": "-100"
            },
            {
                "lightness": "100"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#e0efef"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "weight": "1.32"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#c0e8e8"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#607980"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "saturation": "-100"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.icon",
        "stylers": [
            {
                "hue": "#009fff"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "color": "#e7e7e7"
            },
            {
                "visibility": "off"
            },
            {
                "saturation": "19"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 100
            },
            {
                "visibility": "simplified"
            },
            {
                "saturation": "-100"
            },
            {
                "color": "#f6f6f6"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text",
        "stylers": [
            {
                "saturation": "-10"
            },
            {
                "lightness": "-19"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#6fa4b2"
            },
            {
                "saturation": "13"
            },
            {
                "lightness": "10"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": "91"
            },
            {
                "saturation": "9"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#d5efef"
            }
        ]
    }
]
		        });
		        var latlng = new google.maps.LatLng(50.004769, 36.257712);
		        var image = {
		                url: '/img/marker.svg', // image is 512 x 512
		                scaledSize : new google.maps.Size(114, 114)
		            };
		        var marker = new google.maps.Marker({
		          position: latlng,
		          map: map,
		          animation: google.maps.Animation.BOUNCE,
		          icon: image
		        });

		        var infowindow = new google.maps.InfoWindow();
		             google.maps.event.addListener(marker, 'click', function() {
		              infowindow.open(map, marker);
		         });


		      }

	</script>

<?php echo $footer; ?>