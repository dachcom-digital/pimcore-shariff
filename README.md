# Pimcore Shariff

The [heise/shariff](https://github.com/heiseonline/shariff-backend-php) package needs a lot of dependencies. 
Use this plugin only if you really need it.

## Installation
**Handcrafted Installation**   
1. Download Plugin  
2. Rename it to `Shariff`  
3. Place it in your plugin directory  
4. Activate & install it through backend 

**Composer Installation**  
1. Add code below to your `composer.json`    
2. Activate & install it through backend

```json
"require" : {
    "dachcom-digital/shariff" : "*",
}
```

## Config
Create a `shariff.php` in `website/var/config/`

```
<?php

return [

    "domain" => "www.yourdomain.org",
    "cache" => [
        "ttl" => 0
    ],
    "services" => [
        "GooglePlus",
        "Facebook"
    ]

];
```

### View
```
<div class="shariff" data-theme="grey" data-service="['facebook']" data-backend-url="http://yourdomain.org/plugins/Shariff/proxy/listen/" data-url="<?=$this->urlHelper()->homeUrl()?>" data-lang="<?=$this->language?>" class="shariff"></div>
```

## Copyright and license
Copyright: [DACHCOM.DIGITAL](http://dachcom-digital.ch)  
For licensing details please visit [LICENSE.md](LICENSE.md)  