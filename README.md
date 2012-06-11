TinyMCE_Customizer
==================
TinyMCE_Customizer ist eine Contao-Erweiterung um Konfigurationen für den TinyMCE RichtTextEditor zu erstellen.

→ [Screenshots](_SCREENS/index.md)

→ [Entwicklerdokumentation](DEVELOPER.md)

Sponsoren
---------
Diese Erweiterung wurde finanziert von:

* [InfinitySoft, Tristan Lins](http://www.infinitysoft.de)
* [certo web & design GmbH](http://www.certo-net.ch)
* [contao4you.de](http://contao4you.de)
* Tasten & Co
* [www.lingo4u.de](http://www.lingo4u.de)
* Bytepuzzle
* [Dockmedia](http://www.dockmedia.de)
* [planepix](www.weitzeldesign.de)
* [www.kat-webdesign.de](http://www.kat-webdesign.de)
* [netmediawork.de](http://netmediawork.de)
* [Büro für visuelle Kommunikation | Nicky Hoff](http://www.hofff.com)

Features
--------

### Konfiguration
* Aktivierung gewünschter Plugins
* Drag&Drop anordnung der Controlbuttons in bis zu 3 Reihen
* Setzen diverser Optionsn
* Serverseitige Tag-Filterung
* Filebrowser-Schnittstelle
* Definition von Schriftarten, Schriftgrößen, Blockformaten, Farben etc.
* Festlegung der zu ladenden *content_css*
* Import/Export von Konfigurationen
* Bundled TinyMCE Plugins: fullscreen, contextmenu, visualchars

### Verwendung
Eine Konfiguration wird anhand einer linearen Zuweisungstabelle einem Feld zugewiesen. Über dies Zuweisungstabelle
wird iteriert bis *alle* Restriktionen des Zuweisungseintrags zutreffen. Demnach sollten weiter unten die allgemeineren
Regeln notiert werden.

* Drag&Drop Sortierung der Regeln
* Beschränkung auf einzelne Benutzer
* Beschränkung auf Benutzergruppen
* Beschränkung auf Seiten inkl. deren Unterseiten
* Beschränkung auf Layouts
* Beschränkung auf Tabellen
* Beschränkung auf einzelne Felder

### Installation, abhängige Erweiterungen
Folgende Erweiterungen sind zur Verwendung des TinyMCE_Customizers nötig und müssen vorher installiert werden:

* [MultiColumnWizard](http://www.contao.org/de/extension-list/view/MultiColumnWizard.de.html)
* [Table Lookup Wizard](http://www.contao.org/de/extension-list/view/tablelookupwizard.de.html)
* [listViewSortable](https://github.com/psi-4ward/listViewSortable) (optional)

[siehe Manuelle Installation von Erweiterungen](https://www.contao-community.de/showthread.php?76-Third-Party-Erweiterungen-manuell-installieren)


### Entwicklerschnittstellen
* Erweiterung der Plugin- und Buttonauswahl
* Eigene Filebrowser
* Zusätzliche *content_css* Dateien
                          * 
→ [Entwicklerdokumentation](DEVELOPER.md)

Contact, Licence
----------------
Der Sourcecode steht unter der LGPL Lizenz.
Die Icons wurden dem [TinyMCE](http://tinymce.com) entnommen.

### Author
Diese Erweiterung wurde von Christoph Wiechert, Firma [4ward.media](http://www.4wardmedia.de) entwickelt.

Credits
--------
Vielen Dank an [Joe Ray Gregory](http://www.may17.de) für seine große Hilfe bei der Drag&Drop Funktionalität
und [Mark Reimann](http://www.mediendepot-ruhr.de) bei den Vorüberlegungen der Verwendungs-Tabelle.
