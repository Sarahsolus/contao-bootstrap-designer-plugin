# Contao Bootstrap Designer Bundle for Contao 4

The Contao Bootstrap Designer Bundle for Contao 4 adds Frontend Styling functionality to the Contao 4 Backend.
It aims for Web developers & Online agencies who'd like to safe time, and Backend Users who want to do (responsive) styling. 

In addition to the Bootstrap classes, it also offers its own classes, as well as classes that can be customized in your own CSS.

Features:
- settings for margin, padding, display adjustable for all Bootstrap viewports
- text and background color settings including transparency, as well as other text settings
- special headline settings
- settings for responsive behavior of images
- simply turn a Hyperlink into a Bootstrap button
- container or container fluid settings for articles
- default responsive behavior and article container settings

## Installation

You can install the package with Composer:

```
composer require sarahsolus/contaobsdesigner
```

## Getting started

Contao Bootstrap Designer Bundle for Contao 4 requires Bootstrap 4 to work properly.
Install a Contao Bootstrap plugin or add Bootstrap 4 manualy (into your FE_Page).

There will be new Settings in the Contao Backend:

- each element has a Design section
- each image element has a new responsive setting
- each hyperlink and Top-Link element has a new button setting in the Hyperlink Settings area
- each headline element has an additional setting to change h-class
- in the article settings under layout there is a new container setting
- in the Contao settings - Backend setting there are new settings for default settings

Before creating new articles, change the default container class settings.
If you are using the Contao Bootstrap extension, REMOVE ANY CLASS from the container class settings in the layout section,
or the containerfluid settings for the articles won't work.

---

German / Deutsche Anleitung:

Die Erweiterung ermöglicht neue Einstellungen im Contao Backend:

- jedes Element hat einen neuen Abschnitt "Design"
- jedes Bildelement hat eine neue Einstellmöglichkeit für die Responsive Darstellung
- jeder Hyperlink / Top-Link hat in den Hyperlink-Einstellungen die Option, den Link in einen Button zu ändern
- Jedes Überschrift Element hat unter Design die Option, die h-Klasse des Element zu ändern
- in den Artikeleinstellungen unter Layout gibt es die Möglichkeit, den Inhalt des Artikels in einen Container setzen
- in den Contao Einstellungen - Backend Einstellungen gibt es neue Optionen für Voreinstellungen

Bevor man die Seitenstruktur beginnt einzurichten, sollte man die Voreinstellung für die Container Klasse auswählen.
So erhält jeder neue Artikel z.B. automatisch die Container-Klasse.
Wird die Contao Bootstrap verwendet, bitte das Feld Container-Klasse in den Layout-Einstellungen freilassen, damit die Container-Fluid Einstellung funktionieren kann.


---

You can add

```
.cbsd-text-brand-primary, .text-brand-primary p { color: $brand-primary !important; }
.cbsd-text-brand-secondary, .text-brand-secondary p { color: $brand-secondary !important; }
.cbsd-link-brand-primary, .link-brand-primary p { color: $brand-primary !important; }
.cbsd-link-brand-secondary, .link-brand-secondary p { color: $brand-secondary !important;}

.cbsd-bg-brand-primary { background-color:  $brand-primary !important;}
.cbsd-bg-brand-secondary { background-color:  $brand-secondary !important; }
.cbsd-bg-background { background-color: $body-color !important; }
.cbsd-bg-transparent-brand-primary { background-color: opacify($brand-primary, 0.5) !important; }
.cbsd-bg-transparent-brand-secondary { background-color: opacify($brand-secondary, 0.5) !important; }
.cbsd-bg-transparent-background { background-color: opacify($body-color, 0.5) !important; }
.cbsd-hl-brand-primary h1,.cbsd-hl-brand-primary h2,.cbsd-hl-brand-primary h3,.cbsd-hl-brand-primary h4,.cbsd-hl-brand-primary h5,.cbsd-hl-brand-primary h6 { color: $brand-primary !important; }
.cbsd-hl-brand-secondary h1,.cbsd-hl-brand-secondary h2,.cbsd-hl-brand-secondary h3,.cbsd-hl-brand-secondary h4,.cbsd-hl-brand-secondary h5,.cbsd-hl-brand-secondary h6 { color: $brand-secondary !important; }
```

to your SCSS to define primary and secondary brand colors.

There are also three unused special classes (s1,s2,s3) you can use for your special margin / padding values.

---


## Notes

- due to Contaos link element structure some own classes concerning the hyperlinks had to be added.


## Future Plans
- add Bootstrap 5 support












