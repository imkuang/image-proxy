# Image Proxy

A simple image proxy for no insecure content warnings or disappearing images on https sites.

## How to use

Just create a https website with PHP runtime environment,and put the file `proxy.php` in your web directory.

Then you can use it by constructing a link like `https://yourdomain/proxy.php?url=the-url-you-want-to-proxy`.

The url you want to proxy could be in the following format：

```
domain/your-image-path
http://domain/your-image-path
https://domian/your-image-path
```

**PS:** I created it for my rss subscriber, but I've never written PHP code before, so it might be a little bad, forgive me.
