# Pimcore Shariff

the [heise/shariff](https://github.com/heiseonline/shariff-backend-php) package needs a lot of dependencies. use this plugin only if you really need it..

### Config

create a `shariff.json` in `website/var/config/shariff.php`


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