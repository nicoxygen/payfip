=== TIPI ===

Tags: credit card, ecommerce, e-commerce, mairie, city hall, collectivity
Requires at least: 4.4
Tested up to: 5.9
Stable tag: 1.2.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Fork-Author URI: https://www.patricelaurent.net
Fork-Plugin URI: https://www.patricelaurent.net/portfolio/e-commerce/tipi-pour-wordpress/

Tipi/Payfip for Wordpress is a plugin allowing city hall and collectivities to integrate the TIPI/PAYFIP payment gateway into their website, simply and efficiently

== Description ==

Allow people to pay their invoices with Visa, MasterCard and more cards directly from your website with the TIPI/PAYFIP payment gateway.
A test version is available online.

Information and Documentation available on the [official Website](https://github.com/nicoxygen/payfip/).

= Offer Credit card payments easily and directly from your website =

== Installation ==


= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser.
To do an automatic install of, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “tipi” and click Search Plugins. Once you’ve found our plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking "Install Now".

= Manual installation =

The manual installation method involves downloading our plugin and uploading it to your web server via your favorite FTP application. The WordPress codex contains [instructions on how to do this here](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

= Updating =

Automatic updates should work like a charm; as always though, ensure you backup your site just in case.

== Screenshots ==

1. The settings panel used to configure the gateway.
2. Normal checkout with TIPI.
3. The Front-end collapsing Faqs
4. The Back-end Faqs
5. The front-end selector for Invoice Type
6. The back-end for Invoice Type
7. The content from the Admin Editor

== address of intégration

https://www.collectivites-locales.gouv.fr/files/Finances%20locales/7.%20moyens%20de%20paiement/3.%20PayfiP/guide_2021/Guide%20de%20mise%20en%20oeuvre%20PayFiP%20REGIES%20%2B%20annexesVJUIN2021.pdf

== Changelog ==

= 1.2.0.2 - 2022-02-27 =

* fix value for mode test
* fix link of payment tipi.budget to payfip

= 1.1.7.1 - 2017-08-24 =

* Fix use of `the_content` filter

= 1.1.7 - 2017-07-08 =

* Fix - Check if option is an array

= 1.1.6 =

* Add -  Set default option on activate plugin

= 1.1.5 =

* Fix -  Bad french translation filename

= 1.1.3 =

* Add -  add additional links below the plugin on the plugins page
* Add -  Better design for admin option page

= 1.1.2 =

* Fix - php syntax error

= 1.1.0 =

* Add - Allow to display content inside form from content editor page.
* Add - faqs displayed on Tipi Form.
* Add - Allow to define Invoices Type.
* Add - Improved README.
* Add - changelog.txt.
* Add - Assets for Worpdress SVN repo.
* Fix - missing translations.
* Fix - Enqueue script and style only when needed.
* New - Introduce "tipi_gateway_settings_options" filter.
* New - Introduce "tipi_gateway_plugin_url" filter.
* New - Introduce "tipi_gateway_public_template" filter.
* New - Introduce "tipi_gateway_faq_template" filter.
* New - Introduce "tipi_gateway_data_return" action hook.

= 1.0.0 =
* Add - Initial release.

[See changelog for all versions](https://raw.githubusercontent.com/plaurent75/tipi/master/changelog.txt).
