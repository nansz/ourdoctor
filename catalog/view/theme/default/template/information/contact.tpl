<?php echo $header; ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Контакты', 'Контакти', 'Contacts'); ?></span></li>
		</ul>
	</div>
</div>
			
			<div class="container contacts-page">
				<div class="row">
					<div class="col-md-3 ">
						<div class="hh2"><img src="/img/call-main.svg" class="icon" alt=""><?php translate('Телефоны', 'Телефони', 'Phones'); ?>:</div>
						<ul>
							<li><a href="tel:<?php echo $this->config->get('config_telephone'); ?>"><?php echo $this->config->get('config_telephone'); ?></a></li>
							<li><a href="tel:<?php echo $this->config->get('config_fax'); ?>"><?php echo $this->config->get('config_fax'); ?></a></li>
							<li><a href="tel:<?php echo $this->config->get('config_telephone3'); ?>"><?php echo $this->config->get('config_telephone3'); ?></a></li>
						</ul>
					</div>
					<div class="col-md-3 ">
						<div class="hh2"><img src="/img/loc.svg" class="icon" alt=""> <?php translate('Адрес', 'Адреса', 'Address'); ?>:</div>
						<ul class="menu-hight">
						  <li><?php translate(html_entity_decode($this->config->get('config_address'), ENT_QUOTES, 'UTF-8'), 'Україна, м. Харків, вул. Лермонтовська, 27', 'Ukraine, Kharkiv, Lermontovskaya str., 27'); ?></li>
						</ul>
					</div>
					<div class="col-md-3 ">
						<div class="hh2"><img src="/img/time.svg" class="icon" alt=""> <?php translate('Режим работы', 'Режим роботи', 'Operating mode'); ?>:</div>
						<ul class="footer-contacts">
							<li><?php translate('Пн - Пт', 'Пн - Пт', 'Mon - Fri'); ?> <?php translate($this->config->get('config_budni'), 'з 8.00 до 20.00', 'from 8am to 8pm'); ?></li>
							<li><?php translate('Сб', 'Сб', 'Sat'); ?> <?php translate($this->config->get('config_subbota'), 'з 8.00 до 16.00', 'from 8am to 4pm'); ?></li>
							<li><?php translate('Вс', 'Нд', 'Su'); ?> <?php translate($this->config->get('config_voskresenje'), 'Вихідний', 'Day off'); ?></li>
						</ul>
					</div>
					<div class="col-md-3 ">
						<div class="hh2"><img src="/img/mail.svg" class="icon" alt=""> E-mail:</div>
						<ul>
							<li><a href="mailto:<?php echo $this->config->get('config_email'); ?>"><?php echo $this->config->get('config_email'); ?></a></li>
							
						</ul>
					</div>
				</div>
			</div>


			<div class="container-fluid main-map contacts-page-map">
				<div class="row">
					<div id="map"></div>
				</div>
				<div class="first-footer-box hidden-sm hidden-xs">
					<div class="hh2"><?php translate('форма обратной связи', 'форма зворотнього зв`язку', 'feedback form'); ?></div>
					<form action="/index.php?route=common/footer/contacts" class="feedback center column" data-autosubmit="true">
						<label for="feedback-name"><?php translate('ФИО', 'ПІБ', 'Full name'); ?>*</label>
						<input type="text" name="feedback-name">
						<label for="feedback-email">E-mail*</label>
						<input type="text" name="feedback-email">
						<label for="feedback-text"><?php translate('Сообщение', 'Повідомлення', 'Message'); ?>*</label>
						<textarea name="feedback-text" id="" cols="30" rows="3"></textarea>
						<div class="g-recaptcha" style="margin-top: 15px; margin-bottom: 15px;" data-sitekey="6Le2slgUAAAAAOIJY8HonjcUve1iMzob9Ry8RZio"></div>
						<input type="submit" value="<?php translate('Отправить', 'Відправити', 'Send'); ?>">
					</form>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="last-footer-box hidden-md hidden-lg">
						<div class="hh2"><?php translate('форма обратной связи', 'форма зворотнього зв`язку', 'feedback form'); ?></div>
						<form action="/index.php?route=common/footer/contacts" class="feedback center column" data-autosubmit="true">
							<label for="feedback-name"><?php translate('ФИО', 'ПІБ', 'Full name'); ?>*</label>
							<input type="text" name="feedback-name">
							<label for="feedback-email">E-mail*</label>
							<input type="text" name="feedback-email">
							<label for="feedback-text"><?php translate('Сообщение', 'Повідомлення', 'Message'); ?>*</label>
							<textarea name="feedback-text" id="" cols="30" rows="3"></textarea>
							<input type="submit" value="<?php translate('Отправить', 'Відправити', 'Send'); ?>">
						</form>
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
		              infowindow.open(map, marker,'МДЦ-LUX');
		         });
		             
		         
		      }

	</script>

 
<?php echo $footer; ?>