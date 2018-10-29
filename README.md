# leaflet_map
### Wordpress shortcode to integrate a leaflet map

Put in the post content the shortcode *[leafletmap lat="###" lon="###"]*

Displonibles attributes:
- lat: Num (Necessary): latitude coordinate
- lon: Num (Necessary): longitude coordinate
- zoom: Num (default 9)
- marker_txt: the HTML text in the tooltip (default "empty")
- link_gmap: true|false (default true) - to show or hide the link to Google Map

### full example
~~~
[leafletmap lat='51.505' lon='-0.09' zoom='9' marker_txt='<b>title of tooltip</b><br/>text of the tooltip' link_gmap='true']
~~~
