# Image Proxy

A simple image proxy for no insecure content warnings or disappearing images on https sites.

## How to use

Just create a https website with PHP runtime environment,and put the file `proxy.php` in your web directory.

Then you can use it by constructing a link like `https://yourdomain/proxy.php?url=the-url-you-want-to-proxy`.

The url you want to proxy could be in the following formats：

```
domain/image-path
http://domain/image-path
https://domian/image-path
```

We also support the svg format picture, just constructing a link like `https://yourdomain/proxy.php?svg=True&url=the-url-you-want-to-proxy`.

**PS:** I created it for my rss subscriber, but I've never written PHP code before, so it might be a little bad, forgive me.