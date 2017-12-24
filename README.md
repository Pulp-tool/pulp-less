Pulp-Less
==

Initialize your .pulp/composer.json with

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:Pulp-tool/pulp-less.git"
        }
    ],
    "require": {
        "pulp-less": "*"
     }
}
```

Then install with *composer install*

Use Pulp-Less
===
Use the plugin with src and dest pipes

```php
$p->task('less', function() use($p) { 
    $p->watch( ['foo/**/*.less'])->on('change', function($file) use ($p) { 
    $p->src(['foo/bootstrap.less'])
        ->pipe(new \Pulp\Less( ['compress'=>true]))
        ->pipe($p->dest('foo/compressed.css'));

    });
});
```     


Then call with
```bash
php pulp.phar less
```

Any time a less file under foo/ changes the bootstrap.less file will kick off the less compile process.
