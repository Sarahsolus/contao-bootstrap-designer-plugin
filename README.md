# Contao Bootstrap Designer Bundle for Contao 4

The Contao Bootstrap Designer Bundle for Contao 4 adds backend functionality to Contao 4 to enable agencies and web developers to customize the design of the website or the individual elements more quickly.

In addition, it offers its own classes, as well as classes that can be customized in your own CSS.

Features:
- easily selectable settings for margin, padding, display adjustable for all Bootstrap viewports
- easily selectable text and background color settings including transparency, as well as other text settings
- quickly selectable settings for responsive behavior of images
- quickly selectable container or container fluid settings for items
- default responsive behavior and article container settings

## Installation

You can install the package with Composer:

```
composer require sarahsolus/contaobsdesigner
```

## Getting started

Contao Bootstrap Designer Bundle for Contao 4 requires Bootstrap 4 to work properly.
Install a Contao Bootstrap plugin or add Bootstrap 4 manually (into your FE_Page).

There will be new Settings in the Contao Backend:

- each element has a Design section
- each image element has a new responsive setting
- in the article settings under layout there is a new container setting
- in the Contao settings - Backend setting there are new settings for default settings

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

to your SCSS to define primary and secondary brand color.

There are also three unused special classes (s1,s2,s3) you can use for your special margin / padding values.


##To Do

- content_bezeichner ändern in cbsd_
- Translation













