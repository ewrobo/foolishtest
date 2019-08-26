# foolish-test
Test for The Motley Fool
https://fooltest.ewrob.us/ - Live link for your convenience.
The stylization is kept to a complete minimum, as a "working wireframe".

## Points of consideration
Total working time clocked 10 hours
Features all custom theme, no child theme, no javascript, all php

For your installation, two plugins are used (and are present in the composer.json):

* WP-LESS - Very powerful tool for server-side CSS computation
* Advanced Custom Fields - One of the best time-saving and powerful plugins available

I would normally use minimization, caching, and seo plugins alongside these but my general philosophy is to use as little commercial plugins as possible. If the task was to make two similar sites, my custom building would have taken place in custom plugins, but they reside in the theme.

## There are 3 Points of data:
* Companies (Custom Post Type)
* Stock Recommendations (Custom Post Type)
* Standard Posts (News)

Companies contain the Stock Ticker value and abbreviated Market.
Other posts function through the connective API provided using that ticker value through linked post objects from the Companies CPT.

The content portions of the two article types rely on the WordPress Gutenberg editor, and a Custom Field located beneath to link to the Companies post object.

1. Create a Company if the desired company does not exist, and fill out the 2 fields for ticker and market (The API will do the rest)

2. Create either type of content and link to the desired company from a field at the bottom of the page and publish the article.

## Notable Issues
* I ran out of time to look through the areas of the API which were not notated as the two bottom items. Therefore, on the company page Price Change, Price Change %, 52 Week Range, Beta, Volume Average, Market Capitalisation and Last Dividend are not being pulled from the API. That is easily correctable if I knew what part of the API to look in.
