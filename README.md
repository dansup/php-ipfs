# php-ipfs

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

A PHP wrapper library for the IPFS API server.

## Installation

    composer require dansup/php-ipfs

## Usage

A limited number of methods are supported at the moment, I hope to add them all eventually.

``` php
<?php

use Dansup\IPFS\ServerFactory as IPFS;

$ipfs = IPFS::driver('api')->size('QmeM5KhtRMpgp9JbF2FhJ7qA4yDZKDExGmwgYw9sMdELJE');
echo json_encode($ipfs);
```
## Testing

Tests coming soon!

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email danielsupernault@gmail.com instead of using the issue tracker.

## Credits

- [@dansup](https://github.com/dansup)
- [All Contributors](https://github.com/dansup/php-ipfs/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/dansup/php-ipfs.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/dansup/php-ipfs/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/dansup/php-ipfs.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/dansup/php-ipfs.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/dansup/php-ipfs.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/dansup/php-ipfs
[link-travis]: https://travis-ci.org/dansup/php-ipfs
[link-scrutinizer]: https://scrutinizer-ci.com/g/dansup/php-ipfs/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/dansup/php-ipfs
[link-downloads]: https://packagist.org/packages/dansup/php-ipfs
[link-author]: https://github.com/dansup
[link-contributors]: ../../contributors
