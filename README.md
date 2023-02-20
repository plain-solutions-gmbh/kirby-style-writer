# Kirby Style Writer

This Kirby Plugin grabs the given styling values and save it into a CSS file on page update.

> This is a experimental Kirby Plugin. Use it on your own risk!
>
> The initial of creating this plugin underling [this topic](https://forum.getkirby.com/t/render-site-in-the-update-after-hook/27882/26)

## Bluepring integration

```YAML
fields:
  font-size:
    label: Fontsize
    type: text
    width: 1/2
  color:
    label: Color
    type: text
    width: 1/2

```


## HTML integration

```
<html>
  <head>
    
    <?= css($sw->getCSS()) ?>

  </head>
  <body>

    <h1 class="mytitle">My Title</h1>
    <?php $sw->style('.mytitle', [site()->font_size(), site()->color()]) ?>

    <?php $sw->seal() ?>

  </body>

</html>
```

[Buy me a ☕️](https://www.paypal.com/donate/?hosted_button_id=5W5RBKYXBDABN)